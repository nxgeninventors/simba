<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="{{ asset('lib/js/tinymce/tinymce.min.js') }}"></script>
    <div class="py-12 data-ctrl" data-ctrl="MeetingNotesCtrl">
    <form id="form" method="post" action="{{ url('clients') }}" >    
           @csrf
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 min-h-screen">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" placeholder="Name" name="name">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputPassword4">Website</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="website" placeholder="website" name="website">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputPassword4">Industry</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="industry" placeholder="industry" name="industry">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputPassword4">Description</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="description" placeholder="description" name="description">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputPassword4">Country id</label>
                                <select id="country" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="country_id" >
                                @foreach($countries as $country)
                                <option  value="{{$country->id}}">{{$country->name}}-{{$country->country_code}}</option>
                                @endforeach
                                </select>
                            </div> 
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputPassword4">Mobile</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="mobile" placeholder="mobile" name="mobile">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                    <label for="inputPassword4">Email</label>
                                    <input type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" placeholder="email" name="email">
                                </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputAddress">Street Address</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="address" placeholder="1234 Main St" name="street_address">
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="city" name="city" placeholder="Krishnagiri">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputState">State</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="state" placeholder="Tamilnadu" name="state">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="zip" name="zip" placeholder="636800">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"  id="submit">submit</button>
                    </div>
                </div>
           </div>
      </form>
    </div>

      {{$errors}}
</x-app-layout>