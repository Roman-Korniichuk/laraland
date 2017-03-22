<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Portfolio;

class PortfoliosAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'filter'=>'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('portfoliosAdd')
                                 ->withErrors($validator)
                                 ->withInput();
            }
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                if (($ext == 'jpg')||($ext == 'bmp')||($ext == 'gif')) {
                    $input['image'] = $file->getClientOriginalName();
                    $file->move(public_path('assets/img/'), $input['image']);
                    $portfolio = new Portfolio();
                    $portfolio->fill($input);
                    if ($portfolio->save()) {
                        return redirect('admin')->with('status', 'New portfolio has successfully added');
                    }
                } else {
                    return redirect()->route('pagesAdd')
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            }
            
        }
        
        
        if (view()->exists('admin.portfolios_add')) {
            return view('admin.portfolios_add', [
                'title' => 'New portfolio'
            ]);
        }
    }
}
