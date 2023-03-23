<x-base-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <script src="{{ asset('lib/js/tinymce/tinymce.min.js') }}"></script>

    <div class="py-12 data-ctrl" data-ctrl="MeetingNotesCtrl">
        <div class="px-4 pt-6 mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 min-h-screen">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Meeting Notes') }}
                        </h2>

                        <a href="{{ url('meeting-notes/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create New Note
                        </a>
                    </div>

                    <table style="width: 100%; overflow: hidden" id="meeting_notes_table">
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
