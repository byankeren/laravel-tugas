<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.games', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('games.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $author = $request->author;
        Game::create([
            'name' => $name,
            'author_id' => $author
        ]);
        return redirect('/games');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $authors = Author::all();
        return view('games.edit', compact('game', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // return $request;
        $game->update([
            'name' => $request->name,
            'author_id' => $request->author,
        ]);
        return redirect('/games');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect('/games');
    }
}
