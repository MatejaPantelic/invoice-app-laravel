<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\InvoiceRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\UnitOfMeasure;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $auth = auth()->user()->company_id;
        $invoices = DB::table('invoices')
            ->join('clients', 'invoices.client_id', '=', 'clients.id')
            ->join('users', 'invoices.user_id', '=', 'users.id')
            ->select('invoices.*', 'clients.name AS c_name', 'clients.surname AS c_surname', 'users.name AS u_name', 'users.surname AS u_surname')
            ->where('invoices.company_id', '=', "$auth")
            ->paginate(10);
        return view('invoices.index')
            ->with([
                'invoices' => $invoices,
                'request' => $request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new blog post.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated());
        return redirect()
            ->route('invoices.show', ['invoice' => $invoice])
            ->withSuccess("The Invoice has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);
        $client = Client::findOrFail($invoice->client_id);
        $user = User::findOrFail($invoice->user_id);
        $company=Company::where('id','=',$user->company_id)->get();
        $units = UnitOfMeasure::all();
        $invoice_item = InvoiceItem::where('invoice_id', '=', $invoice->id)->get();
        return view('invoices.show')->with([
            'invoice' => $invoice,
            'client' => $client,
            'user' => $user,
            'invoice_item' => $invoice_item,
            'units' => $units,
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        $currentClientId = $invoice->client_id;
        $currentDateOfPayment = $invoice->payment_term;
        $currentStatus = $invoice->status;
        return view('invoices.edit')
            ->with([
                'invoice' => $invoice,
                'clients' => $clients,
                'currentClientId' => $currentClientId,
                'currentDateOfPayment' => $currentDateOfPayment,
                'currentStatus' => $currentStatus,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update([
            'client_id' => $request->client,
            'payment_term' => $request->payment_term,
            'status' => $request->status,
            'invoice_number'=>$request->invoice_number
        ]);
        return redirect()
            ->route('invoices.index')
            ->withSuccess('The invoice with id ' . $invoice->id . ' was edited.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateDescription(Request $request, Invoice $invoice)
    {
        $invoice->update(['description' => $request->description]);
        return redirect()
            ->route('invoices.update', ['invoice' => $invoice->id])
            ->withSuccess('The invoice with id ' . $invoice->id . ' has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice_items = InvoiceItem::where('invoice_id', '=', $invoice->id)->get();
        foreach ($invoice_items as $invoice_item) {
            $invoice_item->delete();
        }
        $invoice->delete();
        return redirect()
            ->route('invoices.index')
            ->withSuccess('The invoice with id ' . $invoice->id . ' was removed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Application|Factory|View
     */
    public function find(Request $request)
    {
        $auth = auth()->user()->company_id;

        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->addDays(1)->format('Y-m-d');

        //search...
        $invoices = DB::table('invoices')
            ->join('users', 'invoices.user_id', '=', 'users.id')
            ->join('clients', 'invoices.client_id', '=', 'clients.id')
            ->select('invoices.*', 'clients.name AS c_name', 'clients.surname AS c_surname', 'users.name AS u_name', 'users.surname AS u_surname')
            ->where('clients.name', 'LIKE', '%'.$request['search'].'%')
            ->get();

        //dates and status...
        $filtered = $invoices
            ->where('company_id', '==', $auth)
            ->whereBetween('created_at', [$start, $end])
            ->whereIn('status', $request['status']);
//            ->paginate(10)

        return view('invoices.filter')
            ->with([
                'invoices' => $filtered,
                'request' => $request->all(),
            ]);
    }
}
