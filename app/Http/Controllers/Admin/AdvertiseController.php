<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return to advertise index view advertise.index

        $advertises = Advertise::orderBy('id' , 'desc')->get();

        return view('admin.advertise.index', compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return to create view company.create

        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save data to database advertise.store

        $request->validate([
            'company_name' => 'required',
            'phone' => 'required|numeric',
            'link' => 'required', // Adjust size according to your PAN format
            'image' => 'required', // Allows only specific image formats and sets size limit

        ]);

        $advertise = new Advertise();
        $advertise->company_name = $request->company_name;
        $advertise->phone = $request->phone;
        $advertise->link = $request->link;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $advertise->image = 'images/' . $fileName;
        }

        $advertise->save();

        toast('Your Record Save Successfull!', 'success');

        return redirect()->route('advertise.index');
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

        $advertise = Advertise::find($id);
        return view('admin.advertise.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data to database company.update


        $request->validate([
            'company_name' => 'required|string|max:255',
            'phone' => 'required',
            'link' => 'required', // Adjust size according to your PAN format
            'status' => 'required',

        ]);

        $advertise = Advertise::find($id);
        $advertise->company_name = $request->company_name;
        $advertise->phone = $request->phone;
        $advertise->link = $request->link;
        $advertise->status = $request->status;


        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $advertise->image = 'images/' . $fileName;
        }

        $advertise->update();

        toast('Your Record updated Successfull!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data from database company.destroy

        $advertise = Advertise::find($id);
        unlink(public_path($advertise->image));
        $advertise->delete();


        toast('Your Record Deleted Successfull!', 'success');
        return redirect()->route('advertise.index');
    }
}
