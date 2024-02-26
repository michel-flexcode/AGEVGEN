<?php

// namespace App\Http\Controllers;

// use Illuminate\View\View;
// use Illuminate\Http\Response;
// use App\Http\Requests\ContactRequest;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\Contact;

// class ContactController extends Controller
// {
//     public function create(): View
//     {
//         return view('contact');
//     }

//     public function store(ContactRequest $request): view
//     {
//         Mail::to('administrateur@chezmoi.com')
//             ->send(new Contact($request->except('_token')));

//         return view('confirm');
//     }
//}

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact');
    }

    public function store(Request $request): View
    {
        $this->validate($request, [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'
        ]);

        return view('confirm');
    }
}
