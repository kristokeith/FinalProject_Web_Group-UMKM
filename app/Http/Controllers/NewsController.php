<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $news = News::where('headline','LIKE','%' .$request->search. '%');
        }else{
            $news = News::all();
            
        }
       return view('admin.news.index', compact(['news']));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    { 
        $data = News::create($request->except(['_token','submit']));
        if($request->hasFile('picture')){
            $request->file('picture')->move('newspicture/', $request->file('picture')->getClientOriginalName());
            $data-> picture = $request->file('picture')->getClientOriginalName();
            $data-> save();
        }
        return redirect('/news');
    }

    public function destroy(Request $request, $id)
    {
        $news = News::find($id);
        if($request->hasFile('picture')){
            $destination ='newspicture/'.$news->picture;
            if(File::exists($destination)){
                File:: delete($destination);

            }
            $request->file('picture')->move('newspicture/', $request->file('picture')->getClientOriginalName());
            $news-> picture = $request->file('picture')->getClientOriginalName();
            
        }
        $news->delete();
        return redirect('/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact(['news']));
        
    }

    public function update($id, Request $request)
    {
        $news = News::find($id);
        if($request->hasFile('picture')){
            $destination ='newspicture/'.$news->picture;
            if(File::exists($destination)){
                File:: delete($destination);

            }
            $request->file('picture')->move('newspicture/', $request->file('picture')->getClientOriginalName());
            $news-> picture = $request->file('picture')->getClientOriginalName();
            
        }
        $news-> update($request->except(['_token','submit']));
        return redirect('/news')->with('status','Updated Successfully');
    }
    public function index2(Request $request){
        if($request->has('search')){
            $news = News::where('headline','LIKE','%' .$request->search. '%');
        }else{
            $news = News::all();
        }
       return view('customer.news', compact(['news']));
    }
    public function show2($id)
    {
         // Mendapatkan pengguna yang sedang login
        $product = News::where('id', $id)->first();
        return view('customer.newsDetail', compact('product'));
    }
    //
}
