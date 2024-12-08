<?php


namespace App\Http\Controllers;

use App\Models\Student;;
use App\Models\Evaluation;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        // Example: Return student portal for students, or manage students for admin
        if (Auth::user()->role === 'student') {
            return view('student.portal');
        }
    
        $students = User::where('role', 'student')->get();
        return view('admin.manage_students', compact('students'));
    }
    

    // Show edit form for a student
    public function edit_student($id)
    {
        $student = User::where('id', $id)->where('role', 'student')->first();
        
        // If student is not found, redirect with an error message
        if (!$student) {
            return redirect()->route('admin.manage_students')->with('error', 'Student not found.');
        }

        return view('admin.edit_student', compact('student'));
    }

    // Update student details
    public function update(Request $request, $id)
    {
        // Find the student by ID
        $student = User::where('id', $id)->where('role', 'student')->first();

        // If no student is found, redirect with an error message
        if (!$student) {
            return redirect()->route('admin.manage_students')->with('error', 'Student not found.');
        }

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:student,teacher,admin',
        ]);

        // Update the student's information
        $student->update($validated);

        // Redirect to the student management page with a success message
        return redirect()->route('admin.manage_students')->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function delete_student($id)
    {
        $student = User::where('id', $id)->where('role', 'student')->first();

        // If student not found
        if (!$student) {
            return redirect()->route('admin.manage_students')->with('error', 'Student not found.');
        }

        // Delete the student
        $student->delete();

        // Redirect back with a success message
        return redirect()->route('admin.manage_students')->with('success', 'Student deleted successfully!');
    }

    // Manage all students
    public function manageStudents()
    {
        // Fetch all students
        $students = User::where('role', 'student')->get();
        return view('admin.manage_students', compact('students'));
    }

    public function create_evaluation()
    {
        $teachers = User::where('role', 'teacher')->get(); // Fetch all teachers
        return view('student.create_evaluation', compact('teachers'));
    }

    /**
     * Handle the submission of a new evaluation by a student.
     */
    public function add_evaluation(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);

        // Create a new evaluation
        $evaluation = new Evaluation();
        $evaluation->user_id = $request->teacher_id; // Store the teacher's ID
        $evaluation->evaluator_id = Auth::id(); // Store the current student's ID as evaluator
        $evaluation->subject = $request->subject;
        $evaluation->rating = $request->rating;
        $evaluation->feedback = $request->feedback;
        $evaluation->save();

        return redirect()->back()->with('success', 'Evaluation added successfully!');
    }
}
