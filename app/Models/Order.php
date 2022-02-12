<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\ProductExtra;

class Order extends Model
{
    use HasFactory;

    public function verifyOrder($order) {
        $orderAmmount = 0;
        $orderExtras = array();

        if(!empty($order['drinks'])) {
            foreach($order['drinks'] as $orderDrink) {

                $product = Product::where('id', '=', $orderDrink['id'])
                ->get();
    
                //VERIFY PRODUCT
                if(!isset($product[0])) {
                    return array("message" => "We don't have one of the items you are trying to buy. Please try another store.");
                }
    
                //VERIFY STOCK
                if($orderDrink['quantity'] > $product[0]['stock']) {
                    return array("message" => "We don't have enough stock to provide you all the '" . $product[0]['name'] . "'s that you want.");
                }
    
                //ADD TO ORDER VALUE
                $orderAmmount += $orderDrink['quantity'] * $product[0]['price'];
    
                //VERIFY EXTRAS AND BUILD EXTRAS ARRAY
                if(!empty($orderDrink['extras'])) {
                    foreach($orderDrink['extras'] as $drinkExtra) {

                        $key = array_search($drinkExtra['id'], array_column($orderExtras, 'id'));
                        if(isset($orderExtras[$key]) && $orderExtras[$key]['id'] == $drinkExtra['id']){
                            $orderExtras[$key]['quantity'] += $drinkExtra['quantity'];
                        }else{
                            array_push($orderExtras, $drinkExtra);
                        }
                    }
                }

                //VERIFY EXTRAS STOCK AND PRICE
                foreach($orderExtras as $orderExtra){
                    $productExtra = ProductExtra::where('id', '=', $orderExtra['id'])
                    ->get();

                    //VERIFY PRODUCT EXTRA
                    if(!isset($productExtra[0])) {
                        return array("message" => "We don't have one of the items you are trying to buy. Please try another store.");
                    }

                    //VERIFY PRODUCT EXTRA STOCK
                    if($orderExtra['quantity'] > $productExtra[0]['stock']) {
                        return array("message" => "We don't have enough stock to provide you all the '" . $productExtra[0]['name'] . "'s that you want.");
                    }

                    //ADD TO ORDER VALUE
                    $orderAmmount += $orderExtra['quantity'] * $productExtra[0]['price'];
                }

            }

            //VERIFY ORDER PAYMENT
            if($order['payment_details']['ammount'] >= number_format($orderAmmount, 2)){
                return array("message" => "Thanks for your purchase. Here is your exchange: " . number_format(($order['payment_details']['ammount'] - $orderAmmount), 2));
            }else{
                return array("message" => "Insufficient funds. Order total is: " . number_format($orderAmmount, 2));
            }
        }else{
            return array("message" => "Please add some Products to your order.");
        }

    }





}
