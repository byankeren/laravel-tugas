<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Game;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('games.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'author_id' => 'required',
            'tag_id' => 'required'
        ]);
        $game = Game::create(
            [
                'name' => $validated['name'],
                'author_id' => $validated['author_id'],
            ]
        );
        $game->tags()->attach($validated['tag_id']);
        return redirect('/games');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        $game = Game::where('id', '=', $game->id)->with('tags')->get();
        $game = $game[0];
        // return $game->tags;
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('games.edit', compact('game', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // return $request;
        $validated = $request->validate([
            'name' => 'required',
            'author_id' => 'required',
            'tag_id' => 'required'
        ]);
        $game->update([
            'name' => $validated['name'],
            'author_id' => $validated['author_id'],
        ]);
        $game->tags()->sync($validated['tag_id']);
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
