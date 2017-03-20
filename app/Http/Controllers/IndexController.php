<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Portfolio;
use App\Service;
use App\Human;

use DB;
use Mail;
use App\Mail\ContactForm;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $message = [
                'required' => 'Поле :attribute обязательно для заполнения',
                'email' => 'В поле :attribute должен быть корректный e-mail'
            ];
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $message);
            
            $data = $request->all();
            $adminMail = env('ADMIN_MAIL');
            Mail::to($adminMail)->send(new ContactForm($data));
            return redirect()->route('home')->with(['status'=>'Success!']);
        }
        $pages = Page::all();
        $portfolios = Portfolio::all();
        $services = Service::all();
        $humans = Human::all();
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
        
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
            'humans'=>$humans,
            'tags'=>$tags
        ]);
    }
}
