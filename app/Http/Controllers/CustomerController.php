<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $customer = User::where('role', 'customer')
            ->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('alamat', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('notel', 'LIKE', '%' . $request->search . '%');
            })
            ->get();
        }else{
            $customer = User::where('role','customer')->get();
        }
       return view('admin.customer.index', compact(['customer']));
    }
    public function show($id)
    {
         // Mendapatkan pengguna yang sedang login
        $profile = User::where('id', $id)->first();
    
        return view('admin.customer.detail', compact('profile'));
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
    return redirect()->route('customer.admin')->with('success','Berhasil menambahkan data');
    }

    public function destroy($id)
    {
        $halaman=user::find($id);
        $destination ='profile/'.$halaman->avatar;
        if(File::exists($destination)){
            File:: delete($destination);

        }
        user::where('id',$id)->delete();
        return redirect()->route('customer.admin')->with('success','data berhasil di hapus');
    }
}
