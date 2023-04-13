<div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Customer Details</h2>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
        @endforeach
    @endif
    
    <div >    
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Customer Name</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->name}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Website</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->website}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Industry</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->industry}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Mobile</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->mobile}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Email</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->email}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">GST number</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->gst_no}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Street Address</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->street_address}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Country</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->country_id}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">City</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->city}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">State</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->state}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Zip (Pincode)</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->zip}}</p>
			</div>
            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 border-b">
					<p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">Description</p>
					<p class="w-48 lg:w-full dark:text-gray-300  text-center md:text-left text-sm leading-5 text-gray-600">{{$customer->description}}</p>
			</div>
        </div>
        
</div>
</div>

