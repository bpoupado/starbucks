<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrdersController extends Controller
{
    public function order(Request $request)
    {
        if(isset($request['drinks']) && !empty($request['drinks'])){
            return Order::verifyOrder($request);
        }else{
            return array("message" => "Please buy something.");
        }
    }
}
