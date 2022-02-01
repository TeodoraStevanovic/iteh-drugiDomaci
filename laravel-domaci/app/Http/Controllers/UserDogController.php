<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class UserDogController extends Controller
{
    public function index($user_id)
    {
        $dogs = Dog::get()->where('user_id', $user_id);
        if (is_null($dogs))
            return response()->json('Data not found', 404);
        return response()->json($dogs);
    }
}
