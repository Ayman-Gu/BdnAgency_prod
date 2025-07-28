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
            'section_apropos' => $page->section_apropos,
            'Ce_que_nous_offrons' => $page->Ce_que_nous_offrons,
            'Demander_un_devis' => $page->Demander_un_devis,
            'section_services' => $page->section_services,
            'section_Projets' => $page->section_Projets,
            'section_témoignages' => $page->section_témoignages,
            'section_des_offres' => $page->section_des_offres,
            'section_faq' => $page->section_faq,
            'section_équipe' => $page->section_équipe,
            'section_les_posts_recents' => $page->section_les_posts_recents,
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
            'Les_caractéristiques_de_BDN_Agency' => $page->Les_caractéristiques_de_BDN_Agency,
            'email_Marketing' => $page->email_Marketing,
            'automatisation_du_marketing' => $page->automatisation_du_marketing,
            'section_des_services' => $page->section_des_services,
            'Commencer_avec_BDN_Agency' => $page->Commencer_avec_BDN_Agency,
            'section_des_offres' => $page->section_des_offres,
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
            'Les_Fonctionnalités_de_bdn_agency' => $page->Les_Fonctionnalités_de_bdn_agency,
            'creation_des_cas_dutilisation' => $page->creation_des_cas_dutilisation,
            'Une_technologie_de_pointe' => $page->Une_technologie_de_pointe,
            'Commencer_avec_BDN_Agency' => $page->Commencer_avec_BDN_Agency,
            'section_des_offres' => $page->section_des_offres,
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
        'Les_atouts_de_nos_BDD' => $page->Les_atouts_de_nos_BDD,
        'Pourquoi_choisir_BDN_Agency' => $page->Pourquoi_choisir_BDN_Agency,
        'Location_de_BDD_adaptée_à_vos_besoins' => $page->Location_de_BDD_adaptée_à_vos_besoins,
        'section_temoignages' => $page->section_temoignages,
        'Démarrez_votre_prochaine_campagne' => $page->Démarrez_votre_prochaine_campagne,
        'section_des_offres' => $page->section_des_offres,
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
            'Nos_services' => $page->Nos_services,
            'Pourquoi_choisir_BDN_Agency' => $page->Pourquoi_choisir_BDN_Agency,
            'Newsletters_pour_booster_votre_communication' => $page->Newsletters_pour_booster_votre_communication,
            'Propulsez_votre_communication_par_email' => $page->Propulsez_votre_communication_par_email,
            'section_des_offres' => $page->section_des_offres,
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
            'Des_formats_adaptés_à_vos_objectifs' => $page->Des_formats_adaptés_à_vos_objectifs,
            'Pourquoi_choisir_Le_Visionnaire' => $page->Pourquoi_choisir_Le_Visionnaire,
            'Devenir_un_partenaire' => $page->Devenir_un_partenaire,
            'Prêt_à_transformer_votre_visibilité' => $page->Prêt_à_transformer_votre_visibilité,
            'section_des_offres' => $page->section_des_offres,
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
            'Nos_piliers_pour_une_identité_visuelle' => $page->Nos_piliers_pour_une_identité_visuelle,
            'avantage_bdn_agency' => $page->avantage_bdn_agency,
            'Des_marques_qui_rayonnent' => $page->Des_marques_qui_rayonnent,
            'Demander_une_consultation_Branding' => $page->Demander_une_consultation_Branding,
            'section_des_offres' => $page->pricing_section,
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
