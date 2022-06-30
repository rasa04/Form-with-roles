<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        return view('form');
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        Application::create($data);
        return "Отправлено!";
    }
}
