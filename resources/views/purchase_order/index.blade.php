<x-base-layout>
    <div class="data-ctrl" data-ctrl="IncomeCtrl">
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">

                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ __('Purchase ') }}
                    </h1>
                </div>
                <div class="sm:flex">

                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="/company" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Add company details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <form class="max-w-lg mx-auto my-10 p-8 bg-white shadow-md rounded-md" action="{{ url('purchase_bill') }}" method="POST">
        <div class="grid gap-4 sm:gap-6">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
            @endforeach
            @endif
            @csrf
            <div class="sm:col-span-2">
                <label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                <select id="company_id" name="company_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Select company</option>
                    @foreach ($companies as $company)
                    <option {{ old('company_id') == $company->id ? "selected=selected" : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="Client_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clients</label>
                <select id="Client_id" name="client_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Select client</option>
                    @foreach ($clients as $client)
                    <option {{ old('client_id') == $client->id ? "selected=selected" : '' }} value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" id="invoice" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add Purchase
            </button>
        </div>
    </form>
    </div>
</x-base-layout>