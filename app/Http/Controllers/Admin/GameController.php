<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateGame;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $repository;

    public function __construct(Game $game)
    {
        $this->repository = $game;

        // $this->middleware(['can:games']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this->repository->paginate();

        return view('admin.pages.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateGame  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateGame $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('games.index')->with('message', 'Jogo cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$game = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$game = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateGame  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateGame $request, $id)
    {
        if (!$game = $this->repository->find($id)) {
            return redirect()->back();
        }

        $game->update($request->all());

        return redirect()->route('games.index')->with('message', 'Jogo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$game = $this->repository->find($id)) {
            return redirect()->back();
        }

        $game->delete();

        return redirect()->route('games.index')->with('message', 'Jogo deletado com sucesso');
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

        $games = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);/*
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%"); */
                                }
                            })
                            ->paginate();

        return view('admin.pages.games.index', compact('games', 'filters'));
    }
}
