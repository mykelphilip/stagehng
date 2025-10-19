<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
        public function getFact(Request $request)
    {

        //DECLARE USER INFO 
        $user = [
            'name' => 'Michael Philip Funguy',
            'email' => 'michaelfunguycjnr@gmail.com',
            'stack' => 'Laravel, PHP, Vue.js, MySQL, Docker',
        ];

        //CONSUME CAT FACT API
        $response = Http::get('https://catfact.ninja/fact');
        $response = json_decode($response->body(), true)['fact'];
        $time = \Carbon\Carbon::now('UTC')->toIso8601String();

        //RETURN JSON RESPONSE
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'timestamp' => $time,
            'fact' => $response
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
