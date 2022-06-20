<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class lab2tController extends Controller
{
    public function indexT()
    {
        $teachers = [];
        if(Session::has('teachers')){
            $teachers= Session::get('teachers');
        } else {
            $teachers = [
                ['id' => 1,
                    'Name' => 'John Main',
                    'DOB' => '19/04/1983',
                    'SSID' => '01830412345'
                ],
                ['id' => 2,
                    'Name' => 'Mary X',
                    'DOB' => '30/02/1986',
                    'SSID' => '11860298765'
                ]
            ];
            Session::put('teachers',$teachers);
        }
        return view('lab2section.indexteacher', ['teachers' => $teachers]);
    }

    public function newT()
    {
        return view('lab2section.newteacher');
    }

    public function storeT(Request $request)
    {
//        dd($request ->all());

//        $validation = $this->formValidate($request);
//        if ($validation->failed()){
//            return redirect()->back()
//                ->withErrors($validation);
//        }
        $this-> formValidate($request)->validate();
        $teachers = [];
        $teachers['id'] = count(Session::get('teachers')) + 1;
        $teachers['Name'] = $request->input('Name' );
        $teachers['DOB'] = $request->input('DOB');
        $teachers['SSID'] = $request->input('SSID' );

        Session::push('teachers', $teachers);
        return redirect()->action('lab2tController@indexT');
    }

    public function editT($id)
    {
        $updatedTea = Session::get('teachers')[$id - 1];
        return view('lab2section.editteachers', ['teachers' => $updatedTea]);
    }

    public function updateT(Request $request, $id)
    {
        if($request->input('id') != $id){
            return redirect()->action('lab2tController@indexT');
        }

        $this->formValidate($request)->validate();

        $allTea = Session::get('teachers');
        $updatedTea = $allTea[$id - 1];

        $updatedTea['Name'] = $request->input('Name');
        $updatedTea['DOB'] = $request->input('DOB');
        $updatedTea['SSID'] = $request->input('SSID');

        $allTea[$id - 1] = $updatedTea;

        Session::forget('teachers');

        Session::put('teachers', $allTea);

        return redirect()->action('lab2tController@indexT');

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
