<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGeneratorRequest;
use App\Models\Generator;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->generator) {
            return redirect()->route('dashboard');
        }
        return view('generator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGeneratorRequest $request)
    {
        if(auth()->user()->generator) {
            return redirect()->route('dashboard');
        }
        Generator::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'current_level' => $request->current_level,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('dashboard')->with('success', 'Generator created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
