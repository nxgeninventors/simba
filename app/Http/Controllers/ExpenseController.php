<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\ExpenseDocs;
use App\Models\ExpenseStatus;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        return view('expense.create', compact('expenseStatuses', 'projects', 'expenseCategories', 'user_id'));
    }

    public function upload_expense_docs(Expense $expense, StoreExpenseRequest|UpdateExpenseRequest $request)
    {
        // Create the "expense" folder if it doesn't exist
        if (! Storage::exists('public/expense')) {
            Storage::makeDirectory('public/expense');
        }

        // Create a subfolder inside the "expense" folder with the ID as the name
        $folderPath = 'public/expense/'.$expense->id;
        if (! Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }
        // Get the uploaded file
        $expense_docs = $request['expense_docs'];
        if (! empty($expense_docs)) {
            foreach ($expense_docs as $expense_doc) {
                if (empty($expense_doc) || empty($expense_doc['doc_name'])) {
                    continue;
                }
                $file = $expense_doc['doc_name'];
                $filePath = $file->store($folderPath);
                $filePath = str_replace('public/', '', $filePath);
                $doc_label = $expense_doc['doc_label'];

                $expenseDocs = new ExpenseDocs();
                $expenseDocs->expense_id = $expense->id;
                $expenseDocs->doc_name = $filePath;
                $expenseDocs->doc_label = $doc_label;
                $expenseDocs->save();
            }
        }
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
        $expense->amount = $request['amount'];
        $expense->notes = $request['notes'];
        $expense->expense_category_id = $request['expense_category_id'];
        $expense->expense_status_id = 10; // Submitted
        // $expense->approved_by = null; // Submitted
        $expense->save();

        $this->upload_expense_docs($expense, $request);

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
    public function edit($id)
    {
        // expenseDocs
        $expense = Expense::with('expenseDocs')->find($id);
        $projects = Project::select('id', 'project_name')->get();
        $expenseCategories = ExpenseCategory::select('id', 'name', 'description')->get();
        $expenseStatuses = ExpenseStatus::all();

        return view('expense.edit', compact('expense', 'projects', 'expenseStatuses', 'expenseCategories'));
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
        $expense->update();

        $this->upload_expense_docs($expense, $request);

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
