<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class ApiController extends Controller
{
    public function getUser() {

        $users = User :: all();

        return response()->json([
            'status' => 'success',
            'users' => $users
        ]);
    }
}
