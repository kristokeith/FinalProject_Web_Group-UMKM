<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        $profile = User::where('id', $user->id)->first();
    
        return view('dasboard.profile.profile', compact('profile'));
    }
   
    public function update(Request $r, $id)
    {
        
    
    $user=User::find($id);
    if($r->hasFile('pdf_file')){
        $destination ='file/'.$user->perijinan;
        if(File::exists($destination)){
            File:: delete($destination);

        }
        $r->file('pdf_file')->move('file/', $r->file('pdf_file')->getClientOriginalName());
        $user-> perijinan = $r->file('pdf_file')->getClientOriginalName();
        
    }
        
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
    
    $user->save();
    return redirect()->route('profile.index')->with('success','Berhasil menambahkan data');
    }
}
