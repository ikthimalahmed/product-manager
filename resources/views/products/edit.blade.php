<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="flex h-screen items-center justify-center mt-10 mb-10">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
                <div class="flex bg-indigo-400 rounded-full md:p-4 p-2 border-2 border-indigo-500">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-element flex justify-center">
                    <div class="flex">
                        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update a Product</h1>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label for="product_name"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product Name</label>
                    <input value="{{ $product->product_name }}"
                        class=" form-control py-2 px-3 rounded-lg mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                        type="text" placeholder="Product Name" id="product_name" @error('product_name') is-invalid
                        @enderror" name="product_name" value="{{ old('product_name') }}" required
                        autocomplete="product_name" autofocus />
                    @error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-element grid grid-cols-1 mt-5 mx-7">
                    <label for="description"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product
                        Description</label>
                    <input value="{{ $product->description }}"
                        class="py-2 px-3 rounded-lg  mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                        type="text" placeholder="Product Description" id="description" @error('description') is-invalid
                        @enderror" name="description" value="{{ old('description') }}" required
                        autocomplete="description" autofocus></input>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-element grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                        <label for="brand"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product
                            Brand</label>
                        <input value="{{ $product->brand }}"
                            class="form-control py-2 px-3 rounded-lg mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Product Brand" id="brand" @error('brand') is-invalid @enderror"
                            name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus />
                    </div>
                    <div class="grid grid-cols-1">
                        <label for="price"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product
                            Price</label>
                        <input value="{{ $product->price }}"
                            class="py-2 px-3 rounded-lg  mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Product Price" id="price" @error('price') is-invalid @enderror"
                            name="price" value="{{ old('price') }}" required autocomplete="price" autofocus />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                        <label for="qunatity"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Product
                            Quantity</label>
                        <input value="{{ $product->quantity }}"
                            class="py-2 px-3 rounded-lg mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Product Quantity" id="quantity" @error('quantity') is-invalid
                            @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity"
                            autofocus />
                    </div>
                    <div class="grid grid-cols-1">
                        <label for="alert_stock"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Stock</label>
                        <input value="{{ $product->alert_stock }}"
                            class="py-2 px-3 rounded-lg  mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Stock" id="alert_stock" @error('alert_stock') is-invalid @enderror"
                            name="alert_stock" value="{{ old('alert_stock') }}" required autocomplete="alert_stock"
                            autofocus />
                    </div>
                </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="submit"
                        class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
                </div>
            </form>

        </div>
    </div>
    </div>
</x-app-layout>
