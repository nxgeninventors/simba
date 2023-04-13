<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     Id
                </th>
                <th scope="col" class="px-6 py-3">
                  First Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Mobile
                </th>
                <th scope="col" class="px-6 py-3">
                    Gender
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        
        <tbody>
        @foreach( $customer->clientcontacts as $clientcontact)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tr_{{ $clientcontact->id }}">
                <td class="px-6 py-4">
                {{$clientcontact->id}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->first_name}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->last_name}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->email}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->mobile}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->gender}}
                </td>
                <td class="px-6 py-4">
                {{$clientcontact->title}}
                </td>
                <td class="px-6 py-4">
                    <span data-contact="{{$clientcontact}}" id="contact-edit" data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style="cursor:pointer;">Edit</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>