<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the doctor info
        $doctors  = User::get()->where('role_id', 2);
        return view('doctors.index', compact('doctors'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.doctor.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('options.book',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
            'patient_name' => 'required',
            'appointment_rad' => 'required',
        ]);

        $patient = Patient::find($id);
        $req= $request->all();
        $req['patient_status'] = 2;
        $patient ->update($req);

        if($patient)
        {
            return redirect(route('secretary.request'))
            ->with('success','Appointment Successful');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Prevent user delete himself
        if (auth()->user()->id == $id) {
            abort(401);
        };
        $user = User::find($id);
        $userDelete = $user->delete();
        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        };
        return redirect()->route('doctor.index')->with('message', 'Doctor ' . $user->name . ' deleted successfully');
    }

    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,

            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'

        ]);
    }
}
