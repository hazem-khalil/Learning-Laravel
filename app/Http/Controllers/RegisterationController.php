<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterationForm;



class RegisterationController extends Controller
{
    public function create()
    {
    	return view('registeration.create');
    }

    public function store(RegisterationForm $request)
    {
        $request->persist();

        session()->flash('message', 'Thanks for Signning up!');

    	return redirect()->home();
    }

}
