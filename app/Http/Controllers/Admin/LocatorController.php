<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLocator;
use App\Models\{
    Game,
    Locator,
    User
};
use Illuminate\Http\Request;

class LocatorController extends Controller
{
    protected $locator;

    public function __construct(
        Locator $locator,
        Game $game,
        User $partner,
        User $client
        )
    {
        $this->locator = $locator;
        $this->game = $game;
        $this->partner = $partner;
        $this->client = $client;

        // $this->middleware(['can:locators']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locators = $this->locator->paginate();

        return view('admin.pages.locators.index', compact('locators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = $this->game->get();
        $partners = $this->partner->get();

        $clients = $this->client->get();

        return view('admin.pages.locators.create', compact('games','partners', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateLocator $$request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLocator $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('locators.index')->with('message', 'Localizador cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$locator = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.locators.show', compact('locator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$locator = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.locators.edit', compact('locator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateLocator  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLocator $request, $id)
    {
        if (!$locator = $this->repository->find($id)) {
            return redirect()->back();
        }

        $locator->update($request->all());

        return redirect()->route('locators.index')->with('message', 'Localizador atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$locator = $this->repository->find($id)) {
            return redirect()->back();
        }

        $locator->delete();

        return redirect()->route('locators.index')->with('message', 'Localizador deletado com sucesso');
    }

    /**
     * Generate QrCode.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function qrcode($identify)
    {
        if (!$locator = $this->repository->where('identify', $identify)->first()) {
            return redirect()->back();
        }

        $tenant = auth()->user->tenant;

        $uri = env('URI_CLIENT') . "/{$tenant->uuid}/{$locator->uuid}";

        return view('admin.pages.locators.qrcode', compact('uri'));
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $locators = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);/*
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%"); */
                                }
                            })
                            ->paginate();

        return view('admin.pages.locators.index', compact('locators', 'filters'));
    }
}
