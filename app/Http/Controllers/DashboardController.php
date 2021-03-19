<?php

namespace App\Http\Controllers;

use App\Product;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');

    }

    public function index()
    {
        $products = Product::all();

        return view('pages.dashboard.index', compact('products'));
    }

    public function adminDashboard()
    {
        $transactions = \App\Transaction::all();

        return view('pages.dashboard.adminDashboard', compact('transactions'));
    }


}
