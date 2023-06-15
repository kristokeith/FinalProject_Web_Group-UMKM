<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Profile2Controller extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        $profile = User::where('id', $user->id)->first();
    
        return view('customer.editProfile', compact('profile'));
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
    
    $user->save();
    return redirect()->route('profile2.index')->with('success','Berhasil menambahkan data');
    }
}
