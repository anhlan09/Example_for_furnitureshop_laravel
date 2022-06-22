<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryControllerWithRepos extends Controller
{
    //
    
    private function formValidate($request){
        return Validator::make(
            $request->all(),
            [
                'name' => ['required', 'max:30'],
            ],
            [
                'name.required' => 'Name can not be empty.',
                'name.max' => 'Name must less than 30 characters.',
            ]
        );
    }
}
