<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        // Fetch all users with the 'teacher' role
        $teacher = User::where('role', 'teacher')->get();
        return view('manage-teachers', compact('teachers'));
    }

public function edit_teacher($id)
{
    $teacher = User::where('id', $id)->where('role', 'teacher')->first();
    return(view('admin.edit_teacher',compact('teacher')));
}
public function update(Request $request, $id)
{
    // Find the teacher by ID
    $teacher = User::where('id', $id)->where('role', 'teacher')->first();

    // If no teacher is found, redirect with an error message
    if (!$teacher) {
        return redirect()->route('admin.manage-teachers')->with('error', 'Teacher not found.');
    }

    // Validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|string|max:255',
    ]);

    // Update the teacher's information
    $teacher->update($validated);

    // Redirect to the teacher management page with a success message
    return redirect()->route('admin.manage-teachers')->with('success', 'Teacher updated successfully!');
}





public function delete_teacher($id)
{
    $teacher = User::where('id', $id)->where('role', 'teacher')->first();
    $teacher->delete();

    return redirect()->back()->with('success', 'Teacher deleted successfully!');
}


    public function manageTeachers()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.manage-teachers', compact('teachers'));
    }
}
