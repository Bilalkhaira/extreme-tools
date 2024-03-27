<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Blog;
use App\Models\User;
use App\Models\Notification;
use App\Models\ContactRequest;

class DashboardController extends Controller
{
    public function index()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        $users = User::latest()->limit(5)->get();
        $blogs = Blog::latest()->limit(5)->get();

        return view('pages.dashboards.index', compact(['users', 'blogs']));
    }
}
