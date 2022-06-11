<?php

namespace App\Service;

class ProductHandler
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    public function sort()
    {
    	$new_products = array_filter($this->products,function($product){
			return $product['type'] == 'dessert';  
		});

	    $len = count($new_products);
	    for ($i = 0; $i < $len - 1; $i++) {
	        for ($j = 0; $j < $len - 1 - $i; $j++) {
	            $price0 = $new_products[j]['price'] ?: 0;
	            $price1 = $new_products[j+1]['price']?:0;
	            if($price0<$price1) {
	                $tmp = $new_products[$j];
	                $new_products[$j] = $new_products[$j+1];
	                $new_products[$j+1] = $tmp;	            	
	            }
    		}
    	}

    	return $new_products;
	
    }

    public function timeConvert($time)
    {
        foreach ($this->products as $product) {
            $product['create_at'] = $product['create_at'] ? strtotime($product['create_at']) : 0;
        }    	

    }
}













