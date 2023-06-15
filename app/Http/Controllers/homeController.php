<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
    
            if (user::where('id', $user->id)->first() == null || user::where('id', $user->id)->first() == ' ') {
                $users = 1;
            } else {
                $users = user::where('id', $user->id)->first();
            }
        } else {
            // Handle the case when no user is authenticated
            $users = null;
        }
        $faq = Faq::all();
        $admin=User::where('role','admin')->first(); 
        $userCount=User::where('role','owner')->count();
        return view('customer.home', compact('userCount','faq','admin','users'));
    }
}
