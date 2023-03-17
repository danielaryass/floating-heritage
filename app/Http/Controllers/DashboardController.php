<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// panggil model 
use App\Models\{User, Post, Category};

class DashboardController extends Controller
{
    public function index()
    {
        // menghitung jumlah user & post & category
  
        return view('pages.backsite.dashboard.index');
    }
}
