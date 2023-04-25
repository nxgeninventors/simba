<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Client;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\ExpenseStatus;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $projects = Project::select('id', 'project_name')->get();
        $expenseCategories = ExpenseCategory::select('id', 'name', 'description')->get();
        $expenseStatuses = ExpenseStatus::all();
        $suppliers = Client::where('is_supplier', true)->select('id','name')->get();
        return view('expense.create', compact('expenseStatuses', 'projects', 'expenseCategories', 'user_id','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        $expense = new Expense();
        $expense->project_id = $request['project_id'];
        $expense->user_id = $request['user_id'];
        $expense->supplier_id = $request['supplier_id'];
        $expense->amount = $request['amount'];
        $expense->notes = $request['notes'];
        $expense->expense_category_id = $request['expense_category_id'];
        $expense->expense_status_id = 10; // Submitted
        // $expense->approved_by = null; // Submitted
        $expense->save();

        return redirect()->route('expense.index')->with('success', 'Expense record successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $projects = Project::select('id', 'project_name')->get();
        $expenseCategories = ExpenseCategory::select('id', 'name', 'description')->get();
        $expenseStatuses = ExpenseStatus::all();
        $suppliers = Client::where('is_supplier', true)->select('id','name')->get();

        return view('expense.edit', compact('expense', 'projects', 'expenseStatuses', 'expenseCategories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->project_id = $request['project_id'];
        $expense->amount = $request['amount'];
        $expense->notes = $request['notes'];
        if (! empty($request['expense_status_id'])) {
            $expense->expense_status_id = $request['expense_status_id'];
        }
        $expense->expense_category_id = $request['expense_category_id'];
        $expense->supplier_id = $request['supplier_id'];
        $expense->update();

        return redirect()->route('expense.index')->with('success', 'Expense has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index');
    }
}
