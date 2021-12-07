<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLocator;
use App\Models\Locator;
use Illuminate\Http\Request;

class ControllerLocator extends Controller
{
    protected $repository;

    public function __construct(Locator $locator)
    {
        $this->repository = $locator;

        // $this->middleware(['can:locators']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locators = $this->repository->paginate();

        return view('admin.pages.locators.index', compact('locators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.locators.create');
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
