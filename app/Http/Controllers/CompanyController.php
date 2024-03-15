<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('pages.admin.companies', compact('companies'));
    }

    public function editCompany($id)
    {
        $company = Company::findOrFail($id);

        return view('pages.admin.edit_company', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the company data
        $company->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('companies')->with('success', 'Company updated successfully');
    }


    public function deleteCompany($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return Redirect::back()->with('error', 'Company not found');
        }

        $company->delete();

        return Redirect::route('companies')->with('success', 'Company deleted successfully');
    }
}
