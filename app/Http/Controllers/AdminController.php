<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;

class AdminController extends Controller
{
    public function showAddDoctor() {
        return view('admin.addDoctor');
    }

    public function uploadAddDoctor(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'room' => 'required',
            'specialty' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();

        $imagePath = $request->file('image')->storeAs('doctorImage', (time() . '.' . $request->image->getClientOriginalExtension()), 'public');

        $data['image'] = $imagePath;
        $data['created_at'] = Carbon::now();
        Doctor::create($data);
        return back()->with('AddedDoctor','Doctor Added Successfully');
    }

    public function showAppointments()
    {
        $appointments = Appointment::all();
        return view('admin.appointments',compact('appointments'));
    }

    public function cancleAAppointment(Appointment $appointment)
    {
        $appointment->update(['status' => 'Cancled']);
        return back()->with('DeletedAppointment','Appointment Cancled Successfully');
    }

    public function approvedAppointment(Appointment $appointment)
    {
        $appointment->update(['status' => 'Approved']);
        return back()->with('ApprovedAppointment','Appointment Approved Successfully');
    }

    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('admin.doctors',compact('doctors'));
    }

    public function editDoctor(Request $request)
    {
        $id = $request->edit;
        $doctor = Doctor::find($id);
        $allSpecialty = array('skin','heart','eyes','noses');
        $doctorSpecialties = array();
        $doctorSpecialties[0] = $doctor->specialty;
        for ($i=0; $i < count($allSpecialty); $i++) {
            if($doctor->specialty != $allSpecialty[$i])
                $doctorSpecialties[$i+1] = $allSpecialty[$i];
        }
        return view('admin.editDoctor',compact(['doctor','doctorSpecialties']));
    }

    public function updateDoctor(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'room' => 'required',
            'specialty' => 'required',
            'image' => 'mimes:png,jpg'
        ]);

        if($request->file('image')){
            $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();

        $imagePath = $request->file('image')->storeAs('doctorImage', (time() . '.' . $request->image->getClientOriginalExtension()), 'public');
        }else{
            $doctor = Doctor::where('phone',$data['phone'])->first();
            $imagePath = $doctor->image;
        }


        $data['image'] = $imagePath;
        $data['updated_at'] = Carbon::now();
        Doctor::where('phone',$data['phone'])->update($data);
        return to_route('admin.doctors')->with('EditedDoctor','Doctor Updated Successfully');
    }

    public function deleteDoctor(Doctor $doctor)
    {
        $doctor->delete();
        return back()->with('DeletedDoctor','Doctor Deleted Successfully');
    }

    public function sendEmailToUser(Appointment $appointment) {
        return view('admin.sendEmailToUser',compact('appointment'));
    }

    public function sendEmailNotificationToUser(Request $request, Appointment $appointment) {
        $details = $request->validate([
            'greeting' => 'required',
            'body' => 'required',
            'actionText' => 'required',
            'actionURL' => 'required',
            'endPart' => 'required'
        ]);

        Notification::send($appointment, new SendEmailNotification($details));
        return back()->with('EmailSended','Email Sended Successfully');
    }
}
