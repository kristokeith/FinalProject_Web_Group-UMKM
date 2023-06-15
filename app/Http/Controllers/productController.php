<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use \App\Models\User;
use App\Models\rating;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function show($id)
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
        $product=halaman::where('id',$id)->first();
        return view('customer.product', compact('product','users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string|max:255',
        ]);

        $rating = new rating();
        $rating->user_id = auth()->id();
        $rating->halaman_id = $request->product_id;
        $rating->rating = $request->rating;
        $rating->review = $request->review;
        $rating->save();

        return back();
    }
}
