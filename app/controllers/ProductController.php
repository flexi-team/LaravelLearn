<?php

class ProductController extends BaseController {

	
	/* ========================================================================
		Product Show View Method
		Description:
			To Views all product in the current stock
		Route:
			Route::get('/product', 'ProductController@showProduct');
		Params:
			n/a
		Output:
			n/a
		======================================================================= */
	public function showProduct()
	{
		return View::make('product-show');
	}

}