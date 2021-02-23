<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::all();
        return view('auth.admin.plan.index')->with(compact('plans'));
    }

    public function addPlan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:plans',
            'price' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plan = new Plan();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->description = $request->description;
        $plan->save();
        if($plan){
            session()->flash('success', 'Plan Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add Plan, possible internet error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $plan_id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Plan::where('id', $plan_id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description
            ]);
            session()->flash('success', 'Plan Updated successfully');
            return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Plan, possible internet error');
            return redirect()->back();
        }
        
    }


    public function destroy(Request $request)
    {
        $plan_id = $request->plan_id;
        $plan = Plan::where(['id'=>$plan_id])->delete();
        if($plan){
            
            session()->flash('success', "Plan Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete pPan. possible internet error');
            return redirect()->back();
        }
    }

    public function enquiries()
    {
        $enquiries = \App\Enquiry::where('type', 'plan')->get();
        return view('auth.admin.plan.enquiries')->with(compact('enquiries'));
    }

    public function deleteEnquiry(Request $request)
    {
        $enq_id = $request->enq_id;
        $enq = \App\Enquiry::where(['id'=>$enq_id])->delete();
        if($enq){
            
            session()->flash('success', "Enquiry Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Enquiry. possible internet error');
            return redirect()->back();
        }
    }

    public function webPlans()
    {
        $plans = Plan::paginate(15);
        return view('home.plans')->with(compact('plans'));
    }


}