<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    public function index() {

        $data = User::select('*')->get();

        return view('system/users', compact('data'));
    }
}
