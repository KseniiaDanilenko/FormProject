<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Str;


class FormController extends Controller
{
    //
    public function index()
    {
        return view('welcome');

    }

    public function createUser(CreateUserRequest $request)
    {
       
        $validated = $request->validated(); 
        if (!$validated) {
            $errors = $validated->errors();
        }       
            if (User::userExists([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname']
        ])) {
            return redirect('/')->withErrors(['error' => __('errorMessages.userExist')]);
        } else {
            User::createUser([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'description' => $validated['description']
            ]);
    
            return redirect('/')->with('success', __('successMessages.createUser.success'));       
        }
    }
}
