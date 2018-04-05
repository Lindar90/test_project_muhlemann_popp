<?php

namespace App\Http\Controllers;

use App\Services\Users\Importer;
use Illuminate\Http\Request;
use Log;

class ImportUsersController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request, Importer $importer)
    {
        $response = [
            'success' => false,
            'message' => '',
        ];

        try {
            $importer->import($request->file('file')->getPathName());

            $response['success'] = true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $response['message'] = 'Something went wrong';
        }

        return $response;
    }
}
