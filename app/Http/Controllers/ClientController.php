<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index')->with([
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ClientRequest $request)
    {

        $client = Client::create($request->all());
        return redirect()
            ->route('clients.index')
            ->withSuccess('The client '. $request->name.' '.$request->surname.' was created.');

    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {
            return view('clients.edit')
                ->with([
                    'client' => $client,
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $data = $request->validated();

        $client->fill($data);
        $client->save();

        return redirect()->back()
            ->withSuccess('The client with id ' . $client->id . ' has been updated.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     */
    public function destroy(Client $client): RedirectResponse
    {
        Client::where('id', $client->id)->delete();
        return  redirect()->back()
            ->withSuccess('The client with id ' . $client->id . ' has been deleted.');

    }

}
