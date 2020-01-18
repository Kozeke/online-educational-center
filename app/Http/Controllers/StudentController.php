<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentController extends Controller
{
    public function create(Request $request){
        $spreadsheet = new Spreadsheet();
        // $sheet->setCellValue('A1', 'Hello World !');
        $array=User::whereHas('role',function($q){
            $q->where('roles.name','student');
        })->get();
        $names=[];
        $date=[];
        $cours=[];
        // Log:info($array);
        foreach($array as $arr){
            $cources=User::where('id',$arr->id)->with('cources')->get();
            $cources=$cources[0]->cources;
            $res=" ";
            foreach($cources as $course){
                $res.=$course->name;
                $res.=" ";
            }            
            array_push($names,$arr->name);
            array_push($date,$arr->created_at);

            array_push($cours,$res);
        }
        $columnArray = array_chunk($names,1);
        $columnArray2 = array_chunk($date,1);
        $columnArray3 = array_chunk($cours,1);

        $spreadsheet->getActiveSheet()
        ->fromArray(
           $columnArray,  // The data to set
           NULL,        // Array values with this value will not be set
           'C3'         // Top left coordinate of the worksheet range where
                    //    we want to set these values (default is A1)
        );
        $spreadsheet->getActiveSheet()
        ->fromArray(
           $columnArray2,  // The data to set
           NULL,        // Array values with this value will not be set
           'E3'         // Top left coordinate of the worksheet range where
                    //    we want to set these values (default is A1)
        );
        $spreadsheet->getActiveSheet()
        ->fromArray(
           $columnArray3,  // The data to set
           NULL,        // Array values with this value will not be set
           'G3'         // Top left coordinate of the worksheet range where
                    //    we want to set these values (default is A1)
        );

        // Log:info($names);
       
        $writer = new Xlsx($spreadsheet);
        $writer->save('students.xlsx');

        return 'ok';
    }
}
