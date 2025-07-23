<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }
    public function getPagesManager()
    {
        return view('dashboard.index');
    }
    public function getBlogsManager(){
        return view('dashboard.blogs');
    }
    public function getTeamManager(){
        return view('dashboard.team');
    }
    public function getContactManager(){
        return view('dashboard.contact');
    }
    public function getNewsletterSubscribers(){
        return view('dashboard.newsletter');
    }

    public function getFaqManager(){
        return view('dashboard.faq');
    }

    public function getServicesManager(){
        return view('dashboard.services');
    }

    public function getProjectsManager(){
        return view('dashboard.projects');
    }

    public function getTestimonialsManager(){
        return view('dashboard.testimonials');
    }

    public function getPdfManager(){
        return view('dashboard.importPdf');
    }
    public function getUsersManager(){
        return view('dashboard.users-management');
    }
    public function getRolesManager(){
        return view('dashboard.roles-management');
    }
    public function getPermissionsManager(){
        return view('dashboard.permissions-management');
    }
}
