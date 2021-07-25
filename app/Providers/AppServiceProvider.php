<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()	
    {	
      view()->composer('header',function($view){	
          $loai_sp = ProductType::all();	
          	
          $view->with('loai_sp',$loai_sp);	
        });	


      view()->composer('header',function($view){	
        if(Session('cart')){	
             $oldCart = Session::get('cart');	
             $cart = new Cart($oldCart);	
             $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);	
            
            }	
      });	

      view()->composer('product.checkout',function($view){                                                   
        if(Session('cart')){                                                    
             $oldCart = Session::get('cart');                                                   
             $cart = new Cart($oldCart);             
             $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);                                                    
          }                                                 
      });   
    }	
}
// header khi chuyển sang trang khác thì nó vẫn giữ nguyên, dù chuyển tới trang khác thì dữ liệu
// ở header vẫn vậy