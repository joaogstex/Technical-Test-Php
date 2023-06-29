<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index()
    {
        //Make a HTTP request to the API to retrieve user data
        $response = Http::get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
        $data = $response->json();

        // Access the 'users' key in the JSON response
        $users = $data['users'];

        // Create a collection from the user data
        $users = collect($users);

        // Get the current page
        $page = Paginator::resolveCurrentPage();

        // Define the number of items to show per page
        $perPage = 10;

        // Slice the collection to get the items to display on the current page
        $currentPageUsers = $users->slice(($page - 1) * $perPage, $perPage)->all();

        // Create a paginator for the sliced collection
        $users = new LengthAwarePaginator($currentPageUsers, count($users), $perPage);

        // Pass the paginated collection to the view
        return view('index', ['users' => $users]);
    }
}






