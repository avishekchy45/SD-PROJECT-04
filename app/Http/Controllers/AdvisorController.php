<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advisor;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
{
    public function advisorfrom(request $request)
    {
        $advisor = DB::table('teachers')
            ->select('teacher_id')
            ->get();
        //dd($advisor);
        return view('admin.add_advisor', compact('advisor'));
    }
    public function createadvisor(request $req)
    {
        $req->validate([
            'teaid' => 'required',
            'batch' => 'required|integer',
        ]);
        
        $obj2 = new Advisor();
       
        $obj2->teacher_id = $req->teaid;
        $obj2->batch = $req->batch;
        // dd($obj2);
        $obj2->save();
        if ( $obj2)
            return back()->with('successmsg', 'Advisor Successfully Created ');
        else
            return back()->with('errorsmsg', 'Cannot Create Advisor');
    }
    public function advisorlist()
    {
        $data = Advisor::all();
        return view('admin.advisor_list', compact('data'));
    }
}