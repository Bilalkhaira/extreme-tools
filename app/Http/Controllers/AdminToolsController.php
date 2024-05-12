<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\AdminTool;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\DataTables\AdminToolsDataTable;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;

class AdminToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminToolsDataTable $dataTable)
    {
        $tools = AdminTool::get();
        
        return $dataTable->render('pages.adminTools.list', compact(['tools']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // $imgpath = public_path('images/tools/');
            // if (!empty($request->avatar)) {
            //     $file = $request->avatar;
            //     $fileName = time() . '.' . $file->clientExtension();
            //     $file->move($imgpath, $fileName);
            // }

            AdminTool::create([
                'created_by' => auth()->user()->id ?? '',
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                // 'img' => $fileName ?? '',
                'img' => $request->media_url ?? '',
                'url' => $request->url ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('tools.index');
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $tool = AdminTool::find($id);
            return view('pages.adminTools.show', compact(['tool']));
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tool = AdminTool::find($id);
        return response()->json($tool);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $updatedRow = AdminTool::find($request->updateId);
            // $imgpath = public_path('images/tools/');
            // if (empty($request->avatar)) {
            //     $updateimage = $updatedRow->img;
            // } else {
            //     $imagePath =  $imgpath . $updatedRow->img;
                
            //     if (File::exists($imagePath)) {
            //         File::delete($imagePath);
            //     }
            //     $destinationPath = $imgpath;
            //     $file = $request->avatar;
            //     $fileName = time() . '.' . $file->clientExtension();
            //     $file->move($destinationPath, $fileName);
            //     $updateimage = $fileName;
    
            // }

            $updatedRow->update([
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                // 'img' => $updateimage ?? '',
                'img' => $request->media_url ?? '',
                'url' => $request->url ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('tools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // $imgpath = public_path('images/tools/');
            $imgRecord = AdminTool::find($id);
            // $path = $imgpath . $imgRecord->img;

            // if (File::exists($path)) {
            //     File::delete($path);
            // }

            $imgRecord->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('tools.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
