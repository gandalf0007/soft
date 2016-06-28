<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Soft\User;
use Soft\Http\Requests;
use Illuminate\Support\Facades\Input;

class ExcelController extends Controller
{
    
    public function userExport(){
     

       $export = user::select('users.*','perfils.descripcion' )
            ->join('perfils','users.perfil_id','=','perfils.id')
            ->get();
                
        Excel::create('user export',function($excel) use($export){
            $excel->sheet('usuarios',function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xlsx');
         return redirect('/usuario');
    }

    public function userImport(){
       Excel::load(Input::file('user'),function($reader){
        $reader->each(function($sheet){
            user::firstOrCreate($sheet->toArray());
        });
       });
       return redirect('/usuario');
    }





















}
