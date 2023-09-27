<?php

namespace App\Http\Controllers;

use App\Enums\FuelHistoryType;
use App\Http\Requests\CreateFuelHistoryRequest;
use App\Models\Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuelHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generator = Generator::where('user_id', auth()->user()->id)->first();
        if (!$generator) {
            return redirect()->route('generator.create')->with('error', 'You need to create a generator information first.');
        }
        return view('fuel-histories.index', [
            'fuelHistories' => $generator->fuelHistories()->orderByDesc('history_at')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generator = Generator::where('user_id', auth()->user()->id)->first();
        if (!$generator) {
            return redirect()->route('generator.create')->with('error', 'You need to create a generator information first.');
        }
        return view('fuel-histories.create', [
            'generator' => $generator,
            'types' => FuelHistoryType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFuelHistoryRequest $request)
    {
        $generator = Generator::where('user_id', auth()->user()->id)->first();
        if (!$generator) {
            return redirect()->route('generator.create')->with('error', 'You need to create a generator information first.');
        }
        if ($request->type === FuelHistoryType::REFILL && $generator->current_level + $request->amount > $generator->capacity) {
            return redirect()->back()->with('error', 'You cannot refill more than the capacity of the fuel tank.');
        }

        if ($request->type === FuelHistoryType::CONSUMPTION && $generator->current_level - $request->amount < 0 ) {
            return redirect()->back()->with('error', 'You cannot consume more than the current level of the fuel tank.');
        }
        DB::transaction(function () use ($request, $generator) {
            $generator->fuelHistories()->create([
                'amount' => $request->amount,
                'type' => $request->type,
                'history_at' => $request->history_date,
            ]);

            $generator->update([
                'current_level' => match (FuelHistoryType::from($request->type)) {
                    FuelHistoryType::REFILL => $generator->current_level + $request->amount,
                    FuelHistoryType::CONSUMPTION => $generator->current_level - $request->amount,
                },
            ]);
        });

        return redirect()->route('fuel-histories.index')->with('success', 'Fuel history created successfully');
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
