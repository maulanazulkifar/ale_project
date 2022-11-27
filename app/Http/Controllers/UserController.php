<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function getAllUser() {
        // mengambil data dari table users
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('admin/users', [
            'data' => $users,
        ]);
    }

    public function getListUser() {
        // mengambil data dari table users
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return response()->json(
            [
                'data' => $users,
            ]
        );
    }

    public function addUser(Request $request) {
        try {
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role
            ]);
            return [
                'title' => 'Berhasil Menambah!',
                'message' => 'Data baru sudah disimpan.'
            ];
        } catch (err $err) {
            return [
                'title' => 'Gagal Ditambahkan!',
                'message' => $err
            ];
        }
    }
}
