<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfoliosAddController extends Controller
{
    public function execute(Request $request)
    {
        
        if (view()->exists('admin.portfolios_add')) {
            return view('admin.portfolios_add', [
                'title' => 'New portfolio'
            ]);
        }
    }
}
