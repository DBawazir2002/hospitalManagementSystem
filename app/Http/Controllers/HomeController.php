<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Doctor;
class HomeController extends Controller
{
    public function redirect() {
        if (Auth::id()) {
            if(auth()->user()->is_admin){
                return view('admin.home');
            }else{
                return redirect('/');
            }
        }
    }

    public function index() {
        $doctors = Doctor::all();
        return view('user.home',compact('doctors'));
    }

    public function appointment(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'doctor' => 'required',
            'date' => 'required'
        ]);

        $data['user_id'] = (Auth::id()) ? Auth::user()->id : null;

        Appointment::create($data);
         return back()->with('AddedAppointment','Appointment Request Successfully. We will contact with you soon.');
        //return back();
    }


    public function myAppointment()
    {
        $userId = Auth::user()->id;
        $appointments = Appointment::where('user_id',$userId)->get();

        return view('user.myAppointment',compact('appointments'));
    }


    public function cancleAppointment(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('DeletedAppointment','Appointment Cancled Successfully.');
    }
}
