<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Information') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto">
        @if ($message = Session::get('success'))
            <div class="bg-green-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <span class="text-green-800">{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('danger'))
            <div class="bg-red-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor" d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
                <span class="text-red-800">{{ $message }}</span>
            </div>
        @endif

    <div class=" flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="rounded my-6">
                <div class="relative w-full px-1 max-w-full flex-grow flex-1 text-right">
                    <a href="{{ route('products.create') }}"
                    class="bg-indigo-500 mb-5  text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">Add a Product</a>
                </div>
                               
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Product Name</th>
                            <th class="py-3 px-6 text-left">Description</th>
                            <th class="py-3 px-6 text-center">Brand</th>
                            <th class="py-3 px-6 text-center">Price</th>
                            <th class="py-3 px-6 text-center">Quantity</th>
                            <th class="py-3 px-6 text-center">Stock</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($products as $products)
                                <tr>
                                    <td class="border px-4 py-2">{{ $products->product_name }}</td>
                                    <td class="border px-4 py-2">{{ $products->description }}</td>
                                    <td class="border px-4 py-2">{{ $products->brand }}</td>
                                    <td class="border px-4 py-2">{{ $products->price }}</td>
                                    <td class="border px-4 py-2">{{ $products->quantity }}</td>
                                    <td class="border px-4 py-2">{{ $products->alert_stock }}</td>
                                    <td class="py-3 px-6 p-2 text-center">
                                        <form action="{{ route('products.destroy',$products->id) }}" method="POST">        
                                            <a href="{{ route('products.edit', $products->id) }}"
                                                class="text-sm  text-indigo-500 hover:text-indigo-800">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn ml-2 text-sm text-red-500 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
