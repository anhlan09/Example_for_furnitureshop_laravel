<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class lab2sController extends Controller
{
    public function indexS()
    {
        $students= [];
        if(Session::has('students')){
            $students= Session::get('students');
        } else {
            $students = [
                ['id' => 1,
                    'name' => 'Juliet Conroy',
                    'email' => 'hailey.nikolaus@hotmail.com',
                    'contact' => '0912345678'
                ],
                ['id' => 2,
                    'name' => 'Cillian Hartman',
                    'email' => 'willa.gerlach@gmail.com',
                    'contact' => '0888123456'
                ]
            ];
            Session::put('students',$students);
        }
        return view('lab2section.indexstudent', ['students' => $students]);
    }

    public function newS()
    {
        return view('lab2section.newstudent');
    }

    public function storeS(Request $request)
    {
//        dd($request ->all());

       $this-> formValidate($request)->validate();


        $students = [];
        $students['id'] = count(Session::get('students')) +1;
        $students['name'] = $request->input('name');
        $students['email'] = $request->input('email');
        $students['contact'] = $request->input('contact');

        Session::push('students', $students);
        return redirect()->action('lab2sController@indexS');
    }

    public function editS($id)
    {
       $updatedStu = Session::get('students')[$id -1];
       return view('lab2section.editstudents', ['student' => $updatedStu]);

    }

    public function updateS(Request $request, $id)
    {
        if($request->input('id') != $id){
            return redirect()->action('lab2sController@indexS');
        }

         $this->formValidate($request)->validate();

        $allStu = Session::get('students');
        $updatedStu = $allStu[$id - 1];

        $updatedStu['name'] = $request->input('name');
        $updatedStu['email'] = $request->input('email');
        $updatedStu['contact'] = $request->input('contact');

        $allStu[$id - 1] = $updatedStu;

        Session::forget('students');

        Session::put('students', $allStu);

        return redirect()->action('lab2sController@indexS');

    }

    function formValidate(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'email' => ['required'],
                'contact'=>['required','digits:10','starts_with:0']
            ]
        );
    }


}

