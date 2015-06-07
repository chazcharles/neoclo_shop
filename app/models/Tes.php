<?php 

class Tes extends Eloquent{
	protected $table  = 'product_image_large';
	protected $timestamp = false; 
	protected $fillable = array('large_image_id', 'product_id', 'link');
	
	public function product()
	{
		return $this->belongsTo('Product');
	}
}