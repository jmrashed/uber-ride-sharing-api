<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update($id, Request $request)
    {
        $u = User::find($id);
        if ($request->name) {
            $u->name = $request->name;
        }
        if ($request->email) {
            $u->email = $request->email;
        }
        $u->save();
        return User::find($id);
    }
}
