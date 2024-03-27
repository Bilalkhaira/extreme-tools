<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\CarImages;
use App\Models\CarRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        
        return $dataTable->render('pages.categories.list');
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

            Category::create([
                'created_by' => auth()->user()->id ?? '',
                'name' => $request->title ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('categories.index');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $category = Category::find($id);

            return response()->json($category);

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $updatedRow = Category::find($request->updateId);
            $updatedRow->update([
                'name' => $request->title ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Category::find($id)->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('categories.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
