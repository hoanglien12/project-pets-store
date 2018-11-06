<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		if($item->sale == 0){
			$giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item];
		}
		else{
			$giohang = ['qty'=>0, 'price' => $item->sale, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		if($item->sale == 0){
			$giohang['price'] = $item->price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->sale * $giohang['qty'];
		}
		$this->items[$id] = $giohang;
		$this->totalQty++;
		if($item->sale == 0){
			$this->totalPrice += $item->price;
		}
		else{
			$this->totalPrice += $item->sale;
		}
		
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
