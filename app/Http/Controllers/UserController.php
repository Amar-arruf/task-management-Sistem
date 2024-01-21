<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function mendapatkan_data_user(string $id): array
  {
    $data = User::where('id_user', intval($id))->get();
    $res = [];
    foreach ($data as $key => $value) {
      $res[$key] = $value;
    }
    return $res;
  }

  public function tambah_user(Request $req)
  {
    $password_hash = Hash::make($req->post('password'));

    $user = User::create([
      'nama' => $req->post('nama'),
      'email' => $req->post('email'),
      'password' => $password_hash,
      'img' => $req->post('imageurl')
    ]);

    return 'user berhasil ditambahkan ke database';
  }

  public function edit_user(Request $req, string $id)
  {

    $user = User::where('id_user', intval($id))
      ->update([
        'nama' => $req->input('nama'),
        'email' => $req->input("email"),
        'img' => $req->input("imageurl"),
      ]);

    return 'user berhasil di edit dengan ID: ' . $id;
  }

  public function hapus_user($id)
  {
    $user = User::destroy(intval($id));
    if ($user) {
      return 'data berhasil di hapus dengan ID: ' . $id;
    }
  }
}
