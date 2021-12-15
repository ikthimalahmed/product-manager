<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products to cart') }}
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
            <div
                id="app"
                class="rounded my-6"
            >
                <div class="relative w-full px-1 max-w-full flex-grow flex-1">
                    <span v-show="loading">Loading...</span>
                    <div class="relative mb-10">
                        <div class="flex">
                            <div class=" flex-grow">
                                <input type="text" name="" id="" v-model="search_query" class="p-3 text-xs leading-none rounded-l w-full appearance-none">
                            </div>
                            <button
                            class="bg-indigo-500 flex-shrink-0 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-3 rounded-r outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="button" @click.prevent="search()">Search</button>
                        </div>
    
                        <div>
                            <span
                                v-for="product in results"
                                @click="addToCart(product)"
                                class="block cursor-pointer p-3 text-xs bg-white rounded mb-1 border-b border-gray-200"
                            >
                                @{{product.product_name}}
                            </span>
                        </div>

                    </div>

                </div>
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Product Name</th>
                            <th class="py-3 px-6 text-center">Price</th>
                            </tr>
                        </thead>
                        
                        <tbody
                            id=""
                            class="text-gray-600 text-sm font-light"
                        >
                                <tr
                                    v-if="cart.length > 0"
                                    v-for="item in cart"
                                >
                                <td class="py-3 px-6 text-left">@{{item.product_name}}</td>
                                <td class="py-3 px-6 text-center">@{{item.price}}</td>
                            </tr>
                        </tbody>
                        <tr v-if="cart.length === 0 ">
                            <td colspan="6" class="text-center p-4">Nothing in the cart</td>
                        </tr>
                </table>
            </div>
        </div>
        <script>
            (function() {
                var app = new Vue({
                    el: '#app',
                    data: {
                        search_query: '',

                        results: null,
                        cart: [],
                        loading: false
                    },
                    mounted() {
                        console.log('here')
                    },
                    methods: {
                        search() {
                            console.log('here 2')
                            let vm = this;
                            if(this.search_query.length > 3) {
                                this.loading = true;
                                axios
                                    .get('/search/'+this.search_query)
                                    .then(function(response) {
                                        this.loading = false;
                                        vm.results = response.data;
                                        console.log('res', vm.results)
                                    })
                            }
                            
                        },
                        addToCart(product) {
                            this.cart.push(product);
                        }
                    }
                });
            })()
        </script>
    </div>
    </div>
</x-app-layout>
