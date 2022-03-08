<?php

namespace App\Repository;

use App\Models\Blood;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Myparent;
use App\Models\Nationalte;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
//use PHPUnit\Framework\MockObject\Builder\Stub;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\student as studentValidtae;
use Exception;

//use App\Models\Classroom;

class StudentRepo implements StudentRepoInterface
{
    public function add_student()
    {
        $data['my_grades'] = Grade::all();
        $data['parents'] = Myparent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalte::all();
        $data['bloods'] = Blood::all();


        return $data;
    }

    public function list_student()
    {
        $student_all = Student::all();

        return view('Students.list_student', compact('student_all'));
    }


    public function edit_student($id)
    {

        $data['my_grades'] = Grade::all();
        $data['parents'] = Myparent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalte::all();
        $data['bloods'] = Blood::all();
        $st_edit = Student::find($id);


        return view('Students.edit_student', compact('data', 'st_edit'));
    }

    public function Store_Student(studentValidtae $request)
    {



        DB::beginTransaction();
        try {
            $validated = $request->validated();

            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // add Attachment to student
            if ($request->hasFile('photos')) {

                foreach ($request->file('photos') as $file) {
                    $image = $file->getClientOriginalName();
                    $file->move('Attachments/student/' . $students->name, $image);
                    $image_table = new Image();
                    $image_table->filename = $image;
                    $image_table->imageable_id = $students->id;
                    $image_table->imageable_type = 'App\Models\Student';
                    $image_table->save();
                }
            }

            DB::commit();
            toastr()->success(trans('messages.sucess'));
            return redirect()->route('Students.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update_student(studentValidtae $request)
    {

        try {

            $validated = $request->validated();
            $Edit_Students = Student::findorfail($request->id);

            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();


            //cheak of attachment
            if ($request->file('photos')) {
                foreach ($Edit_Students->images as $attach) {
                    unlink('Attachments/student/' . $Edit_Students->name . '/' . $attach->filename);
                    Image::where('filename', $attach->filename)->delete();
                }
                foreach ($request->file('photos') as $file) {
                    $image = $file->getClientOriginalName();
                    $file->move('Attachments/student/' . $Edit_Students->name, $image);
                    $image_table = new Image();
                    $image_table->filename = $image;
                    $image_table->imageable_id = $Edit_Students->id;
                    $image_table->imageable_type = 'App\Models\Student';
                    $image_table->save();
                }
            }


            toastr()->success(trans('messages.edit'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function del_student($id)
    {

        $studete_attach = Student::find($id);
        if (isset($studete_attach->images->first()->imageable_id)) {
            foreach ($studete_attach->images as $attach) {
                unlink('Attachments/student/' . $studete_attach->name . '/' . $attach->filename);
                Image::where('filename', $attach->filename)->delete();
                Student::destroy($id);
            }
        } else {
            Student::destroy($id);
        }


        toastr()->error(trans('messages.delete'));
        return redirect()->route('Students.index');
    }

    public function Get_classerooms($id)
    {
        $classes = Classroom::where('Grade_id', $id)->pluck('name', 'id');
        return $classes;
    }

    public function Get_section($id)
    {
        $sections = Section::where('classroom_id', $id)->pluck('Name_section', 'id');
        return $sections;
    }


    public function show($id)
    {

        $Student = Student::find($id);
        $Fee_invoices = FeeInvoice::all();
        return view('Students.show', compact('Student','Fee_invoices'));
    }

    public function download_attchment($id, $namefile)
    {

        $st = Student::find($id);
        $downloadAttchment = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($st->name . '\\' . $namefile);
        return response()->download($downloadAttchment);
    }

    public function show_Attach($id, $namefile)
    {

        $st = Student::find($id);

        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($st->name . '\\' . $namefile);
        return response()->file($files);
    }


    public function upload_attachment($request)
    {



        foreach ($request->file('photos') as $file) {
            $image = $file->getClientOriginalName();
            $file->move('Attachments/student/' . $request->student_name, $image);

            $image_table = new Image();
            $image_table->filename = $image;
            $image_table->imageable_id = $request->student_id;
            $image_table->imageable_type = 'App\Models\Student';
            $image_table->save();
        }
        toastr()->success(trans('messages.edit'));
        return redirect()->route('Students.index');
    }
    // delete attachment only
    public function  del_attchment($id, $namefile)
    {

        try {
            $studete_attach = Student::find($id);
            unlink('Attachments/student/' . $studete_attach->name . '/' . $namefile);
            Image::where('filename', $namefile)->delete();

            toastr()->error(trans('messages.delete'));
            return redirect()->route('Students.show,$id');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
