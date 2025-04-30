<?php

namespace App\Http\Controllers;
use App\Models\Vacation;
use App\Models\Permission;
use App\Models\VacationBalance;
use App\Models\PermissionBalance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Password;

class User_Controller extends Controller
{
   //  public function __construct()
   //  {
   //      // Apply auth middleware to all methods except login and register
   //      $this->middleware('auth')->except(['login', 'doLogin', 'doRegister']);
   //  }
   
    public function index()
    {
        $vacationBalance = VacationBalance::where('employee_id', Auth::id())->first();
        $permissionBalance = PermissionBalance::where('employee_id', Auth::id())->first();

        return view("dashboard", [
            'Total_balance' => $vacationBalance ? $vacationBalance->Total_balance : 'N/A',
            'Balance_Amount' => $permissionBalance ? $permissionBalance->Balance_Amount : 'N/A'
        ]);
    }

    public function show_Vacation(VacationBalance $vacation)
    {
        $vacationBalance = VacationBalance::where('employee_id', Auth::id())->first();
        $permissionBalance = PermissionBalance::where('employee_id', Auth::id())->first();

        return view('dashboard', [
            'vacation' => $vacation,
            'Total_balance' => $vacationBalance ? $vacationBalance->Total_balance : 'N/A',
            'Balance_Amount' => $permissionBalance ? $permissionBalance->Balance_Amount : 'N/A'
        ]);
    }

    public function show_Permission(PermissionBalance $Permission)
    {
        $vacationBalance = VacationBalance::where('employee_id', Auth::id())->first();
        $permissionBalance = PermissionBalance::where('employee_id', Auth::id())->first();

        return view('dashboard', [
            'Permission' => $Permission,
            'Total_balance' => $vacationBalance ? $vacationBalance->Total_balance : 'N/A',
            'Balance_Amount' => $permissionBalance ? $permissionBalance->Balance_Amount : 'N/A'
        ]);
    }

    public function vacation()
    {
        return view("Users.vacation");
    }

    public function store_Vacation(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'comments' => 'required|string|min:5',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        try {
            // Calculate duration (excluding weekends)
            $start = \Carbon\Carbon::parse($request->start_date);
            $end = \Carbon\Carbon::parse($request->end_date);
            $duration = 0;
            
            for ($date = $start; $date->lte($end); $date->addDay()) {
                if (!$date->isWeekend()) {
                    $duration++;
                }
            }

            // Check if user has enough balance
            $vacationBalance = VacationBalance::where('employee_id', Auth::id())->first();
            
            if (!$vacationBalance || $vacationBalance->Total_balance < $duration) {
                return back()->withErrors(['error' => 'Insufficient vacation balance']);
            }

            // Create vacation request
            $vacation = Vacation::create([
                'employee_id' => Auth::id(),
                'Comments' => $request->comments,
                'Start_Date' => $request->start_date,
                'End_Date' => $request->end_date,
                'Duration' => $duration,
                'RequestDate' => now(),
                'ApprovalDate' => null,
                'Status' => 'Pending'
            ]);

            return redirect()->route('dashboard')->with('success', 'Vacation request submitted successfully');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to save vacation request']);
        }
    }

    public function permission()
    {
        return view("Users.permission");
    }

    public function store_Permission(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'Comments' => 'required|string|min:5',
            'Start_Date' => 'required|date|after_or_equal:today',
            'End_Date' => 'required|date|after_or_equal:Start_Date',
        ]);

        try {
            $permission = Permission::create([
                'Comments' => $request->Comments,
                'Start_Date' => $request->Start_Date,
                'End_Date' => $request->End_Date,
                'RequestDate' => now(),
                'ApprovalDate' => null,
                'Status' => 'Pending'
            ]);

            return redirect()->route('dashboard')->with('success', 'Permission request submitted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to save permission request']);
        }
    }

    
}
