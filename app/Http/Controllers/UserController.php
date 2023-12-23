<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return 'middleware succssfully..';
    }

    public function index2(){
        return 'not allwed..';
    }

    public function create(){
        User::create([
            
        ]);
    }
}


// php artisan queue : work