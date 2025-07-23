<?php

namespace App\Livewire;

use App\Models\NewsletterSubscriber;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Response;
use Spatie\SimpleExcel\SimpleExcelWriter;

class NewsletterSubscribersManager extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(as: 'from', history: true)]
    public $dateFrom = '';

    #[Url(as: 'to', history: true)]
    public $dateTo = '';

    protected $paginationTheme = 'bootstrap';

    public function updated($property)
    {
        if (in_array($property, ['search', 'dateFrom', 'dateTo'])) {
            $this->resetPage();
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedDateFrom()
    {
        $this->resetPage();
    }

    public function updatedDateTo()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->dateFrom = '';
        $this->dateTo = '';
        $this->resetPage();
    }

    
    /*----- test ipAddress with countries ----
    use App\Livewire\NewsletterSubscribersManager;
    $manager = new NewsletterSubscribersManager();
    $manager->addTestSubscriber('test2@example.com', '1.179.112.0');*/

    public function addTestSubscriber($email, $ip)
    {
    $country = $this->getCountryByIp($ip);

    NewsletterSubscriber::create([
        'email' => $email,
        'ip_address' => $ip,
        'country' => $country,
    ]);
    }

   public function getCountryByIp($ip)
    {
    // local IPs (for dev)
    if ($ip === '127.0.0.1' || $ip === '::1') {
        return 'Localhost (Testing)';
    }

    try {
        $response = Http::timeout(5)->withHeaders([
            'User-Agent' => 'LaravelApp'
        ])->get("https://ipapi.co/{$ip}/country_name/");
        
         if ($response->successful()) {
            return trim($response->body());
        }
    } catch (\Exception $e) {
        logger()->error("Failed to fetch country: " . $e->getMessage());
    }

    return 'Unknown';
    }

    public function render()
    {
        $this->authorize('read', NewsletterSubscriber::class);

        $query = NewsletterSubscriber::query();

        // Search filter
        if (!empty($this->search)) {
            $query->where('email', 'like', '%' . $this->search . '%');
        }

        // Date From filter
        if (!empty($this->dateFrom)) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }

        // Date To filter
        if (!empty($this->dateTo)) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        $subscribers = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.newsletter-subscribers-manager', compact('subscribers'));
    }

    public function deleteSubscriber($id)
    {
    $this->authorize('delete', NewsletterSubscriber::class);

    NewsletterSubscriber::findOrFail($id)->delete();
    session()->flash('message', 'Subscriber deleted successfully.');
    }

    public function deleteAll()
    {
        $this->authorize('deleteAll', NewsletterSubscriber::class);

        DB::table('newsletter_subscribers')->delete();
        session()->flash('message', 'All subscribers have been deleted.');
        $this->resetPage();
    }

  public function exportAsExcel()
    {
        $this->authorize('export', NewsletterSubscriber::class);

        $query = NewsletterSubscriber::query();

        // Apply filters
        if (!empty($this->search)) {
            $query->where('email', 'like', '%' . $this->search . '%');
        }
        if (!empty($this->dateFrom)) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }
        if (!empty($this->dateTo)) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        $subscribers = $query->get();

        return response()->streamDownload(function () use ($subscribers) {
            $writer = SimpleExcelWriter::streamDownload('newsletter_subscribers.xlsx');

            $writer->addHeader([
                'ID',
                'Email',
                'IP Address',
                'Country',
                'Subscribed At',
            ]);

            foreach ($subscribers as $subscriber) {
                $writer->addRow([
                    $subscriber->id,
                    $subscriber->email,
                    $subscriber->ip_address ?? 'N/A',
                    $subscriber->country ?? 'Unknown',
                    $subscriber->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            $writer->close();
        }, 'newsletter_subscribers.xlsx');
    } 
}