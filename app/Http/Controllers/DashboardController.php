<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
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
}
