<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $faq = Faq::where('answer','LIKE','%' .$request->search. '%');
        }else{
            $faq = Faq::all();
            
        }
       return view('admin.faq.index', compact(['faq']));
    }
    public function create()
    {
        return view('admin.faq.create');
    }
    public function store(Request $request)
    { 
        Faq::create($request->except(['_token','submit']));
        return redirect('/faq');
    }
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('/faq');
    }
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.edit', compact(['faq']));
    }
    public function update($id, Request $request)
    {
        $faq = Faq::find($id);
        $faq->update($request->except(['_token','submit']));
        return redirect('/faq');
    }
   
}
