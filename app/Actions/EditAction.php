<?php
namespace App\Actions;
use App\Models\Product;

use illuminate\Support\Collection;


class EditAction
{
   public function execute(Collection $collection,$product)
   {     
   
     $product->name = $collection->get('name');
     $product->price=$collection->get('price');
     $product->description=$collection->get('description');

     if($collection->has('image')){
      $product->image=$collection->get('image')->store('storage','public');
    }
    $product->save();
    // Product::where('id',$id)->update($update);
    
   return true;   
}
    
}
?>