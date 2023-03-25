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
                        {{ __('Add Project') }}
                    </h1>
                </div>
                <div class="sm:flex">
                    
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="{{ url('projects') }}" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            View All Projects
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
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new project</h2>
                                
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$error}}</p>
                                    @endforeach
                                @endif
                                
                                <form id="form" method="post" action="{{ url('projects') }}" >    
                                    @csrf
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div class="sm:col-span-2">
                                            <label for="project_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project name</label>
                                            <input type="text" name="project_name" id="project_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Project name" required="" value="{{old('project_name')}}">
                                        </div>

                                        <div>
                                            <label for="client_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client name</label>
                                            <select id="client_id" name="client_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                                <option  value="">Select client</option>
                                                @foreach($clients as $client)
                                                    <option {{ old('client_id') == $client->id ? "selected=selected" : '' }} value="{{ $client->id }}">{{ $client->name }}</option> 
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="project_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project category</label>
                                            <select id="project_category_id" name="project_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                                <option  value="">Select project category</option>
                                                @foreach($categories as $category)
                                                    <option {{ old('project_category_id') == $category->id ? "selected=selected" : '' }} value="{{ $category->id }}">{{ $category->name }}</option> 
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="project_status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project status</label>
                                            <select id="project_status_id" name="project_status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                                <option  value="">Select project status</option>
                                                @foreach($statuses as $status)
                                                    <option {{ ( $status_id == $status->id || old('project_status_id') == $status->id) ? "selected=selected" : '' }} value="{{ $status->id }}">{{ $status->name }}</option> 
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here" >{{{ old('description') }}}</textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                    </div>
                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Add Project
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
