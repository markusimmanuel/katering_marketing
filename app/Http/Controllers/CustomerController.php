<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan halaman dashboard customer
    public function index()
    {
        return view('customer.dashboard');
    }

    // Metode pencarian katering atau merchant
    public function search(Request $request)
    {
        // Implementasikan logika pencarian di sini
        // Misalnya mencari merchant berdasarkan nama atau lokasi
        return view('customer.search_results');
    }
}
