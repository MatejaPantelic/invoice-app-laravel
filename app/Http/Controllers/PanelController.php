<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $users=User::all();
        $invoices=Invoice::all();
        $companies=Company::all();
        $clients=Client::all();
        return view('admin.panel')->with([
            'invoices'=>$invoices,
            'users'=>$users,
            'companies'=>$companies,
            'clients'=>$clients,
        ]);
    }
}
