<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $order->name ?? __('Show') . " " . __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Show') }} Order</h1>
                            <p class="mt-2 text-sm text-gray-700">Details of {{ __('Order') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('orders.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mt-6 border-t border-gray-100">
                                    <dl class="divide-y divide-gray-100">

                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Details</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $order->details }}</dd>
                                        </div>

                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Created by</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                @php
                                                $userName = App\Models\User::where('id', $order->user_id)->value('name');
                                                @endphp
                                                {{ $userName }}
                                            </dd>
                                        </div>

                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Products</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                <ul class="divide-y divide-gray-200">
                                                    @foreach ($order->products as $product)
                                                    @php
                                                        $dimensions = is_string($product->dimensions) ? json_decode($product->dimensions, true) : $product->dimensions;
                                                    @endphp
                                                        <li class="py-2 flex flex-col">
                                                            <span class="font-semibold">{{ $product->name }}</span>
                                                            <span>Quantity: {{ $product->pivot->quantity }}</span>
                                                            <span>Price: ${{ number_format($product->price, 2) }}</span>
                                                            @if (is_array($dimensions))
                                                                <span>Dimensions:
                                                                    {{ $dimensions['length'] }} x
                                                                    {{ $dimensions['width'] }} x
                                                                    {{ $dimensions['height'] }}
                                                                </span>
                                                            @else
                                                                <span>Dimensions: Not available</span>
                                                            @endif
                                                            <span>Description: {{ $product->description }}</span>
                                                            <span>SKU: {{ $product->sku }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </dd>
                                        </div>

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
