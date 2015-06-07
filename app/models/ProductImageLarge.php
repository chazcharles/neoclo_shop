<?php 


/* NAMA CLASS TIDAK BOLEH PAKE _ - SEBAIKNYA SAMBUNG SEMUA!!*/
class ProductImageLarge extends Eloquent{
	protected $table  = 'product_image_large';
	protected $primaryKey = 'large_image_id';
	protected $timestamp = false; 
	protected $fillable = array('large_image_id', 'product_id', 'link');
	
	public function product()
	{
		return $this->belongsTo('Product');
	}
}