<?php

namespace App\Http\Controllers;

use App\Repository\ClassRepos;
use App\Repository\TeacherRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassControllerWithRepos extends Controller
{
    //
    public function index()
    {
        $class = ClassRepos::getAllClass();
        return view('lab6.lab6sec.classIndex',
        [
            'class' => $class,
        ]);
    }

    public function show($id)
    {
        $class = ClassRepos::getClassById($id);
        $teacher = TeacherRepos::getTeachersByClassId($id);

        return view('lab6.lab6sec.classShow',
            [
                    'class' => $class[0],
                    'teacher' => $teacher
            ]
        );

    }

    public function create()
    {
        $teacher = TeacherRepos::getAllTeacher();

        return view('lab6.lab6sec.classNew',
            [
                "class" => (object)[
                'id' => '',
                'name' => '',
                'StartDate' => '',
                'Size' => 0
        ],
                "selectedT" => [],
                "teacher" => $teacher
            ]
        );
    }

    public function store(Request $request)
    {
        $this-> formValidate($request)->validate();

        $class = (object)[
           'name' => $request->input('name' ),
            'StartDate' => $request->input('StartDate'),
            'Size' => $request->input('Size' ),
        ];

        $newID = ClassRepos::insert($class);

        $selectedT = $request->input('selectedT');
        TeacherRepos::insertClassTeacherRelationship($newID, $selectedT);
        return redirect()
            ->action('ClassControllerWithRepos@index')
            ->with('msg','New Class with ID: '.$newID.' has been inserted' );
    }

    public function edit($id)
    {
        $class = ClassRepos::getClassById($id);

        $teacher = TeacherRepos::getAllTeacher();
        $selectedT = TeacherRepos::getTeachersByClassId($id);

        return view('lab6.lab6sec.classUpdate',
            [
                'class' => $class[0],
                "teacher" => $teacher,
                "selectedT" => $selectedT,
            ]
        );


    }

    public function update(Request $request, $id)
    {
        if ($id != $request->input('id')) {
            //id in query string must match id in hidden input
            return redirect()->action('ClassControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $class = (object)[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'StartDate' => $request->input('StartDate'),
            'Size' => $request->input('Size'),
        ];
        ClassRepos::update($class);
        $selectedT = $request->input('selectedT');
        TeacherRepos::deleteClassTeacherRelationship($class->id);
        TeacherRepos::insertClassTeacherRelationship($class->id, $selectedT);
        return redirect()->action('ClassControllerWithRepos@index')
            ->with('msg', 'Update Successfully');;
    }

    public function confirm($id){
        $class = ClassRepos::getClassById($id); //this is always an array
        $teacher = TeacherRepos::getTeachersByClassId($id);

        return view('lab6.lab6sec.classConfirm',
            [
                'class' => $class[0],
                "teacher" => $teacher
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('ClassControllerWithRepos@index');
        }
        TeacherRepos::deleteClassTeacherRelationship($id);
        ClassRepos::delete($id);


        return redirect()->action('ClassControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }


    function formValidate(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required', 'starts_with:C','min:6','max:8',
                    function ($attribute ,$value , $fail) use($request) {
                        $classes['StartDate'] = $request->input('StartDate');

                        $year = date('y', strtotime($classes['StartDate']));
                        $checkY = substr_compare($value, $year, 1, 2);
                        $month = date('m', strtotime($classes['StartDate']));
                        $checkM = substr_compare($value, $month, 3, 2);
                        $checksixthG = substr_compare($value, 'G', 5, 1);
                        $checksixthI = substr_compare($value, 'I', 5, 1);
                        $checksixthL = substr_compare($value, 'L', 5, 1);
                        if ($checkY != 0 && $checkM == 0) {
                            $fail('Name invalid (year) ');
                        } else if ($checkM != 0 && $checkY == 0) {
                            $fail('Name invalid (month)');
                        } else if ($checkY != 0 && $checkM != 0) {
                            $fail('Name invalid (year) and (month)');
                        } else if ($checksixthG != 0 && $checksixthI != 0 && $checksixthL != 0) {
                            $fail('The sixth character must be either G, I or L.');
                        }
                    }

                ],
                'StartDate' => ['required','after:2000/01/01'],
                'Size'=>['required','numeric','min:14'],
                'selectedT' => ['required']
            ],
            [
                'selectedT' => 'Please select a Teacher',
            ]
        );
    }


}


