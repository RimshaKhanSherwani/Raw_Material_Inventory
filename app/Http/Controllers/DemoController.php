<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\UnitModel;
use App\Http\Controllers\UnitController;

class DemoController extends Controller
{

    public function index(){
        return view('addresource');
    }

    public function store(Request $request)
    {
        $item = new Items;
        $item->item_name = $request['name'];
        $item->item_desc = $request['desc'];
        $item->item_quantity = $request['quant'];
        $item->item_qtype = $request['amt'];
        $item->item_cost = $request['cost'];
        $item->Total_cost = $request['totcost'];
        $item->save();

        return redirect('/');
    }
    function show()
    {
        $itemsdata = Items::all();
        $data = compact('itemsdata');
        return view('data_table')->with($data);
    }

    public function updateQuan(Request $request)
    {
        $req = $request->all();
        $data = Items::where('item_id', '=', $request['id'])->first(); 
        if($data){
            $data= Items::where('item_id', '=', $request['id'])->update(['item_quantity'=> $request['quantity'], 'Total_cost'=>$request['quantity'] * $data->item_cost]);
        }
        return response()->json(['success'=>true]);
    }

    
    public function updatePrice(Request $request)
    {
        $req = $request->all();
        //$data= Items::where('item_id', '=', $request['id'])->update(['item_cost'=> $request['price']]);
        $data = Items::where('item_id', '=', $request['id'])->first(); 
        if($data){
            $data= Items::where('item_id', '=', $request['id'])->update(['item_cost'=> $request['price'], 'Total_cost'=>$data->item_quantity * $request['price']]);
        }

        return response()->json(['success'=>true]);
    }
    
    public function autocomplete(Request $request)
    {
        $data = UnitModel::select("item_qtype")
                    ->where("item_qtype", "LIKE", "%{$request->terms}%")
                    ->get();

        $res = array();
        foreach ($data as $hsl)
            {
                $res[] = $hsl->item_qtype;
            }
        return response()->json($res);
    }
    // function total(Request $request)
    // {
    //     $total = $request->quant *$request->cost;
    //     return $total;
    // }
   
}