<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;


class productCont extends Controller
{
    public function saveProducts(Request $request){
            $product = product::create($request->all()); 
            return response()->json($product,200);
    }   

    public function getProducts(){
        $products = product::all(); 
        return response()->json($products,200); 
    }

    public function getProduct($id){
        $prod = product::find($id); 
        if(!$prod){
            return response()->json(
                ['message' => 'no hay bro'], 404); 
        }
        return response()->json($prod,200); 
    }

    public function deleteProduct($id){
        $prod = product::find($id);
        if(!$prod){
            return response()->json(
                ['message'=> 'Producto no encontrado'], 404);
            }

            $prod->delete(); 
            /*return response()->json(
                ['message' => 'producto con el id: '.$id .', eliminado'],404
            ); */
            
        }

    public function updateProduct(request $request, $id){
        $prod = product::find($id);
        if(!$prod){
            return response()->json(
                ['message' => 'Producto no encontrado'], 404);
            }

            $prod->update($request->all());
            return response()->json(
                ['message' => 'producto con el id: '.$id .', actualizado'],200
            ); 
            
        }
    
}