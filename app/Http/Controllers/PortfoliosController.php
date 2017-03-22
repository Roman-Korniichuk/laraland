<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfoliosController extends Controller
{
    public function execute()
    {
        if (view()->exists('admin.portfolios')) {
            $portfolios = Portfolio::all();
            
            return view('admin.portfolios', [
                'title' => 'Portfolios',
                'portfolios' => $portfolios
            ]);
        }
    }
}
