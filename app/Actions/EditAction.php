<?php
namespace App\Actions;
use App\Models\Product;

use illuminate\Support\Collection;


class EditAction
{
   public function execute(Collection $collection)
   {

    Product::where('id',$collection->get('id'))->update([
    'name'=>$collection->get('name'),
    'price'=>$collection->get('price'),
    'description'=>$collection->get('description'),
    'image'=>$collection->get('image')->store('storage','public'),
    
     
    ]);
   return true;   
}
    
}
?>