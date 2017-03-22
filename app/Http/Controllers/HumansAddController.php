<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Human;

class HumansAddController extends Controller
{
    public function execute (Request $request)
    {
        
        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'position'=>'required|max:255',
                'text'=>'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('humansAdd')
                                 ->withErrors($validator)
                                 ->withInput();
            }
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                if (($ext == 'jpg')||($ext == 'bmp')||($ext == 'gif')) {
                    $input['image'] = $file->getClientOriginalName();
                    $file->move(public_path('assets/img/'), $input['image']);
                    $human = new Human();
                    $human->fill($input);
                    if ($human->save()) {
                        return redirect('admin')->with('status', 'New human has successfully added');
                    }
                } else {
                    return redirect()->route('humansAdd')
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            }
        }
        
        if (view()->exists('admin.humans_add')) {
            
            return view('admin.humans_add', [
                'title' => 'Add new human',
            ]);
        }
    }
}
