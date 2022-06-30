@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{ __('You are logged in!') }}
        </div>
        <form action="{{ route('form.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Topic" name="topic">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="status" value="0">
            <textarea name="message" id="message" placeholder="message"></textarea>
            <input type="file" name="file" id="file">
            <button type="submit">SEND</button>

            {{ $errors }}
        </form>
    </div>
@endsection
