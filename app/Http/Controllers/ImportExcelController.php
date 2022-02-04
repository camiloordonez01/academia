<?php

namespace App\Http\Controllers;

use App\Imports\CsvDataImport;
use Illuminate\Http\Request;
use DB;
use Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

ini_set('memory_limit','-1');

class ImportExcelController extends Controller
{
    function index()
    {
        return view('administrador/test/preguntas/import',['empty'=>true]);
    }

    function import(Request $request)
    {
        $extensions = array("xls","xlsx");

        $result = array($request->file('select_file')->getClientOriginalExtension());

        if(in_array($result[0],$extensions))
        {
            $path = $request->file('select_file')->getRealPath();
            $reader = new Xlsx();
            $spreadsheet = $reader->load($path);
            $datos = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            

            $col = 0;
            $dat;
            $dat['tema'] = $request->get('tema');
            $insert_data = [];
            for($i = 1;$i < count($datos);$i++){
                if(!($datos[$i]["B"]==null)){
                    switch ($col) {
                        case 0:
                            $dat['pregunta'] = $datos[$i]["B"];
                            $col = $col + 1;
                            break;
                        case 1:
                            $dat['respuesta1'] = $datos[$i]["B"];
                            $col = $col + 1;
                            break;
                        case 2:
                            $dat['respuesta2'] = $datos[$i]["B"];
                            $col = $col + 1;
                            break;
                        case 3:
                            $dat['respuesta3'] = $datos[$i]["B"];
                            $col = $col + 1;
                            break;
                        case 4:
                            $dat['respuesta4'] = $datos[$i]["B"];
                            $col = $col + 1;
                            break;
                        case 5:
                            switch ($datos[$i]["B"]) {
                                case 'A':
                                    $dat['correcta'] = '1';
                                    break;
                                case 'B':
                                    $dat['correcta'] = '2';
                                    break;
                                case 'C':
                                    $dat['correcta'] = '3';
                                    break;
                                case 'D':
                                    $dat['correcta'] = '4';
                                    break;
                            }
                            $col = 0;
                            array_push($insert_data, $dat);
                            break;
                    }
                }


                /*if(!($datos[$i]["A"]==null&&
                    $datos[$i]["B"]==null&&
                    $datos[$i]["C"]==null&&
                    $datos[$i]["D"]==null&&
                    $datos[$i]["E"]==null&&
                    $datos[$i]["F"]==null&&
                    $datos[$i]["G"]==null)){
                        $insert_data[] = array(
                            'tema'   => $datos[$i]["A"],
                            'pregunta'  => $datos[$i]["B"],
                            'respuesta1'   => $datos[$i]["C"],
                            'respuesta2'   => $datos[$i]["D"],
                            'respuesta3'    => $datos[$i]["E"],
                            'respuesta4'  => $datos[$i]["F"],
                            'correcta'   =>$datos[$i]["G"]
                        );
                }*/
            }
            if(!empty($insert_data))
            {
                return view('administrador/test/preguntas/import',['datos'=>$insert_data,'empty'=>false]);
            }
            return view('administrador/test/preguntas/import',['empty'=>true]);
        }else{
            $this->validate($request,
                [
                    'select_file'=> 'required|mimes:xlsx, xls'
                ]
            );
        }
    }

    
}
