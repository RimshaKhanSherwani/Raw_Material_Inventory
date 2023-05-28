<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;
use DB;

class UnitController extends Controller
{
    public function storeUnits()
    {
        $unit = [
            ["item_qtype"=> "meters"],
            ["item_qtype"=> "kilograms"],
            ["item_qtype"=> "centimeters"],
            ["item_qtype"=> "liter"],
            ["item_qtype"=> "count"],
            ["item_qtype"=> "pounds"],
            ["item_qtype"=> "inches"],
            ["item_qtype"=> "feet"],
            ["item_qtype"=> "yards"],
            ["item_qtype"=> "millimeter"],
        ];

        UnitModel::insert($unit);
        return "Inserted Success!!";
    }

    // public function autocomplete(Request $request)
    // {
    //     $data = UnitModel::select("item_qtype")
    //                 ->where("item_qtype", "LIKE", "%{$request->terms}%")
    //                 ->get();

    //     return response()->json($data);
    // }

    // public function fetch(Request $request)
    // {
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data = DB::table('unit')
    //                 ->where("item_qtype", "LIKE", "%{$query}%")
    //                 ->get();
    //         $output = '<ul class = "dropdown-menu"
    //             style = "display:block;
    //             position:relative">';
    //             foreach($data as $row)
    //             {
    //                 $output .= '<li><a href="#">'.$row
    //                 ->country_name.'</a></li>';
    //             }
    //             $output .= '</ul>';
    //             echo $output;
    //     }
    // }
}
