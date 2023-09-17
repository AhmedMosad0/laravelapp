<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index()
    {
        if(auth()->user()->username != 'ahmed123'){
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('applications', [
            'applications' => Application::latest()->with('position', 'user')->get()
        ]);
    }


    public function create()
    {

        if (auth()->guest() || auth()->user()?->username == 'ahmed123') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('application.create');
    }

    public function show(Application $application)
    {

        if(auth()->user()?->username != 'ahmed123'){
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('application', [
            'application' => $application
        ]);
    }

    public function store(){
       $attributes =  request()->validate([
            'cover_letter' => 'required',
            'Cv' => ['required', 'image'],
            'position_id' => ['required' , Rule::exists('positions' , 'id')]
       ]);

       $attributes['user_id'] = auth() -> id();

       $attributes['Cv'] = request() -> file('Cv') -> store('Cvs');

       Application::create($attributes);
       return redirect('/dashboard');
    }
}
