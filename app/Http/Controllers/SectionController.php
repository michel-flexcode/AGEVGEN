<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::query()->get();

        return Inertia::render('Sections/Index', [
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sections/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        Section::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'La section a été ajoutée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return Inertia::render('Sections/Edit', [
            'section' => $section,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $section->update([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'Le section a été modifié!'); // Corrected the flash message

        return redirect()->route('sections.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        session()->flash('flash.banner', 'La section a été détruite!');

        return redirect()->route('sections.index');
        // return Inertia::render('Sections/Delete', [
        //     'section' => $section,
        // ]);
        // return redirect()->route('sections.index');
    }

    public function deletetest(Section $section)
    {
        // $section->delete();
        // session()->flash('flash.banner', 'La section a été détruite!');

        // return redirect()->route('sections.index');
        return Inertia::render('Sections/Delete', [
            'section' => $section,
        ]);
    }
}
