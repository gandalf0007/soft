<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Soft\User;
use Soft\Http\Requests;

class ExcelController extends Controller
{
    
    public function userExport(){
        $export=user::all();
        Excel::create('user export',function($excel) use($export){
            $excel->sheet('sheet 1',function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xlsx');
         return redirect('/usuario');
    }

  





















}
