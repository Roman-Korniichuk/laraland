<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Portfolio;
use App\Service;
use App\Human;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $pages = Page::all();
        $portfolios = Portfolio::all();
        $services = Service::all();
        $humans = Human::all();
        
        $menu = [];
        foreach ($pages as $page) {
            $item = ['title'=>$page->name, 'alias'=>$page->alias];
            array_push($menu, $item);
        }
        
         
        array_push($menu, ['title'=>'Services', 'alias'=>'service']);
        
        array_push($menu, ['title'=>'Portfolio', 'alias'=>'Portfolio']);
        
        array_push($menu, ['title'=>'Clients', 'alias'=>'clients']);
        
        array_push($menu, ['title'=>'Team', 'alias'=>'team']);
        
        array_push($menu, ['title'=>'Contact', 'alias'=>'contact']);
        
        return view('site.index', [
            'menu'=>$menu,
            'pages'=>$pages,
            'services'=>$services,
            'portfolios'=>$portfolios,
            'humans'=>$humans
        ]);
    }
}
