<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Patient;
use DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        //
/*         $patients  = Patient::get()
        ->all(); */
        $patients = DB::table('patients')
                    ->where('patients.doctor_id','=',auth()->user()->id)
                    ->get();
        return view('patients.index', compact('patients'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate([
            'name'=> 'required',
            'phone_number'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'age'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:0',
            'gender'=> 'required',
            'medical_aid'=> 'required',
            'medical_aid_no'=> 'required',
            'l_m_p'=> 'required',
            'examination'=> 'required',
            'examination_requested'=> 'required',
            'history'=>'required',
        ]);

        $req = $request -> all();
        $req['patient_status'] = 1;
       // $req['doctor_id']= 2;
        $req['doctor_id'] =  auth()->user()->id;
        $patient = Patient::create($req);
        //dd($patient);
        
        if($patient)
        {
            return redirect()->route('patients.index')
            ->with('success', 'Patient Created');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        return view('patients.show', compact('patient'));
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
        $patient = Patient::find($id);
        $req= $request->all();
        $req['patient_status'] = 2;
        $patient ->update($req);
        return redirect(route('secretary.request'))
        ->with('success','Appointment Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function radRequest()
    {
        $patients = DB::table('patients')
                ->leftjoin('users','patients.doctor_id','=','users.id')
                ->where('patients.patient_status','=', 2)
                ->whereNotNull('appointment_rad')
                ->get(['patients.id','patients.name','patients.id','patients.age','patients.examination','patients.created_at',
                'users.name','patients.appointment_rad']);
        return view('options.request', compact('patients'))
            ->with('i');
    }

    public function secRequest()
    {

        $patients = DB::table('patients')
                ->leftjoin('users','patients.doctor_id','=','users.id')
                ->where('patients.patient_status','=', 1)
                ->get(['patients.id','patients.name','patients.id','patients.age','patients.examination','patients.created_at',
                'users.name']);

        return view('options.request', compact('patients'))
            ->with('i');
    }

    public function examined()
    {

        $patients = DB::table('patients')
                ->leftjoin('users','patients.radiographer_id','=','users.id')
                ->where('patients.patient_status','=', 3)
                ->get(['patients.id','patients.name','patients.id','patients.age','patients.examination','patients.created_at',
                'users.name']);

        return view('options.examined', compact('patients'))
            ->with('i');
    }

    public function examine(Request $request, string $id)
    {
        $patient = Patient::find($id);
        $req= $request->all();
        $req['patient_status'] = 2;
        $patient ->update($req);
        return redirect(route('secretary.request'))
        ->with('success','Appointment Successful');
    }

    public function docExamined()
    {
        $patients = DB::table('patients')
                ->leftjoin('users','patients.radiographer_id','=','users.id')
                ->where('patients.patient_status','=', 3)
                ->where('patients.doctor_id','=',auth()->user()->id)
                ->get(['patients.id','patients.name','patients.id','patients.age','patients.examination','patients.created_at',
                'users.name']);

        return view('options.examined', compact('patients'))
            ->with('i');
    }

    public function radAppointment()
    {
        $patients = DB::table('patients')
                ->where('patients.patient_status','=', 2)
                ->whereNotNull('appointment_rad')
                ->get();

        return view('patients.index', compact('patients'))
            ->with('i');
    }

    public function docAppointment()
    {
        $patients = DB::table('patients')
                ->where('patients.patient_status','=', 3)
                ->whereNotNull('appointment_doctor')
                ->get();

        return view('patients.index', compact('patients'))
            ->with('i');
    }
}
