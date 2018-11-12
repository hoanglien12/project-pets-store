<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DetailOrder;


class OrderController extends Controller
{
    public function index()
    {
    	$orders 		= Order::all();
    	$count_orders   = count($orders);
    	return view('admin.order.index', compact('orders','count_orders'));
    }
    public function detail_order($id)
    {
    	$detail_order = DetailOrder::where('id_order',$id)->get();
    	// dd($detail_order);
    	return view('admin.order.detail',compact('detail_order'));
    }
    public function delete($id)
    {
    	
    }
    public function change_status(Request $request)
    {
    	$data     = $request->all();
        if(!isset($data['get_id'])) {
            return response()->json([
                        'code' => 0,
                        'data' => [],
                        'mes' => 'Fail.'
                    ]);
        }
       
        $get_id     = $data['get_id'];
        $get_type   = $data['get_type'];
        $check      = Order::query()->findOrFail($get_id);
        // console($check->active);
        if($get_type == 1){
            $check->status = 2;
        }
        else{
            $check->status = 1;
        }
        
        $check->save();

        return response()->json([
                    'code' => 1,
                    'data' => [],
                    'mes' => 'Success'
                ]);

    }
}
