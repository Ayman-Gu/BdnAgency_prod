<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Team;
use App\Models\ContactInfo;
use App\Models\Faq;
use App\Models\BlogCategory;
use App\Models\Service;
use App\Models\Testimonial;


class NavigationController extends Controller
{
    public function index(){
        $page = \App\Models\Home::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'about_section' => $page->about_section,
            'features_section' => $page->features_section,
            'cta_section' => $page->cta_section,
            'services_section' => $page->services_section,
            'portfolio_section' => $page->portfolio_section,
            'testimonials_section' => $page->testimonials_section,
            'pricing_section' => $page->pricing_section,
            'faq_section' => $page->faq_section,
            'team_section' => $page->team_section,
            'recentposts_section' => $page->recentposts_section,
            'contact_section' => $page->contact_section,       
        ];

        $teamMembers = Team::latest()->get();

        $recentPosts = Blog::where('status', 'published')->latest()->take(3)->get();
        
        $contactInfo = ContactInfo::where('is_active', 1)->first();

        $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];

        $services = Service::with(['packs' => function ($q) {
                $q->where('active', true);
        }, 'packs.packType', 'packs.offers'])->get();

        foreach ($services as $service) {
            $service->packs = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values();
        }

        
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();

        $testimonials = Testimonial::latest()->get();



        return view('pages.index', compact('sections', 'teamMembers', 'recentPosts','contactInfo' ,
                                          'faqs','services','testimonials'));

    }

    public function getApropos(){
        
        $page = \App\Models\AproposPage::first();
        
        $sections = [
        'hero_section' => $page->hero_section,
        'qui_sommes_nous_section' => $page->qui_sommes_nous_section,
        'nos_valeurs_section' => $page->nos_valeurs_section,
        'nos_valeurs_section' => $page->nos_valeurs_section,
        'notre_histoire_section' => $page->notre_histoire_section,
        'notre_equipe_section' => $page->notre_equipe_section,
        'cta_section' => $page->cta_section,
        ];

        $teamMembers = \App\Models\Team::all();

        return view('pages.a-propos', compact('sections', 'teamMembers'));
    }

    public function getBlogs(Request $request)
    {
        $categories = BlogCategory::orderBy('name')->pluck('name');

        $blogs = Blog::where('status', 'published')
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('name', $request->category);
                });
            })
            ->with('category')
            ->latest()
            ->paginate(4);

        $recentPosts = Blog::where('status', 'published')->latest()->take(3)->get();
        $randomPosts = Blog::where('status', 'published')->inRandomOrder()->take(3)->get();
        $latestCategories = BlogCategory::latest()->take(3)->get();

        $categorizedPosts = [];
        foreach ($latestCategories as $category) {
            $categorizedPosts[$category->name] = Blog::where('status', 'published')
                ->where('blog_category_id', $category->id)->latest()->take(3)->get();}  

        return view('pages.blog', compact('blogs', 'categories', 'recentPosts','randomPosts','latestCategories', 'categorizedPosts'));
    }


    public function getServiceEmailing(){
        $page = \App\Models\ServiceEmailing::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'features_section' => $page->features_section,
            'emailMarketing_section' => $page->emailMarketing_section,
            'automation_section' => $page->automation_section,
            'services_section' => $page->services_section,
            'cta_section' => $page->cta_section,
            'pricing_section' => $page->pricing_section,
        ];
         // Fetch the service named 'Location de Plateforme Emailing'
        $service = \App\Models\Service::where('name', 'Location de Plateforme Emailing')
            ->with(['packs.packType', 'packs.offers'])
            ->first();

        $orderedPacks = collect();

        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];

            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values(); // reindex
        }

        return view('pages.service-emailing', compact('sections', 'orderedPacks'));
    }
    public function getServiceSMS(){
        $page = \App\Models\ServiceSms::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'features_section' => $page->features_section,
            'commerce_section' => $page->commerce_section,
            'technology_section' => $page->technology_section,
            'cta_section' => $page->cta_section,
            'pricing_section' => $page->pricing_section,
        ];
        $service = \App\Models\Service::where('name', 'Location de Plateforme SMS')
            ->with(['packs.packType', 'packs.offers'])
            ->first();
        
        $orderedPacks = collect();
        
        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];
        
            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values(); // reindex
        }

    return view('pages.service-sms', compact('sections','orderedPacks'));
    }

    public function getServiceBDD(){
    $page = \App\Models\ServiceBdd::first();

    $sections = [
        'hero_section' => $page->hero_section,
        'features_section' => $page->features_section,
        'benefits_section' => $page->benefits_section,
        'use_cases_section' => $page->use_cases_section,
        'testimonials_section' => $page->testimonials_section,
        'cta_section' => $page->cta_section,
        'pricing_section' => $page->pricing_section,
    ];

     $service = \App\Models\Service::where('name', 'Location de Bases de Données')
            ->with(['packs.packType', 'packs.offers'])
            ->first();
        
        $orderedPacks = collect();
        
        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];
        
            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values();
        }
        // Get the last 2 testimonials
        $testimonials = Testimonial::latest()->take(2)->get();
        return view('pages.service-bdd', compact('sections','orderedPacks', 'testimonials'));
    }
    
    public function getServiceNewsletter(){
        $page = \App\Models\ServiceNewsletter::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'features_section' => $page->features_section,
            'benefits_section' => $page->benefits_section,
            'examples_section' => $page->examples_section,
            'cta_section' => $page->cta_section,
            'pricing_section' => $page->pricing_section,
        ];
        $service = \App\Models\Service::where('name', 'Newsletter')
            ->with(['packs.packType', 'packs.offers'])
            ->first();
        
        $orderedPacks = collect();
        
        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];
        
            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values(); // reindex
        }
        return view('pages.service-newsletter', compact('sections', 'orderedPacks'));
    }
    public function getServiceVisionnaire(){
         $page = \App\Models\ServiceVisionnaire::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'features_section' => $page->features_section,
            'benefits_section' => $page->benefits_section,
            'examples_section' => $page->examples_section,
            'cta_section' => $page->cta_section,
            'pricing_section' => $page->pricing_section,
        ];
        $service = \App\Models\Service::where('name', 'Le Visionnaire')
            ->with(['packs.packType', 'packs.offers'])
            ->first();
        
        $orderedPacks = collect();
        
        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];
        
            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values(); // reindex
        }

        return view('pages.service-visionnaire', compact('sections','orderedPacks'));
    }
    public function getServiceBranding(){
         $page = \App\Models\ServiceBranding::first();

        $sections = [
            'hero_section' => $page->hero_section,
            'features_section' => $page->features_section,
            'benefits_section' => $page->benefits_section,
            'examples_section' => $page->examples_section,
            'cta_section' => $page->cta_section,
            'pricing_section' => $page->pricing_section,
        ];
        $service = \App\Models\Service::where('name', 'Branding & Identité Visuelle')
            ->with(['packs.packType', 'packs.offers'])
            ->first();
        
        $orderedPacks = collect();
        
        if ($service) {
            $order = ['Start', 'Avance', 'Expert', 'Sur Mesure'];
        
            $orderedPacks = $service->packs->sortBy(function ($pack) use ($order) {
                return array_search($pack->packType->name ?? '', $order);
            })->values(); // reindex
        }

        return view('pages.service-branding', compact('sections','orderedPacks'));
    }

    public function getBlogsManager(){
        return view('dashboard.blogs', compact('blogs'));
    }

    public function showSingleBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::pluck('name');

        $randomPosts = Blog::where('status', 'published')->inRandomOrder()->take(3)->get();
        $latestCategories = BlogCategory::latest()->take(3)->get();

        $categorizedPosts = [];
        foreach ($latestCategories as $category) {
            $categorizedPosts[$category->name] = Blog::where('status', 'published')
                ->where('blog_category_id', $category->id)->latest()->take(3)->get();}  
    
        return view('pages.blog-single', compact('blog', 'categories','randomPosts','latestCategories' ,'categorizedPosts'));
    }

}
