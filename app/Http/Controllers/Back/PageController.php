<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
        $pages=Page::all();
        return view ('back.pages.index',compact('pages'));
    }

    public function orders(Request $request)
    {
        $page=Page::find($request->id);
        foreach($request->get('page') as $key => $order){
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function switch(Request $request)
    {
        $page=Page::findOrFail($request->id);
        $page->status=$request->statu=="true" ? 1 : 0;
        $page->save();
    }

    public function create()
    {
        return view('back.pages.create');
    }

    public function update($id)
    {
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg'
        ]);

        $page=Page::findOrFail($id);
        $page->title=$request->title;
        $page->content=$request->content;
        $page->slug=str_slug($request->title);

        if($request->hasFile('image'))
        {
            $imageName=str_slug(($request->title).'.'.$request->image->getClientOriginalName());
            //  $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image=$imageName;
        }
            $page->save();
            toastr()->success('Başarılı!', 'Sayfa başarıyla güncellendi.');
            return redirect()->route('admin.pages.index');
    }

    public function post(Request $request)
    {
        $last=Page::orderBy('order','DESC')->first('order');

        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg'
        ]);

        $page=new Page;
        $page->title=$request->title;
        $page->content=$request->content;
        $page->order=$last->order+1;
        $page->slug=str_slug($request->title);

        if($request->hasFile('image'))
        {
            $imageName=str_slug(($request->title).'.'.$request->image->getClientOriginalName());
            //  $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image=$imageName;
        }
            $page->save();
            toastr()->success('Başarılı!', 'Sayfa başarıyla oluşturuldu.');
            return redirect()->route('admin.pages.index');
    }

    public function delete($id)
    {
        $page=Page::find($id);
        if(File::exists(public_path('/uploads/'.$page->image)))
        {
            File::delete(public_path('/uploads/'.$page->image));
        }

        $page->delete();
        toastr()->success('Başarılı','Sayfa başarıyla silindi.');
        return redirect()->route('admin.pages.index');
    }
}

