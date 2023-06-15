<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $user = auth()->user();
        if ($r->has('search')) {
            $searchTerm = $r->search;
        
            $products = halaman::where('judul', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('deskripsi', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('kategori', function ($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->get();
        
            // Lakukan sesuatu dengan $products yang ditemukan
        }else {
            $products = halaman::where('user_id', $user->id)->with('kategori')->get();
        }
         // Mendapatkan pengguna yang sedang login
        return view('dasboard.halaman.halaman', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = kategori::all();
        return view('dasboard.halaman.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        
        $r->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'required|mimes:jpg,png,jpeg|image|max:2040'
        ],[
            'judul.required'=>'Judul Wajib di isi',
            'deskripsi.required'=>'Deskripsi Wajib di isi',
            'gambar.required'=>'Gambar wajib di isi'
        ]
    );
     
    $user=Auth::user();
    $halaman=new halaman();
    $judul=$r->judul;
    $deskripsi=$r->deskripsi;
    $halaman->judul=$judul;
    $halaman->deskripsi=$deskripsi;
    if($r->hasFile('gambar')){
        $r->file('gambar')->move('product/', $r->file('gambar')->getClientOriginalName());
        $halaman-> gambar = $r->file('gambar')->getClientOriginalName();
    }

    $halaman->category_id = $r->category_id;
    $user->products()->save($halaman);
    $halaman = $user->products;
    return redirect()->route('halaman.index')->with('success', 'Berhasil
menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = halaman::findOrFail($id);
        $categories = kategori::all();

        return view('dasboard.halaman.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $judul=$r->judul;
        $deskripsi=$r->deskripsi;
        $r->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            
        ],[
            'judul.required'=>'Judul Wajib di isi',
            'deskripsi.required'=>'Deskripsi Wajib di isi',
            
        ]
    );
  
    $halaman=halaman::find($id);
    $halaman->judul=$judul;
    $halaman->deskripsi=$deskripsi;
    if($r->hasFile('gambar')){
            $destination ='product/'.$halaman->gambar;
            if(File::exists($destination)){
                File:: delete($destination);

            }
            $r->file('gambar')->move('product/', $r->file('gambar')->getClientOriginalName());
            $halaman-> gambar = $r->file('gambar')->getClientOriginalName();
            
        }
    $halaman->category_id = $r->category_id;
    $halaman->update();
    return redirect()->route('halaman.index')->with('success','Berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $halaman=halaman::find($id);
        $destination ='product/'.$halaman->gambar;
        if(File::exists($destination)){
            File:: delete($destination);

        }
        halaman::where('id',$id)->delete();
        return redirect('dasboard/halaman')->with('success','data berhasil di hapus');
    }
}
