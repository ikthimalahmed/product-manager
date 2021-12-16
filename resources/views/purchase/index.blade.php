<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Product') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto">
        @if ($message = Session::get('success'))
            <div class="bg-green-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <span class="text-green-800">{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('danger'))
            <div class="bg-red-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor"
                        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
                <span class="text-red-800">{{ $message }}</span>
            </div>
        @endif

        <div class="flex h-screen items-center justify-center">
            <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/3">
                <div class="flex justify-center py-4">
                    <div class="flex bg-indigo-400 rounded-full md:p-4 p-2 border-2 border-indigo-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>

                <form method="POST" action="{{ route('purchase.store') }}">
                    @csrf
                    <div class="form-element flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Purchase a Product</h1>
                        </div>
                    </div>

                    <div class="form-element grid grid-cols-1 mt-5 mx-7">
                        <select id="product_name" class="form-control" style=width:100%' data-select2-id="8"
                            tabindex="-1" aria-hidden="true" name="product_name">
                            @foreach ($product as $product)
                                <option value="{{ $product->product_name }}" name="product_name">
                                    {{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-element grid grid-cols-1 mt-5 mx-7">
                        <label for="quantity"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Quantity</label>
                        <input
                            class="py-2 px-3 rounded-lg  mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Quantity" id="quantity" @error('quantity') is-invalid @enderror"
                            name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity"
                            autofocus></input>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-element grid grid-cols-1 mt-5 mx-7">
                        <label for="customer_name"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Customer
                            Name</label>
                        <input
                            class="py-2 px-3 rounded-lg  mt-1 focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent"
                            type="text" placeholder="Customer Name" id="customer_name" @error('customer_name')
                            is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" required
                            autocomplete="customer_name" autofocus></input>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button type="submit"
                            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Purchase</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class=" flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="lg:w-4/5">
            <div class="rounded mb-5">
                <h1 class="mb-5 text-2xl">Purchased Items</h1>

                <table class="min-w-max w-full table-auto border-2">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Product Name</th>
                            <th class="py-3 px-6 text-left">Quantity</th>
                            <th class="py-3 px-6 text-center">Purchased By</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 text-sm font-light">
                        <tr>
                            @foreach ($purchase as $purchase => $row)
                                <td class="py-3 px-6 text-left">{{ $purchaseDetails[$purchase]['product_name'] }}
                                </td>
                                <td class="py-3 px-6 text-left">{{ $purchaseDetails[$purchase]['quantity'] }}</td>
                                <td class="py-3 px-6 text-center">{{ $row->customer_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
