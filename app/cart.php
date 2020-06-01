<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $items=[];
    public $total_qty;
    public $total_price;

    public function __construct($cart =null){
         if($cart){
             $this->items=$cart->items;
             $this->total_qty=$cart->total_qty;
             $this->total_price=$cart->total_price;
         }
         else{
             $this->items=[];
             $this->total_qty=0;
             $this->total_price=0;
         }
    }
    
    public function Add($book){
        $item=[
            'id'=>$book->id,
            'title'=>$book->title,
            'price'=>$book->price,
            'qty'=>0,
            'image'=>$book->image
            ];
        if(!array_key_exists($book->id, $this->items))
          {
            $this->items[$book->id]=$item;
            $this->total_qty+=1;
            $this->total_price +=$book->price; 
          } else{
            $this->total_qty+=1;
            $this->total_price +=$book->price;
            }

        
        $this->items[$book->id]['qty'] +=1;
    }


    public function remove($id){
        if(array_key_exists($id , $this->items)){
             $this->total_qty -= $this->items[$id]['qty'];
             $this->total_price -= $this->items[$id]['qty'] * $this->items[$id]['price'];
             unset($this->items[$id]);
        }
    }


    public function UpdateQty($id, $qty){
        $this->total_qty -= $this->items[$id]['qty'];
        $this->total_price -= $this->items[$id]['qty'] * $this->items[$id]['price'];
        
        $this->items[$id]['qty'] = $qty;

        $this->total_qty += $qty;
        $this->total_price += $qty * $this->items[$id]['price'];

    }
}
