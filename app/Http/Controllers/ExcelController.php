<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;



class ExcelController extends Controller
{
    //
    public function export()
    {

        $ar = DB::table('area_conocimiento')
        ->get();
        
        return Excel::download(new class($ar) implements FromCollection {
            protected $ar;
            
            public function __construct($ar)
            {
                $this->ar = $ar;
            }

            public function collection()
            {
                return $this->ar;
            }
        }, 'users.xlsx');
    }
}
