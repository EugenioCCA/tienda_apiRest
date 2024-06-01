<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;

class sucursalCont extends Controller
{

    //The value $request is to indicate that we need to put all the information of the table
    public function addBranch(Request $request){
        $addBranch = branch::create($request->all()); 
        return response()->json(['message'=>'branch successfully added'],200);
    }

    public function getBranchs(){
        $branchs = branch::all(); 
        return response()->json($branchs,200);
    }

    public function getBranch($id){
        $branch = branch::find($id);
        if(!$branch){
            return response()->json(
                ['message' => 'no brach found, wrong id'], 404);
        }
        return response()->json($branch,200); 
    }

    public function updateBranch(request $request,$id){
        $branch = branch::find($id); 
        if(!$branch){
            return response()->json(
                ['message' => 'no brach found, wrong id'], 404);
        }
        $branch->update($request->all());
        return response()->json(
            ['message' => 'branch with the id:'.$id.', was updated'], 200);
        
    }

    public function deleteBranch($id){
        $branch = branch::find($id); 
        if(!$branch){
            return response()->json(
                ['message' => 'no brach found, wrong id'], 404);
        }
        $branch->delete();
        return response()->json(
            ['message' => 'branch with the id:'.$id.', was deleted'], 200);
    }
    
}
