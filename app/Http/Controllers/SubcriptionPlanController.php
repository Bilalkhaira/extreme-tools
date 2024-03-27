<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\ToolQuota;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubscriptionPlan;
use App\DataTables\SubcriptionPlanDataTable;

class SubcriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubcriptionPlanDataTable $dataTable)
    {
        return $dataTable->render('pages.subcription-plan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $lowercaseString = strtolower($request->title);
            $convertedString = str_replace(' ', '_', $lowercaseString);
            SubscriptionPlan::create([
                'id' => $convertedString ?? '',
                'name' => $request->title ?? '',
                'createdAt' => Carbon::now() ?? '',
                'updatedAt' => Carbon::now() ?? '',
            ]);
            toastr()->success('Created Successfully');
            return redirect()->route('subcription-plan.index');
        } catch (Exception $e) {
            toastr()->error($e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $blog = SubscriptionPlan::find($id);

            return response()->json($blog);

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
            $updatedRow = SubscriptionPlan::find($request->updateId);
            $updatedRow->update([
                'name' => $request->title ?? '',
                'updatedAt' => Carbon::now() ?? '',
            ]);
            toastr()->success('Update Successfully');
            return redirect()->route('subcription-plan.index');
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $record = SubscriptionPlan::find($id);
            if(!empty($record)) {
                $record->delete();
            }
            toastr()->success('Delete Successfully');
            return redirect()->route('subcription-plan.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    public function subcriptionPlanTools(Request $request)
    {
        $allTools = Tool::get();
        $plan = SubscriptionPlan::with('tools')->find($request->id);
        $alreadySelectedTools = [];
        foreach($plan->tools as $tools) {
            
           $alreadySelectedTools[] = $tools->id ?? '';
        }
       return view('pages.subcription-plan.subcription-plan-tools', compact(['allTools', 'alreadySelectedTools', 'plan']));
    }

    public function subcriptionPlanToolsUpdate(Request $request)
    {
        try {

            $selectedToolIds = $request->input('checkbox', []);
            if(!empty($selectedToolIds)){
                ToolQuota::where('plan', $request->planId)->delete();
                foreach (array_keys($selectedToolIds) as $key) 
                {
                    ToolQuota::create([
                        'tool_id' => $key,
                        'plan' => $request->planId,
                        'createdAt' => Carbon::now() ?? '',
                        'updatedAt' => Carbon::now() ?? '',
                    ]);
                }
            }
            toastr()->success('Update Successfully');
            // return redirect()->route('subcription-plan.index');
            return redirect()->back();
            
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
    }
}
