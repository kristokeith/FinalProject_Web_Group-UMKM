<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UmkmRegistration;
use Illuminate\Support\Facades\File;

class UmkmRegistController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $umkm = User::where('role', 'owner')
            ->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('alamat', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('notel', 'LIKE', '%' . $request->search . '%');
            })
            ->get();
        }else{
            $umkm = User::where('role','owner')->get();
        }
       return view('admin.umkm.index', compact(['umkm']));
    }
    public function show($id)
    {
         // Mendapatkan pengguna yang sedang login
        $profile = User::where('id', $id)->first();
    
        return view('admin.umkm.detail', compact('profile'));
    }
    public function update(Request $r, $id)
    {
        
    
    $user=User::find($id);    
    if($r->hasFile('profile')){
        $destination ='profile/'.$user->avatar;
        if(File::exists($destination)){
            File:: delete($destination);

        }
        $r->file('profile')->move('profile/', $r->file('profile')->getClientOriginalName());
        $user-> avatar = $r->file('profile')->getClientOriginalName();
        
    }
    $user->name=$r->name;
    $user->notel=$r->phone;
    $user->alamat=$r->address;
    $user->email=$r->email;
    
    $user->save();
    return redirect()->route('umkm.admin')->with('success','Berhasil menambahkan data');
    }
    public function destroy($id)
    {
        $halaman=user::find($id);
        $destination ='profile/'.$halaman->avatar;
        if(File::exists($destination)){
            File:: delete($destination);

        }
        user::where('id',$id)->delete();
        return redirect()->route('umkm.admin')->with('success','data berhasil di hapus');
    }
}
