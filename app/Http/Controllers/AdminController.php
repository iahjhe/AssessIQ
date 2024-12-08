<?php

namespace App\Http\Controllers;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    

    public function create_evaluation(){
        $teachers = User::where('role', 'teacher')->get(); // Fetch all teachers
        return view('admin.create_evaluation', compact('teachers'));
    }

    public function add_evaluation(Request $request){
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);
    
        // Create a new evaluation
        $evaluation = new Evaluation();
        $evaluation->user_id = $request->teacher_id; // Ensure it uses the correct teacher ID
        $evaluation->evaluator_id = Auth::id();
        $evaluation->subject = $request->subject;
        $evaluation->rating = $request->rating;
        $evaluation->feedback = $request->feedback;
        $evaluation->save();
    
        return redirect()->back()->with('success', 'Evaluation added successfully!');
    }
    public function show_evaluation(){
        $evaluations = Evaluation::with(['evaluator', 'teacher'])->get();
        return view('admin.show_evaluation', compact('evaluations'));
    }

    public function showFeedbacks()
    {
        // Fetch all evaluations and their feedback
        $feedbacks = Evaluation::select('feedback')->get();

        // Pass the feedbacks to the view
        return view('admin.show_feedbacks', compact('feedbacks'));
    }
    public function showReports()
    {
        // Total number of students
        $totalStudents = User::where('role', 'student')->count();
        
        // Total number of teachers
        $totalTeachers = User::where('role', 'teacher')->count();
        
        // Total feedbacks from evaluations (counting non-null feedback entries)
        $totalFeedbacks = Evaluation::whereNotNull('feedback')->count();
        
        // Average ratings per teacher
        $averageRatings = Evaluation::selectRaw('user_id, AVG(rating) as avg_rating')
                                    ->groupBy('user_id')
                                    ->get();
    
        return view('admin.reports', compact('totalStudents', 'totalTeachers', 'totalFeedbacks', 'averageRatings'));
    }

    public function create_teacher(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'teacher',
        ]);
    
        return redirect()->back()->with('success', 'Teacher account created successfully!');
    }
    
}
