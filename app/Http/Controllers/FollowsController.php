<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function store(Request $request, $id)
    {
       $user = User::find($id);
       Auth::user()->follow($user);
       return back();
    }


    public function destroy($id)
    {
        $user = User::find($id);
        Auth::user()->unfollow($user);
        return back();
    }
}
