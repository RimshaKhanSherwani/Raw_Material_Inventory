<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\PriceLogs;
use App\Http\Controllers\PriceLogsController;

class PriceLogsController extends Controller
{
    public function store(Request $request)
    {
        $price = new PriceLogs;
        $price->item_name = $request['itemName'];
        $price->previous_price = $request['pre'];
        $price->updated_price = $request['price'];
        $price->save();

        return redirect('/');
        return response()->json(['success'=>true]);
    }

    public function show()
    {
        $pricedata = PriceLogs::all();
        $data = compact('pricedata');
        return view('Log_table')->with($data);
        
    }

    // public function deleteLog(Request $request){
    //     // console.log(id);
    //     // DB::delete('delete from pricelogs where id = ?',[$id]);
    //     // $request->delete();
    //     // $req = $request->all();
    //     // $data = PriceLogs::where('pricelog_id', '=', $request['id'])->first(); 
    //     // if($data){
    //     //     $data->$request['Pid']->delete();
    //     //     $data->$request['prep']->delete();
    //     //     $data->$request['upPrice']->delete();
    //     // }
    //     $req = $request->all();
    //     $data = PriceLogs::where('pricelog_id', '=', $request['id'])->first(); 
    //     $data->delete($request['id']);
    //     return redirect('/');
    //     return response()->json(['success'=>true]);
    // }

}