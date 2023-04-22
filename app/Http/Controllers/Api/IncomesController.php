<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? env('RECORD_LIMIT', 15);
        $column = $request->column ?? env('DEFAULT_SORT_COLUMN');
        $direction = $request->direction ?? env('DEFAULT_SORT_DIRECTION');

        return Income::with('project')->orderBy($column, $direction)
                    //->filter(request(['meeting_title', 'meeting_notes']))
                    ->paginate($limit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ExpenseDocs::where('expense_id', $id)->delete();
        $expense = Income::find($id);
        $expense->delete();

        return ['msg' => 'Deleted'];
    }
}
