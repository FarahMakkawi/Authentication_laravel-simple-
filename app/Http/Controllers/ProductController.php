<?php

namespace App\Http\Controllers;

use App\Jobs\CreateProductJob;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function create(){
        $user=User::all()->first();
        
        $product=Product::create([
            'name'=>'product1',
            'description'=>'test',
        ]);
 

        $user->notify(new ProductCreatedNotification($product));

        // CreateProductJob::dispatch();
    }



    // عندي متحول عم جيب منو البيانات 
    //  اذا هل كي موجود رجعلي البيانات 
    // عم فك التشفير 
    // غير ذالك ببحث عنا وبخزن بالكاش وبرجع رد 

    public function show($id){
        
    // $redis = Redis::connection();
    $cachedProduct = Redis::get('product_' . $id);


  if(isset($cachedProduct)) {
      $product = json_decode($cachedProduct, FALSE);

      return response()->json([
          'status_code' => 200,
          'message' => 'Fetched from redis',
          'data' => $product,
      ]);
  }else {
      $product = Product::find($id);
      Redis::set('product_' . $id, $product);

      return response()->json([
          'status_code' => 201,
          'message' => 'Fetched from database',
          'data' => $product,
      ]);
  }
    }

   

}
