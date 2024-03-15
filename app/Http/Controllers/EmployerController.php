<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployerController extends Controller
{
    public function employeeList()
    {
        $employers = Employer::all();
        return view("pages.admin.employees", compact('employers'));
    }

    public function editEmployees($id)
    {
        $employee = Employer::findOrFail($id);
        return view('pages.admin.edit_employees', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employer::findOrFail($id);

        $request->validate([
            'employer_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $employee->update([
            'employer_name' => $request->input('employer_name'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('admin.employees')->with('success', 'Employee updated successfully');
    }


    public function deleteEmployee($id)
    {
        $employer = Employer::find($id);

        if (!$employer) {
            return Redirect::back()->with('error', 'Employer not found');
        }

        $employer->delete();

        return Redirect::route('admin.employees')->with('success', 'Employer deleted successfully');
    }
}
