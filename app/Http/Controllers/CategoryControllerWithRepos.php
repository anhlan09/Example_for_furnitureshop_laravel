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

            return view('projects_ki_1.category.index_category',
                [
                    'category' => $category,
                ]);
        }

        public function create()
        {
            return view('projects_ki_1.category.new_category', [
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
                ->action('categoryController@index')
                ->with('msg', 'New Category with id: '.$newId.' has been inserted');
        }
    
    public function edit($id){
        $classroom = ClassroomRepos::getClassroomById($id);
        $teachers = TeacherRepos::getAllTeachers();
        $selectedT = TeacherRepos::getTeachersByClassroomId($id);

        return view('Classrooms.ClassroomRepos.update',
            [
                'classroom' => $classroom[0],
                'teachers' => $teachers,
                'selectedT' => $selectedT
            ]
        );
    }

    public function update(Request $request, $id){
        if($id != $request->input('id')){
            return redirect()->action('ClassroomControllerWithRepos@read');
        }

        $this->formValidate($request)->validate();

        $classroom = (object)[
            'id' => $request->input('id'),
            'nameClassroom' => $request->input('nameClassroom'),
            'startDate' => $request->input('startDate'),
            'size' => $request->input('size'),
        ];

        ClassroomRepos::update($classroom);
        $selectedT = $request->input('selectedT');
        Classrooms_TeachersRepos::delete($classroom->id);
        Classrooms_TeachersRepos::insert($classroom->id, $selectedT);

        return redirect()->action('ClassroomControllerWithRepos@read')
            ->with('msg', 'Update Successfully');
    }

    public function confirm($id){
        $classroom = ClassroomRepos::getClassroomById($id);
        $teachers = TeacherRepos::getTeachersByClassroomId($id);

        return view('Classrooms.ClassroomRepos.confirm',
            [
                'classroom' => $classroom[0],
                'teachers' => $teachers
            ]
        );
    }

    public function destroy(Request $request, $id){
        if($id != $request->input('id')){
            return redirect()->action('ClassroomControllerWithRepos@read');
        }

        ClassroomRepos::deleteStudentsByClassroomId($id);
        Classrooms_TeachersRepos::delete($id);
        ClassroomRepos::delete($id);


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
