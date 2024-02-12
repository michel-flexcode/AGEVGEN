<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialities = Speciality::query()->get();

        return Inertia::render('Specialities/Index', [
            'specialities' => $specialities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Specialities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        Speciality::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'La speciality a été ajoutée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        return Inertia::render('Specialities/Edit', [
            'speciality' => $speciality,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $speciality)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $speciality->update([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'Le speciality a été modifié!'); // Corrected the flash message

        return redirect()->route('specialities.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        session()->flash('flash.banner', 'La speciality a été détruite!');

        return redirect()->route('specialities.index');
        // return Inertia::render('Specialities/Delete', [
        //     'speciality' => $speciality,
        // ]);
        // return redirect()->route('specialities.index');
    }

    public function deletetest(Speciality $speciality)
    {
        // $speciality->delete();
        // session()->flash('flash.banner', 'La speciality a été détruite!');

        // return redirect()->route('specialities.index');
        return Inertia::render('Specialities/Delete', [
            'speciality' => $speciality,
        ]);
    }
}
