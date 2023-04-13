<x-base-layout>
<div class="flex flex-col">
        <div class="overflow-x-auto-1">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow px-1 py-1">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add company details</h2>
                            
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
                                @endforeach
                            @endif
                            
                            <form id="form" method="post" action="{{ url('company') }}" >    
                                @csrf
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div>
                                        <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Company name" required value="{{old('company_name')}}">
                                    </div>
                                    <div class="w-full">
                                        <label for="contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                        <input type="text" name="contact_number" id="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Contact number" required value="{{old('contact_number')}}">
                                    </div>
                                    <div>
                                        <label for="gst_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GSTIN number</label>
                                        <input type="text" name="gst_no" id="gst_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="GST number" required value="{{old('gst_no')}}">
                                    </div> 
                                    <div>
                                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank Name</label>
                                        <input type="text" name="bank_name" id="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bank name" required value="{{old('bank_name')}}">
                                    </div> 
                                    <div>
                                        <label for="account_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Number</label>
                                        <input type="text" name="account_no" id="account_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Account number" required value="{{old('account_no')}}">
                                    </div> 
                                    <div>
                                        <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                        <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="State" required value="{{old('state')}}">
                                    </div>
                                    <div>
                                        <label for="ifsc_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IFSC Code</label>
                                        <input type="text" name="ifsc_code" id="ifsc_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="IFSC code" required value="{{old('ifsc_code')}}">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <textarea type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Address" required >{{{ old('address') }}}</textarea>
                                    </div> 
                                </div>
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Add details
                                </button>
                            </form>
                        </div>
                    </section> 
                </div>
            </div>
        </div>
    </div>
</x-base-layout>