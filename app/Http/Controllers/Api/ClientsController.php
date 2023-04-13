<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
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

        return Client::orderBy($column, $direction)
                    // ->filter(request(['name', 'website', 'industry', 'email', 'mobile', 'city', 'state', 'zip']))
                    ->paginate($limit);
    }

    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        $client->delete();

        return ['msg' => 'Deleted'];
    }
}
