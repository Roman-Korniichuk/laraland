<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Page;

class PagesAddController extends Controller
{
    public function execute (Request $request)
    {
        
        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'alias'=>'required|unique:pages|max:255',
                'text'=>'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('pagesAdd')
                                 ->withErrors($validator)
                                 ->withInput();
            }
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                if (($ext == 'jpg')||($ext == 'bmp')||($ext == 'gif')) {
                    $input['image'] = $file->getClientOriginalName();
                    $file->move(public_path('assets/img/'), $input['image']);
                    $page = new Page();
                    $page->fill($input);
                    if ($page->save()) {
                        return redirect('admin')->with('status', 'New page has successfully added');
                    }
                } else {
                    return redirect()->route('pagesAdd')
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            }
        }
        
        if (view()->exists('admin.pages_add')) {
            
            return view('admin.pages_add', [
                'title' => 'Add new page',
            ]);
        }
    }
}
