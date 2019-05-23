<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    public function show($id)
    {
        $user = User::find($id);
        
        if ($user->id==Auth::user()->id) {
            return view('users.show', [
            'user' => $user,
            ]);
        }
        return view('\welcome');
    }
    }
}