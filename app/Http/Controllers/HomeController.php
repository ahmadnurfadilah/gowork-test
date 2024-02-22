<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $locations = Location::where('is_active', 1)->get();
        $plans = Plan::where('is_active', 1)->get();
        return view('welcome', compact('locations', 'plans'));
    }

    public function book(Request $request)
    {
        $location = Location::find($request->location);
        $plan = Plan::find($request->plan);
        return view('book', compact('location', 'plan'));
    }
}
