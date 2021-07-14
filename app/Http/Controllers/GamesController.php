<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Exception;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function show(Games $game) {
        return response()->json($game,200);
    }

    public function search(Request $request) {
        $request->validate(['key'=>'string|required']);

        $games = Games::where('game_name','like',"%$request->key%")
            ->orWhere('description','like',"%$request->key%")->get();

        return response()->json($games, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'game_name' => 'string|required',
            'description' => 'string|required',
            'player_name' => 'string|required',
            'player_id' => 'numeric|required',
            'played_on' => 'date|required',
        ]);

        try {
            $game = Games::create($request->all());
            return response()->json($game, 202);
        }catch(Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }

    }

    public function update(Request $request, Games $game) {
        try {
            $game->update($request->all());
            return response()->json($game, 202);
        }catch(Exception $ex) {
            return response()->json(['message'=>$ex->getMessage()], 500);
        }
    }

    public function destroy(Games $game) {
        $game->delete();
        return response()->json(['message'=>'Game deleted.'],202);
    }

    public function index() {
        $games = Games::orderBy('game_name')->get();
        return response()->json($games, 200);
    }
}
