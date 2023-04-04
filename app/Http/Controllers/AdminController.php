<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Session;
use App\Models\paket;
use App\Models\User;

class AdminController extends Controller
{
  public function index()
  {
    $data = User::all()->first;
    return view('/admin/layout/index')->with('data', $data);
  }


  public function login()
  {
    return view('/depan/login');
  }
  public function flogin(Request $request)
  {
    $data = $request->validate([
      'username' => 'required|max:100',
      'password' => 'required|min:8'
    ]);
    if (Auth::attempt($data)) {
      if (Auth()->user()->role == 'admin') {
        alert()->success('Login Berhasil');
        return redirect('/admin');
      }
      if (Auth()->user()->role == 'owner') {
        alert()->success('Login Berhasil');
        return redirect('/owner');
      }
      if (Auth()->user()->role == 'kasir') {
        alert()->success('Login Berhasil');
        return redirect('/kasir');
      } else {
        alert()->error('Login Gagal!');
        return view('/');
      }
    }


    return redirect('/');
  }
  public function logout()
  {
    session::flush();
    Auth::logout();
    return redirect('/');
  }
}
