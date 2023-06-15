<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\kategori;
use Illuminate\Http\Request;

class umkmController extends Controller
{
    public function show(Request $r,$id)
    {
        if ($r->has('search')) {
            $searchTerm = $r->search;
        
            $data = halaman::where('category_id', $id)
            ->where(function ($query) use ($r) {
                $query->where('judul', 'LIKE', '%' . $r->search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $r->search . '%');
                      
            })
            ->get();
            // Lakukan sesuatu dengan $products yang ditemukan
        }else {
            $data = halaman::where('category_id',$id)->get();
        }
        $categories=kategori::where('id',$id)->first();
        return view('customer.umkm', compact('data','categories'));
    }
    
}
