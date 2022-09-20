<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admission;
use Faker\Core\File;
use Session;



class AdmissionController extends Controller
{


    public function jobList()
    {
        $forms = Admission::all();
        // return $form;
        return view('admin.job.job_list')->with(["forms" => $forms]);
    }



    public function AddAdmission()
    {
        return view('website.admission');
    }



    public function stores(Request $request)
    {



        $data = $request->all();

        if ($request->hasFile('personal_photo')) {
            $img_file = $request->file('personal_photo');
            $data['personal_photo'] = time() . '_' . $img_file->getClientOriginalName();
            $destinationPath = public_path('uploads/admission');
            $img_file->move($destinationPath, $data['personal_photo']);
        }

        if ($request->hasFile('file_1')) {
            $img_file = $request->file('file_1');
            $data['file_1'] = time() . '_' . $img_file->getClientOriginalName();
            $destinationPath = public_path('uploads/admission');
            $img_file->move($destinationPath, $data['file_1']);
        }


        if ($request->hasFile('file_2')) {
            $img_file = $request->file('file_2');
            $data['file_2'] = time() . '_' . $img_file->getClientOriginalName();
            $destinationPath = public_path('uploads/admission');
            $img_file->move($destinationPath, $data['file_2']);
        }
        if ($request->hasFile('file_3')) {
            $img_file = $request->file('file_3');
            $data['file_3'] = time() . '_' . $img_file->getClientOriginalName();
            $destinationPath = public_path('uploads/admission');
            $img_file->move($destinationPath, $data['file_3']);
        }



        $admissions = Admission::create($data);
        $admissions->save();

        if ($admissions) {
            Session::flash('admissions', 'Thanks for submitting');
            return redirect('/admision');
        } else {
            Session::flash('contact_error', 'Sorry form submitted failed');
            return redirect('/admision');
        }


        // return redirect('/admission')->with('success', 'Data Added Succssfully!!');


    }




    public function destroy_form(Request $request, $id)
    {
        $form = Admission::find($id);
        $form->delete();
        return redirect()->back()->with('status', 'Form deleted successfully !');


        // return view('admin.home.message.edit-message');
    }
}
