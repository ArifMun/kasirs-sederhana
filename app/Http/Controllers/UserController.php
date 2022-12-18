<?php

namespace App\Http\Controllers;

// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return \view('users.user', compact('users'));
    }

    public function lihat_user($id)
    {
        $users = User::findOrFail($id);
        return \view('users.lihat-user', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return \view('users.edit-user', compact('users'));
    }

    public function edit_user(Request $request, $id)
    {

        $users = User::where('id', $id);
        $validate = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'username'  => 'required|min:5|max:255|unique:users',
                'password'  => 'required|min:5|max:255'
            ]
        );

        if ($validate->fails()) {
            // $input = $request->all();
            return \back()->with('success', 'Data Tidak Tersimpan');
        } else {
            $users  = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->alamat = $request->alamat;
            $users->username = $request->username;
            $users->password = Hash::make($request->password);
            $users->update();
            // \dd($validate);
            return \redirect()->route('user')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function tambah()
    {
        return \view('users.tambah-user');
    }

    public function tambah_user(Request $request)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'username'  => 'required|min:5|max:255|unique:users',
                'password'  => 'required|min:5|max:255'
            ],
            [
                'username.min'      => 'Username Minimal 3 karakter',
                'username.unique'   => 'Username sudah digunakan',
                'password.min'      => 'Password Minimal 5 karakter'
            ]
        );

        if ($validate->fails()) {
            return \back()->with('warning', 'Data Tidak Tersimpan')
                ->withErrors($validate);
        } else {

            User::create([
                'name'      => $request->name,
                'username'  => $request->username,
                'email'     => $request->email,
                'alamat'    => $request->alamat,
                'password'  => Hash::make($request->password)
            ]);
        }
        return \redirect()->route('user')->with('success', 'Data Berhasil Disimpan');
    }

    public function hapus($id)
    {
        $user = User::find($id);

        $user->delete();

        return \redirect()->route('user')->with('success', 'Data Berhasil Dihapus');
    }
}