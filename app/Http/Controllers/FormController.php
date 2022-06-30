<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        if (!Gate::allows('manager-page')) {
            return view('form');
        }else{
            return redirect()->route('manager.index');
        }
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        Application::create($data);
        return "Отправлено!";
    }
}
