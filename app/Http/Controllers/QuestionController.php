<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //https://github.com/Code-Plank/laravel-inertia-vue3/blob/main/app/Http/Controllers/BlogController.php
    public function index(Request $request)
    {
        $questions = Question::orderBy('label', 'ASC')->paginate(8);
        // dd($courses);
        return Inertia::render('Questions/Index', [
            'questions' => $questions,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Questions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        Question::create([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'La question a été ajoutée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return Inertia::render('Questions/Edit', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        $question->update([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'La question a été modifiée!');

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash('flash.banner', 'La question a été détruite!');

        return redirect()->route('questions.index');
        // return Inertia::render('Questions/Delete', [
        //     'question' => $question,
        // ]);
        // return redirect()->route('questions.index');
    }

    public function deletetest(Question $question)
    {
        // $question->delete();
        // session()->flash('flash.banner', 'La question a été détruite!');

        // return redirect()->route('questions.index');
        return Inertia::render('Questions/Delete', [
            'question' => $question,
        ]);
    }
}
