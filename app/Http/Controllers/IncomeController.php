<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('income.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $projects = Project::getProjects();

        return view('income.create', compact('projects', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        $income = new Income();
        $income->project_id = $request['project_id'];
        $income->user_id = $request['user_id'];
        $income->amount = $request['amount'];
        $income->amount_received_date = $request['amount_received_date'];
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income record successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $projects = Project::getProjects();

        return view('income.edit', compact('income', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->project_id = $request['project_id'];
        $income->user_id = $request['user_id'];
        $income->amount = $request['amount'];
        $income->amount_received_date = $request['amount_received_date'];
        $income->update();

        return redirect('income')->with('status', 'Income updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
