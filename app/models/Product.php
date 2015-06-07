<?php

class Product extends Eloquent{
	protected $table  = 'product';
	protected $primaryKey = 'product_id';
	protected $timestamp = true; 
	
	public function productimagelarge() /*Notes: jangan gunakan _ - pada nama fungsi!!*/
	{
		return $this->hasMany('ProductImageLarge');
	}
}
