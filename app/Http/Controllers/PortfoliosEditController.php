<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;

class PortfoliosEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {
        $old = $portfolio->toArray();
        if ($request->isMethod('delete')) {
            $portfolio->delete();
            return redirect('admin')->with('status', 'Portfolio was deleted');
        }
        
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'filter'=>'required|max:255'
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('portfoliosEdit', ['portfolio'=>$input['id']])
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
                    return redirect()->route('portfoliosEdit', ['portfolio'=>$input['id']])
                                     ->withErrors('Invalid file type!')
                                     ->withInput();
                }
            } else {
                $input['image'] = $input['image_old'];
            }
            unset($input['image_old']);
            $portfolio->fill($input);
            if ($portfolio->update()) {
                return redirect('admin')->with('status', 'Portfolio was successfully changed');
            }
        }
        
        if (view()->exists('admin.portfolios_edit')) {
            $data = [
                'title' => 'Edit ' . $old['name'],
                'data' => $old
            ];
            return view('admin.portfolios_edit', $data);
        }
    }
}
