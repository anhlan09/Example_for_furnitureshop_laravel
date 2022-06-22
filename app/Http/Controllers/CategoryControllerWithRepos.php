<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryControllerWithRepos extends Controller
{
    //
    public function edit($id){
        $category = CategoryRepos::getCategoryById($id);

        return view('Furniture_shop.CategoryRepos.update',
            [
                'category' => $category[0]
            ]
        );
    }

    public function update(Request $request, $id){
        if($id != $request->input('category_id')){
            return redirect()->action('CategoryControllerWithRepos@index');
        }

        $this->formValidate($request)->validate();

        $category = (object)[
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
        ];

        CategoryRepos::update($category);

        return redirect()->action('CategoryControllerWithRepos@index');
    }

    public function confirm($id){
        $category = CategoryRepos::getCategoryById($id);

        return view('Furniture_shop.CategoryRepos.confirm',
            [
                'category' => $category[0]
            ]
        );
    }

    public function delete(Request $request, $id){
        if($id != $request->input('category_id')){
            return redirect()->action('CategoryControllerWithRepos@index');
        }

        CategoryRepos::delete($id);

        return redirect()->action('CategoryControllerWithRepos@index');
    }

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
