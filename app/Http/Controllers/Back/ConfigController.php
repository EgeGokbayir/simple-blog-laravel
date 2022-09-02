<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Str;

class ConfigController extends Controller
{
    public function index()
    {
        $config=Config::find(1);
        return view('back.config.index',compact('config'));
    }

    public function update(Request $request)
    {
        $config=Config::find(1);
        $config->title=$request->title;
        $config->active=$request->active;
        $config->facebook=$request->facebook;
        $config->twitter=$request->twitter;
        $config->github=$request->github;
        $config->linkedin=$request->linkedin;
        $config->youtube=$request->youtube;
        $config->instagram=$request->instagram;

        if($request->hasFile('logo'))
        {
            $logo=Str::slug($request->title).'-logo.'.$request->logo->getClientOriginalExtension();
            // $logo = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads'),$logo);
            $config->logo=$logo;
        }

        if($request->hasFile('favicon'))
        {
            $favicon=Str::slug($request->title).'-favicon.'.$request->favicon->getClientOriginalExtension();
            // $favicon = time().'.'.$request->favicon->extension();
            $request->favicon->move(public_path('uploads'),$favicon);
            $config->favicon=$favicon;
        }

        $config->save();
        toastr()->success('Başarılı','Başarıyla Kaydedildi.');
        return redirect()->back();
    }
}
