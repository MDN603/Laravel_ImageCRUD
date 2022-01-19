<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function addStudent(){
        return view('add-student');
    }

    public function storeStudent(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $students = new Students();
        $students->name = $name;
        $students->profilePicture = $imageName;
        $students->save();

        return back()->with('data_inserted','Record inserted!'); 
    }

    public function students(){
        $students = Students::all();
        return view('all-students',compact('students'));
    }

    public function editStudent($id){
        $students = Students::find($id);
        return view('edit-student',compact('students'));
    }

    public function updateStudent(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $students = Students::find($request->id);
        $students->name = $name;
        $students->profilePicture = $imageName;
        $students->save();

        return back()->with('data_updated','Record updated!'); 
    }
    
    public function deleteStudent($id){
            $students = Students::find($id);
            unlink(public_path('images').'/'.$students->profilePicture);
            $students->delete();
            return back()->with('data_deleted','Record Deleted!');
    }
}
