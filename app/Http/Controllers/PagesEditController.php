<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        $old = $page->toArray();
        if ($request->isMethod('delete')) {
            $page->delete();
            return redirect('admin')->with('status', 'Page was deleted');
        }
        
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:pages,alias,' . $input['id'],
                'text'=>'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('pagesEdit', ['page'=>$input['id']])
                                 ->withErrors($validator)
                                 ->withInput();
            }
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                if (($ext == 'jpg')||($ext == 'bmp')||($ext == 'gif')) {
                    $input['image'] = $file->getClientOriginalName();
                    $file->move(public_path('assets/img/'), $input['image']);
                } else {
                    return redirect()->route('pagesEdit', ['page'=>$input['id']])
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            } else {
                $input['image'] = $input['image_old'];
            }
            unset($input['image_old']);
            $page->fill($input);
            if ($page->update()) {
                return redirect('admin')->with('status', 'Page was successfully changed');
            }
        }
        
        
        if (view()->exists('admin.pages_edit')) {
            $data = [
                'title' => 'Edit page ' . $old['name'],
                'data' => $old
            ];
            return view('admin.pages_edit', $data);
        }
    }
}
