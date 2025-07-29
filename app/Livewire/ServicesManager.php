<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Pack;
use App\Models\Offer;
use App\Models\PackType;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServicesManager extends Component
{
    use AuthorizesRequests;

    public $services;
    public $packTypes;

    public $selectedService = null;
    public $packTypeId = null;
    public $price;
    public $offers = [];

    public $packs;

    public $editingPackId = null;
    public $editingPackTypeId = null;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->services = Service::with('packs')->get();
        $this->packTypes = PackType::all();
        $this->packs = Pack::with(['service', 'packType', 'offers'])->get();

        if (!$this->editingPackId) {
            $this->resetForm();
        }
    }

    public function resetForm()
    {
        $this->selectedService = null;
        $this->packTypeId = null;
        $this->price = null;
        $this->offers = [['name' => '', 'active' => true]];
        $this->editingPackId = null;
        $this->editingPackTypeId = null;
    }

    public function selectService($serviceId)
    {
        $this->selectedService = $serviceId;
        $this->packTypeId = null;
        $this->price = null;
        $this->offers = [['name' => '', 'active' => true]];
        $this->editingPackId = null;
        $this->editingPackTypeId = null;
    }

    public function addOfferField()
    {
        $this->offers[] = ['name' => '', 'active' => true];
    }

    public function removeOffer($offerId)
    {
        $offer = Offer::find($offerId);
        if ($offer) {
            $offer->delete();
        
            $this->offers = array_filter($this->offers, function ($o) use ($offerId) {
                return $o['id'] !== $offerId;
            });
            $this->offers = array_values($this->offers);
            
            $this->loadData();
        
            session()->flash('message', 'Offre supprimée avec succès.');
        }
    }


    public function toggleOfferActive($index, $setActive = null)
    {
        if ($setActive === null) {
            $this->offers[$index]['active'] = !$this->offers[$index]['active'];
        } else {
            $this->offers[$index]['active'] = $setActive;
        }
    }

    public function savePack()
    {
        $this->validate([
            'selectedService' => 'required|exists:services,id',
            'packTypeId' => [
                'required',
                'exists:pack_types,id',
                function ($attribute, $value, $fail) {
                    $query = Pack::where('service_id', $this->selectedService)
                        ->where('pack_type_id', $value);

                    if ($this->editingPackId) {
                        $query->where('id', '!=', $this->editingPackId);
                    }

                    if ($query->exists()) {
                        $fail('Ce type de pack est déjà attribué à ce service.');
                    }
                },
            ],
            'price' => 'required|numeric|min:0',
            'offers.*.name' => 'required|string',
            'offers.*.active' => 'boolean',
        ]);


        if ($this->editingPackId) {
            $pack = Pack::findOrFail($this->editingPackId);
            $pack->update([
                'service_id' => $this->selectedService,
                'pack_type_id' => $this->packTypeId,
                'price' => $this->price,
            ]);

            // Update offers
            foreach ($this->offers as $offerData) {
                if (isset($offerData['id'])) {
                    $offer = Offer::find($offerData['id']);
                    if ($offer) {
                        $offer->update([
                            'name' => $offerData['name'],
                            'active' => $offerData['active'],
                        ]);
                    }
                } else {
                    // New offer
                    $pack->offers()->create([
                        'name' => $offerData['name'],
                        'active' => $offerData['active'],
                    ]);
                }
            }
        } else {
            $pack = Pack::create([
                'service_id' => $this->selectedService,
                'pack_type_id' => $this->packTypeId,
                'price' => $this->price,
            ]);

            foreach ($this->offers as $offerData) {
                $pack->offers()->create([
                    'name' => $offerData['name'],
                    'active' => $offerData['active'],
                ]);
            }
        }

        $this->loadData();
         $this->loadData();
        $this->resetForm();
        session()->flash('message', 'Pack enregistré avec succès.');
        $this->dispatch('$refresh');   
    }

    public function editPack($packId)
    {
        $pack = Pack::with('offers')->findOrFail($packId);

        $this->editingPackId = $pack->id;
        $this->editingPackTypeId = $pack->pack_type_id;

        $this->selectedService = $pack->service_id;
        $this->packTypeId = $pack->pack_type_id;
        $this->price = $pack->price;

        $this->offers = $pack->offers->map(function ($offer) {
            return [
                'id' => $offer->id,
                'name' => $offer->name,
                'active' => $offer->active,
            ];
        })->toArray();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function deletePack()
    {
        if (!$this->editingPackId) {
            return;
        }

        $pack = Pack::find($this->editingPackId);
        if ($pack) {
            $pack->offers()->delete(); // delete related offers first
            $pack->delete();
        }

        $this->loadData();
        session()->flash('message', 'Pack supprimé avec succès.');
    }

    public function render()
    {
        $this->authorize('viewAny',Service::class);

        $usedPackTypes = [];
        if ($this->selectedService) {
            $usedPackTypes = Pack::where('service_id', $this->selectedService)
                ->when($this->editingPackId, fn($q) => $q->where('id', '!=', $this->editingPackId))
                ->pluck('pack_type_id')->toArray();
        }

        return view('livewire.services-manager', [
            'usedPackTypes' => $usedPackTypes,
        ]);
    }
    public function togglePackActive($packId)
    {
    $pack = Pack::find($packId);
    if ($pack) {
        $pack->active = !$pack->active;
        $pack->save();
        $this->loadData();
    }
    }

}