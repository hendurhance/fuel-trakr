<?php

namespace App\Http\Controllers;

use App\Enums\FuelHistoryType;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): \Illuminate\View\View
    {
        $generator = auth()->user()->generator?->with('fuelHistories')->first();
        $fuelHistoryCount = $generator?->fuelHistories()->count();
        $fuelRefillAmount = $generator?->fuelHistories()->where('type', FuelHistoryType::REFILL)->sum('amount');
        $fuelConsumptionAmount = $generator?->fuelHistories()->where('type', FuelHistoryType::CONSUMPTION)->sum('amount');
        return view('dashboard', [
            'generator' => $generator,
            'generatorHistoryCount' => $fuelHistoryCount,
            'generatorRefillAmount' => $fuelRefillAmount,
            'generatorConsumptionAmount' => $fuelConsumptionAmount,
        ]);
    }
}
