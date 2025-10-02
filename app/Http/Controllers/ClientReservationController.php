<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReservationController extends Controller
{
    public function index()
    {
        $client = Auth::guard('clients')->user();
        $products = Product::with(['colors' => function ($query) {
            $query->orderBy('name');
        }])->orderBy('name')->get();

        $reservations = $client
            ? $client->reservations()->with(['product', 'color'])->latest()->get()
            : collect();

        return view('client.reservations', compact('client', 'products', 'reservations'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('clients')->user();

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'product_color_id' => ['nullable', 'exists:product_colors,id'],
            'quantity_meters' => ['required', 'integer', 'min:5'],
            'desired_pickup_date' => ['nullable', 'date', 'after_or_equal:today'],
            'notes' => ['nullable', 'string', 'max:600'],
        ]);

        $reservation = Reservation::create([
            'client_id' => $client->id,
            'product_id' => $validated['product_id'],
            'product_color_id' => $validated['product_color_id'] ?? null,
            'quantity_meters' => $validated['quantity_meters'],
            'desired_pickup_date' => $validated['desired_pickup_date'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'status' => 'pendiente',
        ]);

        return redirect()
            ->route('client.reservations.index')
            ->with('status', 'Reserva registrada con código #' . str_pad((string) $reservation->id, 5, '0', STR_PAD_LEFT));
    }
}
