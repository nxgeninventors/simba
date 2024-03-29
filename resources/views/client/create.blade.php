<x-base-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="data-ctrl" data-ctrl="">
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">
                    
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ __('Add Customer') }}
                    </h1>
                </div>
                <div class="sm:flex">
                    
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="{{ url('customers') }}" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            View All Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto-1">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow px-1 py-1">
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new customer</h2>
                                
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
                                    @endforeach
                                @endif
                                
                                <form id="form" method="post" action="{{ url('customers') }}" >    
                                    @csrf
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type customer name" required="" value="{{old('name')}}">
                                        </div>
                                        <div class="w-full">
                                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                                            <input type="text" name="website" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Website URL" required="" value="{{old('website')}}">
                                        </div>
                                        <div class="w-full">
                                            <label for="industry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industry</label>
                                            <input type="text" name="industry" id="industry" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Industry name" required="" value="{{old('industry')}}">
                                        </div>
                                        <div>
                                            <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile</label>
                                            <input type="text" name="mobile" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mobile" required="" value="{{old('mobile')}}">
                                        </div> 
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="" value="{{old('email')}}">
                                        </div> 
                                        <div>
                                            <label for="gst_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GST Number</label>
                                            <input type="text" name="gst_no" id="gst_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="GST number" required="" value="{{old('gst_no')}}">
                                        </div> 

                                        <div class="sm:col-span-2">
                                            <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street Address</label>
                                            <textarea id="street_address" name="street_address" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Street address">{{{ old('street_address') }}}</textarea>
                                        </div>

                                        <div>
                                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                            <select id="country_id" name="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                                <option  value="">Select country</option>
                                                @foreach($countries as $country)
                                                    <option {{ old('country_id') == $country->id ? "selected=selected" : '' }} value="{{ $country->id }}">{{ $country->name }}</option> 
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                            <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="City" required="" value="{{old('city')}}">
                                        </div> 
                                        <div>
                                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                            <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="State" required="" value="{{old('state')}}">
                                        </div> 

                                        <div>
                                            <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip (Pincode)</label>
                                            <input type="text" name="zip" id="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pincode" required="" value="{{old('zip')}}">
                                        </div> 

                                        <div class="sm:col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here" >{{{ old('description') }}}</textarea>
                                        </div>
                                        <div>
                                            <label for="is_customer">Is Customer?</label>
                                            <input type="checkbox" id="is_customer" name="is_customer" value="1"><span>(or)</span>
                                            <label for="is_supplier">Is Supplier?</label>
                                            <input type="checkbox" id="is_supplier" name="is_supplier" value="1">
                                        </div> 
                                    </div>
                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Add Customer
                                    </button>
                                </form>
                            </div>
                        </section> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>