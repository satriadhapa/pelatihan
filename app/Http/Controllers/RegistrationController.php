<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\models\Registration;

class RegistrationController extends Controller
{
    public function create(){
        // ambil data kategori
        $categories = Category::all();
        // tampilkan halaman pendaftaran
        return view('pendaftaran.create',compact('categories'));
    }
    public function store(Request $request){
        // validasi
        $this-> validate($request,[
            'nim'           => 'required',
            'nama'          => 'required',
            'alasan'        => 'required',
            'category_id'   => 'required'
        ]);
        // proses simpan data
        Registration::create([
            'nim'           => $request ->nim,
            'nama'          => $request ->nama,
            'alasan'        => $request ->alasan,
            'category_id'   => $request ->category_id,
        ]);
        // alihkan ke halaman sukses
        return redirect()->route('pendaftaran.sukses');
    }
    public function sukses(){
        return view('pendaftaran.suksess');
    }
}
