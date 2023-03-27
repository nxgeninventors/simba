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
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                <p>{{$customer->name}}</p>
            </div>
            <div class="w-full">
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                <p>{{$customer->website}}</p>
            </div>
            <div class="w-full">
                <label for="industry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industry</label>
                <p>{{$customer->industry}}</p>
            </div>
            <div>
                <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile</label>
                <p>{{$customer->mobile}}</p>
            </div> 
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <p>{{$customer->email}}</p>
            </div> 

            <div class="sm:col-span-2">
                <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street Address</label>
                <p>{{$customer->street_address}}</p>
            </div>

            <div>
                <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                <p>{{$customer->country_id}}</p>
            </div>

            <div>
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                <p>{{$customer->city}}</p>
            </div> 
            <div>
                <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                <p>{{$customer->state}}</p>
            </div> 

            <div>
                <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip (Pincode)</label>
                <p>{{$customer->zip}}</p>
            </div> 

            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <p>{{$customer->description}}</p>
            </div>
        </div>
        
    </form>
</div>