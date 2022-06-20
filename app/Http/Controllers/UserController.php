<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = User::latest()->get();

        return response()->json([
            'message' => $data,
            'status' => 200
        ], 200);
    }

    public function store(Request $req) {
        $data = User::create([
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        return response()->json([
            'message' => $data,
            'status' => 200
        ], 200);
    }

    public function edit(User $user) {
        return response()->json([
            'message' => $user,
            'status' => 200
        ], 200);
    }

    public function update(Request $req, User $user) {
        $data = $user->update([
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email
        ]);

        return response()->json([
            'message' => $data,
            'status' => 200
        ], 200);
    }

    public function destroy(User $user) {
        $data = $user->delete();

        return response()->json([
            'message' => $data,
            'status' => 200
        ], 200);
    }
}
