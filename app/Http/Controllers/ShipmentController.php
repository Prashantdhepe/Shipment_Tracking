<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Shipment::query();

        if ($request->filled('search')) {
            $query->where('tracking_number', 'like', '%' . $request->search . '%');
        }

        $shipments = $query ->orderBy('created_at', 'desc')
                    ->paginate(10)
                    ->withQueryString();


        return view('shipments.index', compact('shipments'));
    }

    public function show(Shipment $shipment)
    {
        $shipment->load('statusLogs');

        return view('shipments.show', compact('shipment'));
    }
}
