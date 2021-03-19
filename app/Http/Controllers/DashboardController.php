<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Appointment\Entities\Appointment;
use Modules\Client\Entities\Client;
use Modules\Lead\Entities\Lead;
use Modules\Sales\Entities\FurtherTransaction;
use Modules\Sales\Entities\Transaction;
use Modules\Ticket\Entities\Assignee;
use Modules\Ticket\Entities\Ticket;
use Yajra\DataTables\Facades\DataTables;

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
