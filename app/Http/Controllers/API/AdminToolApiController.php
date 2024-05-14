<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Blog;
use App\Models\AdminTool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminToolApiController extends Controller
{
    public function index()
    {
        try{

           $tools = AdminTool::all();
        //    foreach($tools as $tool)
        //    {
            // $blog['img'] = public_path('images/blog/').$blog->img;
            
        //     if(!empty($tool['img'])){
        //        $tool['img'] = 'https://admin.xtreme.tools/images/tools/'.$tool->img;
        //     } 
            
        //    }

            $success['status'] =  200;
            $success['data'] =  $tools;
            return response()->json($success);

        }catch (Exception $e){
            $success['status'] =  400;
            $success['message'] =  $e->getMessage();
            return response()->json($success);
        }
    }

    public function show($id)
    {
        try{
            $tool = AdminTool::find($id);
        //    if(!empty($tool['img'])){
        //        $tool['img'] = 'https://admin.xtreme.tools/images/tool/'.$tool->img;
        //    } 
           $success['status'] =  200;
           $success['data'] =  $tool;
           return response()->json($success);
           
           
        }catch (Exception $e){

            $success['status'] =  400;
            $success['message'] =  $e->getMessage();
            return response()->json($success);
        }
    }
}
