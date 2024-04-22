<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FormController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function createUser(CreateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated(); 
        if (!$validated) {
            $errors = $validated->errors();
        }       
        if (User::userExists([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname']
        ])) {
            return redirect('/')->withErrors(['error' => ('errorMessages.userExist')]);
        } else {
            User::createUser([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'description' => $validated['description']
            ]);
    
            return redirect('/')->with('success', ('successMessages.createUser.success'));
        }
    }
}
