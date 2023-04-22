<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use DB;

class RadiographerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the doctor info
        $radiographers  = User::get()->where('role_id', 3);
        return view('radiographers.index', compact('radiographers'))
        ->with('i');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        return view('radiographers.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        request()->validate([
            'patient_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $patient = Patient::find($id);
        $req= $request->all();
        $req['patient_status'] = 3;
        $req['radiographer_id'] =  auth()->user()->id;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $req['image']= $filename;
        }

        $patient ->update($req);
/*         $patient = Patient::find($id);
        $req= $request->all();
        $req['patient_status'] = 3;
        $patient ->update($req); */

        if($patient)
        {
            return redirect(route('radiographer.requests'))
            ->with('success','Examined Successful');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
