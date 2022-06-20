<?php

namespace App\Http\Controllers;


use App\Repository\ClassRepos;
use App\Repository\StudentRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentControllerWithRepos extends Controller
{
    public function index()
    {
        $student = StudentRepos::getAllStudentWithClass();
        return view('lab6.lab6sec.studentIndex',
            [
                'student' => $student,
            ]);
    }

    public function show($id)
    {

        $student = StudentRepos::getStudentById($id); //this is always an array of objects
        $class = ClassRepos::getClassByStudentId($id);
        return view('lab6.lab6sec.studentShow',
            [
                'student' => $student[0],//get the first element
                'class' => $class[0],
            ]
        );
    }

    public function create()
    {
        $class = ClassRepos::getAllClass();

        return view(
            'lab6.lab6sec.studentNew',
            [
                "student" => (object)[
                'id' => '',
                'name' => '',
                'email' => '',
                'contact' => '',
                    'classid' => ''
                ],"class" => $class
            ]);

    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $student = (object)[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'classid' => $request->input('class')
        ];

        $newId = StudentRepos::insert($student);

        return redirect()
            ->action('StudentControllerWithRepos@index')
            ->with('msg', 'New student with id: '.$newId.' has been inserted');
    }

    public function edit($id)
    {
        $student = StudentRepos::getStudentById($id); //this is always an array
        $class = ClassRepos::getAllClass();

        return view(
            'lab6.lab6sec.studentUpdate',
            [
                "student" => $student[0],
                'class' => $class
            ]);
    }

    public function update(Request $request, $id)
    {
        if ($id != $request->input('id')) {
            //id in query string must match id in hidden input
            return redirect()->action('StudentControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $student = (object)[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'classid' => $request->input('class')
        ];
        StudentRepos::update($student);

        return redirect()->action('StudentControllerWithRepos@index')
            ->with('msg', 'Update Successfully');;
    }

    public function confirm($id){
        $student = StudentRepos::getStudentById($id); //this is always an array
        $class = ClassRepos::getClassByStudentId($id);
        return view('lab6.lab6sec.studentConfirm',
            [
                'student' => $student[0],
                'class' => $class[0],
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('StudentSessionController@index');
        }

        StudentRepos::delete($id);

        return redirect()->action('StudentControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }

    function formValidate(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'email' => ['required'],
                'contact'=>['required','digits:10','starts_with:0'],
                'class' => ['gt:0']
            ],
            [
                'class.gt' => 'Please select your class'
            ]
        );
    }

}
