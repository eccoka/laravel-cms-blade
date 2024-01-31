<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function leaderDashboard(){
        return inertia('LeaderDashboard');
    }
}
