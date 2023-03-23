<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="{{ asset('lib/js/tinymce/tinymce.min.js') }}"></script>
    <div class="container py-5">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div> 
    <div class="data-ctrl" data-ctrl="ClientsCtrl">
        <div class="flex justify-between py-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
                {{  __('Clients') }}
            </h2>

            <a href="{{ url('clients/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            create new client
            </a>
        </div>
        <table class="" style="overflow:hidden;" id="clients_table"> 
        </table>
   </div>
   <?php
   echo url()->previous();
   ?>
   </script>
</x-app-layout>
