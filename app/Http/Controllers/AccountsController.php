<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function account_index(Request $request)
    {

        if ($request->input('date_day')) {
            $date = $request->input('date_day');
            $startOfDay = Carbon::parse($date)->startOfDay();
            $endOfDay = Carbon::parse($date)->endOfDay();

            $income = DB::table('incomes')
                ->whereBetween('created_at', [$startOfDay, $endOfDay])
                ->sum('amount');
            $expenses = DB::table('expenses')
                ->whereBetween('created_at', [$startOfDay, $endOfDay])
                ->sum('amount');
            $profit = $income - $expenses;

            return view('accounts_pay.index', compact('income', 'expenses', 'profit'));
        } elseif ($request->input('date_week')) {
            $date_week = $request->input('date_week');
            $startOfWeek = Carbon::parse($date_week)->startOfWeek();
            $endOfWeek = Carbon::parse($date_week)->endOfWeek();

            $incomeweek = DB::table('incomes')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('amount');
            $expensesweek = DB::table('expenses')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('amount');
            $profitweek = $incomeweek - $expensesweek;

            return view('accounts_pay.index', compact('incomeweek', 'expensesweek', 'profitweek'));
        } elseif ($request->input('date_month')) {

            $date_month = $request->input('date_month');
            $startOfMonth = Carbon::parse($date_month)->startOfMonth();
            $endOfMonth = Carbon::parse($date_month)->endOfMonth();

            $incomeMonth = DB::table('incomes')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('amount');
            $expensesMonth = DB::table('expenses')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('amount');
            $profitMonth = $incomeMonth - $expensesMonth;

            return view('accounts_pay.index', compact('incomeMonth', 'expensesMonth', 'profitMonth'));
        } elseif ($request->input('date_year')) {

            $date_year = $request->input('date_year');
            $StartofYear = Carbon::parse($date_year)->startOfYear();
            $endtofYear = Carbon::parse($date_year)->endOfYear();

            $incomeYear = DB::table('incomes')
                ->whereBetween('created_at', [$StartofYear, $endtofYear])
                ->sum('amount');
            $expensesYear = DB::table('expenses')
                ->whereBetween('created_at', [$StartofYear, $endtofYear])
                ->sum('amount');
            $profitYear = $incomeYear - $expensesYear;
            return view('accounts_pay.index', compact('incomeYear', 'expensesYear', 'profitYear'));
        } elseif ($request->input('date_start') && $request->input('date_end')) {

            $date_start = $request->input('date_start');
            $date_end = $request->input('date_end');
            $StartofDate = Carbon::parse($date_start);
            $endtofDate = Carbon::parse($date_end);

            $incomewithindate = DB::table('incomes')
                ->whereBetween('created_at', [$StartofDate, $endtofDate])
                ->sum('amount');
            $expenseswithindate = DB::table('expenses')
                ->whereBetween('created_at', [$StartofDate, $endtofDate])
                ->sum('amount');
            $profitwithindate = $incomewithindate - $expenseswithindate;
            return view('accounts_pay.index', compact('incomewithindate', 'expenseswithindate', 'profitwithindate'));
        }

        $projects = Project::all();

        return view('accounts_pay.index',[compact('projects')]);
    }

    
}
