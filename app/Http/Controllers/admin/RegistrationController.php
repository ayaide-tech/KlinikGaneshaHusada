<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;
use App\Patient;
use Sentinel;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registrations = Registration::orderBy('id', 'DESC')->get();        
        return view('pages.admin.registration.list', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all(); 
        $role = Sentinel::findRoleById(3);        
        $doctors = $role->users()->with('roles')->get();
        return view('pages.admin.registration.add', compact ('patients','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $data=[
            'patient_id'=> $request->patient_id,
            'doctor_id'=> $request->doctor_id,
            'complaint'=> $request->complaint,
            'type' => $request->type,
            'blood_pressure' => $request->blood_pressure           
        ];

        Registration::create($data);
        return redirect()->route('admin.registration.list');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $patients = Patient::all();
        $registration = Registration ::find($id);        
        
        $role = Sentinel::findRoleById(3);        
        $doctors = $role->users()->with('roles')->get();
        return view('pages.admin.registration.add',compact('registration','patients','doctors'));
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
        //
        // return dd($request);
        $registration = Registration::findOrFail($id);
              
        
        $input = $request->all();

        // return dd ($request);
    
        $registration->fill($input)->save();
        // Session::flash('flash_message', 'Task successfully added!');

        return redirect()->route('admin.registration.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $registration = Registration::find($id);
            $registration->delete();
            return redirect()->route('admin.registration.list');
        
    }
}