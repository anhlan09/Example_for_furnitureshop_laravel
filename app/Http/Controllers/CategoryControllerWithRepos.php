<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryControllerWithRepos extends Controller
{
    //
    public function index()
    {
    $category = CategoryRepos::getAllCategory();

    return view('furniture_shop.category.index',
        [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('furniture_shop.category.new', [
                "category" => (object)[
                    'category_id' => '',
                    'name' => '',
                ]
        ]);
    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $category = (object)[
            'name' => $request->input('name'),
        ];

        $newId = CategoryRepos::insert($category);


        return redirect()
            ->action('CategoryControllerWithRepos@index')
            ->with('msg', 'New Category with id: '.$newId.' has been inserted');
    }

    public function edit($id){
        $category = CategoryRepos::getCategoryById($id);

        return view('furniture_shop.category.update',
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

        return redirect()
            ->action('CategoryControllerWithRepos@index')
            ->with('msg', 'Update Successfully');
    }

    public function confirm($id){
        $category = CategoryRepos::getCategoryById($id);

        return view('furniture_shop.category.confirm',
            [
                'category' => $category[0],
            ]
        );
    }

    public function destroy(Request $request, $id){
        if($id != $request->input('category_id')){
            return redirect()->action('CategoryControllerWithRepos@read');
        }

        CategoryRepos::delete($id);

        return redirect()->action('ClassroomControllerWithRepos@read')
            ->with('msg', 'Delete Successfully');
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
