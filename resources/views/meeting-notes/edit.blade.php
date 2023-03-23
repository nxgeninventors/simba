<x-base-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <script src="{{ asset('lib/js/tinymce/tinymce.min.js') }}"></script>

    <div class="py-12 data-ctrl" data-ctrl="MeetingNotesCtrl">
        <form action="{{ url("meeting-notes/".$meetingNote->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="px-4 pt-6 mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 min-h-screen">
                        <div class="mb-4">
                            <x-input-label for="meeting_title" :value="__('Meeting Title')" />
                            <x-text-input id="meeting_title" class="block mt-1 w-full" type="text" name="meeting_title" :value="old('meeting_title', isset($meetingNote) ? $meetingNote->meeting_title : '')" autofocus />
                            <x-input-error :messages="$errors->get('meeting_title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="meeting_notes" :value="__('Meeting Notes')" />
                            <textarea id="tiny-meeting-notes" name="meeting_notes">{{ old('meeting_notes', isset($meetingNote) ? $meetingNote->meeting_notes : '') }}</textarea>
                            <x-input-error :messages="$errors->get('meeting_notes')" class="mt-2" />
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save Notes
                        </button>  
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-base-layout>
