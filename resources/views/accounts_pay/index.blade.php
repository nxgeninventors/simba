<x-base-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-4">
            {{ __('Finance Report') }}
        </h2>
    </x-slot>


    <div class="p-4 bg-white block sm:flex items-center justify-between  border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">

                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{ __('Finance Report') }}
                </h1>
            </div>
            <div class="sm:flex">
                <div class="flex flex-col items-center">

                   
                </div>
            </div>
        </div>

    </div>
    <h1 class="text-xl font-bold mb-4"></h1>


    <div class="flex justify-center gap-6">
        <form action="{{ route('reports.account_index') }}" method="post">
            @csrf
            <input type="hidden" class="form-control mb-2" id="date_day" name="date_day" value="{{ now()->format('Y-m-d') }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> Today</button>
        </form>
        <form action="{{ route('reports.account_index') }}" method="post" class="mb-4">
            @csrf
            <input type="hidden" name="date_week" value="{{ \Carbon\Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Last Week
            </button>
        </form>

        <form action="{{ route('reports.account_index') }}" method="post" class="mb-4">
            @csrf
            <input type="hidden" name="date_month" value="{{ \Carbon\Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Last Month
            </button>
        </form>
        <form action="{{ route('reports.account_index') }}" method="post" class="mb-4">
            @csrf
            <input type="hidden" name="date_year" value="{{ \Carbon\Carbon::now()->subYear()->startOfYear()->format('Y-m-d') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Last Year
            </button>
        </form>
        <form action="{{ route('reports.account_index') }}" method="post" class="mb-4">
            @csrf
            <input type="date" name="date_start">
            <input type="date" name="date_end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                submit
            </button>
        </form>
    </div>

    <div class="text-center bg-white shadow-md rounded px-8 pt-6  mb-4 flex flex-nowrap hover:bg-gray-200">
        @if(isset($income))
        <div class="flex-1 w-32">
            
            <div>
            <h2 class="text-xl font-bold mb-4"> Today</h2>
                <span>Incomes:</span>
                <p class="mb-2 font-bold" id="p1"> {{ $income }}</p>
                <span>Expenses:</span>
                <p class="mb-2 font-bold" id="p2">{{ $expenses }}</p>
                <span>Profit:</span>
                <p class="mb-2 font-bold" id="p3">{{ $profit }}</p>
            </div>
        </div>
        @endif
        @if(isset($incomeweek))
        <div class="flex-1 w-32">
            <h2 class="text-xl font-bold mb-4">Last Week</h2>
            <div>
                <span>Incomes:</span>
                <p class="mb-2 font-bold" id="p1"> {{ $incomeweek }}</p>
                <span>Expenses:</span>
                <p class="mb-2 font-bold" id="p2">{{ $expensesweek }}</p>
                <span>Profit:</span>
                <p class="mb-2 font-bold" id="p3">{{ $profitweek }}</p>
            </div>
        </div>
        @endif
        @if(isset($incomeMonth))
        <div class="flex-1 w-32">
            <h2 class="text-xl font-bold mb-4">Last Month</h2>
            <div>
                <span>Incomes:</span>
                <p class="mb-2 font-bold" id="p1"> {{ $incomeMonth }}</p>
                <span>Expenses:</span>
                <p class="mb-2 font-bold" id="p2">{{ $expensesMonth }}</p>
                <span>Profit:</span>
                <p class="mb-2 font-bold" id="p3">{{ $profitMonth }}</p>
            </div>
        </div>
        @endif
        @if(isset($profitYear))
        <div class="flex-1 w-32">
            <h2 class="text-xl font-bold mb-4">Last Year</h2>
            <div>
                <span>Incomes:</span>
                <p class="mb-2 font-bold" id="p1"> {{ $incomeYear }}</p>
                <span>Expenses:</span>
                <p class="mb-2 font-bold" id="p2">{{ $expensesYear }}</p>
                <span>Profit:</span>
                <p class="mb-2 font-bold" id="p3">{{ $profitYear }}</p>
            </div>
        </div>
        @endif
        @if(isset($profitwithindate))
        <div class="flex-1 w-32">
            <h2 class="text-xl font-bold mb-4">Within date</h2>
            <div>
                <span>Incomes:</span>
                <p class="mb-2 font-bold" id="p1"> {{ $incomewithindate }}</p>
                <span>Expenses:</span>
                <p class="mb-2 font-bold" id="p2">{{ $expenseswithindate }}</p>
                <span>Profit:</span>
                <p class="mb-2 font-bold" id="p3">{{ $profitwithindate }}</p>
            </div>
        </div>
        @endif
        <div class=" flex-1 w-5">
            <canvas id="myChart"></canvas>
        </div>
    </div>

</x-base-layout>