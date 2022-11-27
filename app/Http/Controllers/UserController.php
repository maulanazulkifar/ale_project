<?php

namespace App\Http\Controllers;


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
}
