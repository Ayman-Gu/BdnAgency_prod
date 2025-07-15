<?php

namespace App\Livewire;

use App\Models\NewsletterSubscriber;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

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
    $manager->addTestSubscriber('test2@example.com', '1.179.112.0');

    public function addTestSubscriber($email, $ip)
    {
    $country = $this->getCountryByIp($ip);

    NewsletterSubscriber::create([
        'email' => $email,
        'ip_address' => $ip,
        'country' => $country,
    ]);
    }*/

   public function getCountryByIp($ip)
    {
    // local IPs (for dev)
    if ($ip === '127.0.0.1' || $ip === '::1') {
        return 'Localhost (Testing)';
    }

    try {
        $response = @file_get_contents("https://ipapi.co/{$ip}/country_name/");
        if ($response) {
            return trim($response);
        }
    } catch (\Exception $e) {
        return null;
    }
    return null;
    }

    public function render()
    {
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
}