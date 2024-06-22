<div class="space-y-6">
    <div>
        <x-input-label for="details" :value="__('Details')"/>
        <x-text-input id="details" name="details" type="text" class="mt-1 block w-full" :value="old('details', $order?->details)" autocomplete="details" placeholder="Details"/>
        <x-input-error class="mt-2" :messages="$errors->get('details')"/>
    </div>
    <div>
        <x-input-label for="products" :value="__('Products')" />
        <select id="products" name="products[]" class="block w-full mt-1 form-multiselect rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @foreach($products as $product)
            <option value="{{ $product->id }}" {{ in_array($product->id, old('products', $order ? $order->products->pluck('id')->toArray() : [])) ? 'selected' : '' }}>{{ $product->name }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('products')" />
    </div>
    <div>
        <x-input-label for="quantity" :value="__('Quantity')" />
        <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" :value="old('quantity', $order->products->first()->pivot->quantity ?? '')" autocomplete="quantity" placeholder="Quantity"/>
        <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
