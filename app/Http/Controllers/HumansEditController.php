<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Human;

class HumansEditController extends Controller
{
    public function execute(Human $human, Request $request)
    {
        $old = $human->toArray();
        if ($request->isMethod('delete')) {
            $human->delete();
            return redirect('admin')->with('status', 'Human was deleted');
        }
        
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'position'=>'required|max:255',
                'text'=>'required'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('humansEdit', ['human'=>$input['id']])
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
                    return redirect()->route('humansEdit', ['human'=>$input['id']])
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            } else {
                $input['image'] = $input['image_old'];
            }
            unset($input['image_old']);
            $human->fill($input);
            if ($human->update()) {
                return redirect('admin')->with('status', 'Human was successfully changed');
            }
        }
        
        
        if (view()->exists('admin.humans_edit')) {
            $data = [
                'title' => 'Edit human ' . $old['name'],
                'data' => $old
            ];
            return view('admin.humans_edit', $data);
        }
    }
}
