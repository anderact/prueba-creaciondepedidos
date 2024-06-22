<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orders = Order::where('user_id', Auth::id())->paginate();

        return view('order.index', compact('orders'))
            ->with('i', ($request->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $order = new Order();
        $products = Product::all();

        return view('order.create', compact('order', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $order = new Order();
        $order->details = $validatedData['details'];
        $order->user_id = Auth::id();
        $order->save();

        $product_id = $validatedData['products'][0];
        $quantity = $validatedData['quantity'];

        $order->products()->attach($product_id, ['quantity' => $quantity]);

        return Redirect::route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $order = Order::find($id);

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $order = Order::find($id);
        $products = Product::all();

        return view('order.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return Redirect::route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Order::find($id)->delete();

        return Redirect::route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
