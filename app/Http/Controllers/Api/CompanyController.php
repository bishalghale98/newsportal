<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;

class CompanyController extends Controller
{

    public function company()
    {
        $company = Company::first();

        // return response()->json($company);
        return new CompanyResource($company);
    }

    public function company_store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:10',
                'pan' => 'required', // Adjust size according to your PAN format
                'address' => 'required|string|max:500', // Adjust max length if needed
                'reg_no' => 'required', // Adjust size and format if needed
                'logo' => 'required|image', // Allows only specific image formats and sets size limit

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
            return response()->json([
                "success" => true,
                "message" => "Company Added Successfully",
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->errors(),
            ]);
        }
    }
}
