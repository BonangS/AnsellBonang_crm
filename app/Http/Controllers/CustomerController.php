<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Layanan;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('layanan')->get(); // Ambil dari tabel customers
        return view('customers.index', compact('customers'));
    }
}
