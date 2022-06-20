<?php

namespace App\Http\Controllers;

use App\Repository\TeacherRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherControllerWithRepos extends Controller
{
    //
    public function index()
    {
        $teacher = TeacherRepos::getAllTeacher();
        return view('lab6.lab6sec.teacherIndex',
            [
                'teacher' => $teacher,
            ]);
    }

    public function show($id)
    {

        $teacher = TeacherRepos::getTeacherById($id); //this is always an array of objects
        return view('lab6.lab6sec.teacherShow',
            [
                'teacher' => $teacher[0] //get the first element
            ]
        );
    }

    public function create()
    {

        return view(
            'lab6.lab6sec.teacherNew',
            ["teacher" => (object)[
                'id' => '',
                'Name' => '',
                'DOB' => '',
                'SSID' => 0
            ]]);

    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $teacher = (object)[
            'Name' => $request->input('Name'),
            'DOB' => $request->input('DOB'),
            'SSID' => $request->input('SSID'),
        ];

        $newId = TeacherRepos::insert($teacher);

        return redirect()
            ->action('TeacherControllerWithRepos@Index')
            ->with('msg', 'New Teacher with id: '.$newId.' has been inserted');
    }

    public function edit($id)
    {
        $teacher = TeacherRepos::getTeacherById($id); //this is always an array


        return view(
            'lab6.lab6sec.teacherUpdate',
            ["teacher" => $teacher[0]]);
    }

    public function update(Request $request, $id)
    {
        if ($id != $request->input('id')) {
            //id in query string must match id in hidden input
            return redirect()->action('TeacherControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $teacher = (object)[
            'id' => $request->input('id'),
            'Name' => $request->input('Name'),
            'DOB' => $request->input('DOB'),
            'SSID' => $request->input('SSID'),
        ];
        TeacherRepos::update($teacher);

        return redirect()->action('TeacherControllerWithRepos@index')
            ->with('msg', 'Update Successfully');;
    }

    public function confirm($id){
        $teacher = TeacherRepos::getTeacherById($id); //this is always an array

        return view('lab6.lab6sec.teacherConfirm',
            [
                'teacher' => $teacher[0],
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('TeacherSessionController@index');
        }

        TeacherRepos::delete($id);


        return redirect()->action('TeacherControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }

    function formValidate(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'Name' => ['required'],
                'DOB' => ['required'],
                'SSID' => ['required', 'digits:11', 'starts_with:00,01,10,11',
                    function ($attribute ,$value , $fail) use($request) {
                        $teachers['DOB'] = $request->input('DOB');

                        $year = date('y', strtotime($teachers['DOB']));
                        $checkY = substr_compare($value,$year ,2,2);
                        $month = date('m', strtotime($teachers['DOB']));
                        $checkM = substr_compare($value,$month,4,2);
                        if( $checkY != 0 && $checkM == 0){
                            $fail('ssID invalid (year) ');
                        } else if( $checkM != 0 && $checkY == 0){
                            $fail('ssID invalid (month)');
                        } else if($checkY != 0  && $checkM != 0){
                            $fail('ssID invalid (year) and (month)');
                        }

                    }
                ]
            ]
        );
    }

}
