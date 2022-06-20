<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class lab2Controller extends Controller
{
    public function indexCL()
    {
        $classes = [];
        if(Session::has('classes')){
            $classes = Session::get('classes');
        } else {
            $classes = [
                ['id' => 1,
                    'name' => 'C1808G',
                    'StartDate' => '17/08/2018',
                    'Size' => '24'
            ],
            ['id' => 2,
                'name' => 'C1909I',
                'StartDate' => '03/09/2019',
                'Size' => '15'
            ],
            ['id' => 3,
                'name' => 'C2010G3',
                'StartDate' => '07/10/2020',
                'Size' => '20'
            ],
            ['id' => 4,
                'name' => 'C2108G1',
                'StartDate' => '23/08/2021',
                'Size' => '22'
            ]
            ];
            Session::put('classes',$classes);
        }
        return view('lab2section.indexclasses', ['classes' => $classes]);
    }

    public function newCL()
    {
        return view('lab2section.newclasses');
    }

    public function storeCL(Request $request)
    {
  //     dd($request ->all());
        $this-> formValidate($request)->validate();
        $classes = [];
        $classes['id'] = count(Session::get('classes')) + 1;
        $classes['name'] = $request->input('name' );
        $classes['StartDate'] = $request->input('StartDate');
        $classes['Size'] = $request->input('Size' );

        Session::push('classes', $classes);
        return redirect()->action('lab2Controller@indexCL');
    }


    public function editC($id)
    {
        $updatedCl = Session::get('classes')[$id - 1];
        return view('lab2section.editclasses', ['classes' => $updatedCl]);
    }

    public function updateC(Request $request, $id)
    {
        if($request->input('id') != $id ){
            return redirect()->action('lab2Controller@indexCL');
        }

        $this->formValidate($request)->validate();

        $allCl = Session::get('classes');
        $updatedCl = $allCl[$id - 1];

        $updatedCl['name'] = $request->input('name');
        $updatedCl['StartDate'] = $request->input('StartDate');
        $updatedCl['Size'] = $request->input('Size');

        $allCl[$id - 1] = $updatedCl;

        Session::forget('classes');

        Session::put('classes', $allCl);

        return redirect()->action('lab2Controller@indexCL');

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
                'Size'=>['required','numeric','min:14']
            ]
        );
    }
}


















