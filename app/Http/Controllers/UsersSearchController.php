<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilters;
use App\User;
use Log;

class UsersSearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function find(UserFilters $userFilters)
    {
        $response = [
            'success' => false,
            'data'    => [],
            'message' => '',
        ];

        try {
            $response['data']['users'] = User::latest()->filter($userFilters)->paginate(10);
            $response['success'] = true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $response['message'] = 'Something went wrong';
        }

        return $response;
    }
}
