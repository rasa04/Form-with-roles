<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(){
        if (!Gate::allows('manager-page')) {

            $last_time = Application::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first()->created_at->timestamp;
            $current_time = Carbon::now()->timestamp;
            if((int)$current_time-(int)$last_time < 86400) { return "Вы не давно уже отправляли заявку!";}
            else { return view('form');}
        }else{
            return redirect()->route('manager.index');
        }
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        $data['file'] = $request->file = $request->file('file')->store('files', 'public');
        Application::create($data);
        
        return "Отправлено!";
    }
}
