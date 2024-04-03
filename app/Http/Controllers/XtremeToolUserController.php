<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CarRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\XtremeToolUserModel;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;
use App\DataTables\XtremeToolUserDataTable;

class XtremeToolUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(XtremeToolUserDataTable $dataTable)
    {
        $plans = SubscriptionPlan::get();
        return $dataTable->render('pages.xtreme-tools-users.list', compact('plans'));
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $tool_users = XtremeToolUserModel::find($id);
            return response()->json($tool_users);

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
            $updatedRow = XtremeToolUserModel::find($request->updateId);
            $updatedRow->update([
                'user_plan' => $request->planId ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        
        toastr()->success('Update Successfully');

        return redirect()->route('xtreme-tools-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            XtremeToolUserModel::find($id)->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('xtreme-tools-users.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
