<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orderProducts = OrderProduct::paginate();
        dd($orderProducts);

        return view('order-product.index', compact('orderProducts'))
            ->with('i', ($request->input('page', 1) - 1) * $orderProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orderProduct = new OrderProduct();

        return view('order-product.create', compact('orderProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderProductRequest $request): RedirectResponse
    {
        OrderProduct::create($request->validated());

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-product.show', compact('orderProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-product.edit', compact('orderProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderProductRequest $request, OrderProduct $orderProduct): RedirectResponse
    {
        $orderProduct->update($request->validated());

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrderProduct::find($id)->delete();

        return Redirect::route('order-products.index')
            ->with('success', 'OrderProduct deleted successfully');
    }
}
