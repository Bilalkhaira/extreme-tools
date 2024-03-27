<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Tag;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\DataTables\TagDataTable;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TagDataTable $dataTable)
    {
        
        return $dataTable->render('pages.tags.list');
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

            Tag::create([
                'created_by' => auth()->user()->id ?? '',
                'name' => $request->title ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('tags.index');
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
            $tag = Tag::find($id);

            return response()->json($tag);

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
            $updatedRow = Tag::find($request->updateId);
            $updatedRow->update([
                'name' => $request->title ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Tag::find($id)->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('tags.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
