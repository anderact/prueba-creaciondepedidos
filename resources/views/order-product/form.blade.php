<div class="space-y-6">
    
    <div>
        <x-input-label for="order_id" :value="__('Order Id')"/>
        <x-text-input id="order_id" name="order_id" type="text" class="mt-1 block w-full" :value="old('order_id', $orderProduct?->order_id)" autocomplete="order_id" placeholder="Order Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('order_id')"/>
    </div>
    <div>
        <x-input-label for="product_id" :value="__('Product Id')"/>
        <x-text-input id="product_id" name="product_id" type="text" class="mt-1 block w-full" :value="old('product_id', $orderProduct?->product_id)" autocomplete="product_id" placeholder="Product Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('product_id')"/>
    </div>
    <div>
        <x-input-label for="quantity" :value="__('Quantity')"/>
        <x-text-input id="quantity" name="quantity" type="text" class="mt-1 block w-full" :value="old('quantity', $orderProduct?->quantity)" autocomplete="quantity" placeholder="Quantity"/>
        <x-input-error class="mt-2" :messages="$errors->get('quantity')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>