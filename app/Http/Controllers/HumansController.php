<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Human;

class HumansController extends Controller
{
    public function execute()
    {
        if (view()->exists('admin.humans')) {
            $humans = Human::all();
            
            return view('admin.humans', [
                'title' => 'Humans',
                'humans' => $humans
            ]);
        }
    }
}
