<x-base-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Expense') }}
        </h2>
    </x-slot>

    <div class="data-ctrl" data-ctrl="ExpenseCtrl">
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">
                    
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ __('Add Expense') }}
                    </h1>
                </div>
                <div class="sm:flex">
                    
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="/expense" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            View All Expense
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
                                <form action="{{ route('expense.store') }}" enctype="multipart/form-data"  method="POST">
                                    @csrf
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div class="sm:col-span-2">
                                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                            <input step="any" type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                        </div>
                                        <div class="">
                                            <label for="expense_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Category</label>
                                            <select required id="expense_category_id" name="expense_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value=""  selected="">Select Expense category</option>
                                                @foreach ($expenseCategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="project_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                                            <select id="project_id" name="project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value=""  selected="">Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                                            <textarea id="notes" name="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">

                                        <div class="sm:col-span-2 text-center m-4">
                                            <hr class="w-full">
                                        </div>
                                        
                                        <section class="sm:col-span-2">
                                            <div class="grid" id="expense_docs_container">
                                                <div class="expense_doc_container grid gap-4 sm:grid-cols-2 sm:gap-6 mb-4">
                                                    <div class="">
                                                        <label for="doc_name_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload file</label>
                                                        <input  id="doc_name_1" name="expense_docs[0][doc_name]"  class="expense_doc block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
                                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PDF, PNG, JPG or GIF (MAX. 800x400px).</p>
                                                    </div>
                                                    <div class="">
                                                        <label for="doc_label_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doc Label</label>
                                                        <input name="expense_docs[0][doc_label]" id="doc_label_1" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Doc Label">
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="add_more_file" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                                                  </svg>
                                                <span> Add more files </span>
                                            </button>
                                        </section>
                                        
                                    </div>
                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Add Expense
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