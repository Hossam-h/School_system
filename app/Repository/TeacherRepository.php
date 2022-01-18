<?php

namespace App\Repository;

use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Spechialize;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeacher()
    {
        return  Teacher::all();
    }

    public function Getspecialization()
    {
        return   Spechialize::all();
    }
    public function GetGender()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {

        try {
            $Teachers = new Teacher();
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('teacher.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function Teacherdelete($request)
    {

        try {

            Teacher::destroy($request->id);
            toastr()->error(trans('messages.delete'));
            return redirect()->route('teacher.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function editTeachers($id){
        return Teacher::findOrFail($id);

    }

    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->update([
                'Email' => $request->Email,
                'Password' =>  Hash::make($request->Password),
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Specialization_id' => $request->Specialization_id,
                'Gender_id' => $request->Gender_id,
                'Joining_Date' => $request->Joining_Date,
                'Address' => $request->Address,

            ]);


            toastr()->success(trans('messages.Update'));
            return redirect()->route('teacher.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

}
