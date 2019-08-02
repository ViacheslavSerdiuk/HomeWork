<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.myprofile',['user'=>$user]);
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));

        $user->save();
        return redirect()->route('profile.index')->with('success','Profile has been updated!!!');

    }

    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->get();

        return view('pages.profile',['user'=>$user,'posts'=>$posts]);
    }
}
