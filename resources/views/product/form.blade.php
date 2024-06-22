<div class="space-y-6">
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product ? $product->name : '')" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $product ? $product->description : '')" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>

    <div>
        <x-input-label for="price" :value="__('Price')"/>
        <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" :value="old('price', $product ? $product->price : '')" autocomplete="price" placeholder="Price"/>
        <x-input-error class="mt-2" :messages="$errors->get('price')"/>
    </div>

    <div>
        <x-input-label for="weight" :value="__('Weight')"/>
        <x-text-input id="weight" name="weight" type="number" step="0.01" class="mt-1 block w-full" :value="old('weight', $product ? $product->weight : '')" autocomplete="weight" placeholder="Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')"/>
    </div>

    <div>
        <x-input-label for="dimensions" :value="__('Dimensions')"/>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <x-text-input id="length" name="dimensions[length]" type="number" step="0.01" class="mt-1 block w-full" :value="old('dimensions.length', $product ? ($product->dimensions['length'] ?? '') : '')" autocomplete="off" placeholder="Length"/>
                <x-input-error class="mt-2" :messages="$errors->get('dimensions.length')"/>
            </div>
            <div>
                <x-text-input id="width" name="dimensions[width]" type="number" step="0.01" class="mt-1 block w-full" :value="old('dimensions.width', $product ? ($product->dimensions['width'] ?? '') : '')" autocomplete="off" placeholder="Width"/>
                <x-input-error class="mt-2" :messages="$errors->get('dimensions.width')"/>
            </div>
            <div>
                <x-text-input id="height" name="dimensions[height]" type="number" step="0.01" class="mt-1 block w-full" :value="old('dimensions.height', $product ? ($product->dimensions['height'] ?? '') : '')" autocomplete="off" placeholder="Height"/>
                <x-input-error class="mt-2" :messages="$errors->get('dimensions.height')"/>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
