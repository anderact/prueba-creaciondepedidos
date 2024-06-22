<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Products') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Products') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('products.create') }}" class="hidden rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="overflow-x-auto mt-6">
                        <div class="max-w-full align-middle">
                            <table class="w-full table-fixed divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-16 py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        <th scope="col" class="min-w-max py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
                                        <th scope="col" class="min-w-max py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Description</th>
                                        <th scope="col" class="min-w-max py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Price</th>
                                        <th scope="col" class="min-w-max py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Weight</th>
                                        <th scope="col" class="min-w-max py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Dimensions</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @php $i = 0; @endphp
                                    @foreach ($products as $product)
                                        <tr class="{{ $loop->even ? 'even:bg-gray-50' : 'odd:bg-white' }}">
                                            <td class="w-16 whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            <td class="min-w-max whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">{{ $product->name }}</td>
                                            <td class="min-w-max whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">{{ $product->description }}</td>
                                            <td class="min-w-max whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->price }}</td>
                                            <td class="min-w-max whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->weight }}</td>
                                            <td class="min-w-max whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
                                                @if ($product->dimensions)
                                                    Width: {{ $product->dimensions['width'] ?? '' }}, Height: {{ $product->dimensions['height'] ?? '' }}, Length: {{ $product->dimensions['length'] ?? '' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    <a href="{{ route('products.show', $product->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="hidden text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('products.destroy', $product->id) }}" class="hidden text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-product-{{ $product->id }}').submit(); }">{{ __('Delete') }}</a>
                                                </form>
                                                <form id="delete-product-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4 px-4">
                        {!! $products->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
