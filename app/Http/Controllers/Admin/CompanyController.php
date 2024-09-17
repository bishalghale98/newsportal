<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return to company index view company.index

        $company = Company::first();

        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return to create view company.create

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save data to database company.store

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'pan' => 'required', // Adjust size according to your PAN format
            'address' => 'required|string|max:500', // Adjust max length if needed
            'reg_no' => 'required', // Adjust size and format if needed
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Allows only specific image formats and sets size limit

        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->pan = $request->pan;
        $company->address = $request->address;
        $company->reg_no = $request->reg_no;
        $company->facebook = $request->facebook;
        $company->youtube = $request->youtube;

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $company->logo = 'images/' . $fileName;
        }

        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // view single data company.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return to edit view company.edit

        return view('admin.company.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data to database company.update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data from database company.destroy

    }
}
