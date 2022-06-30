@extends('layouts.app')

@section('content')
    <div id="nav">
        <div>{{ __('Dashboard') }}</div>
        <div>
            @if (session('status'))
                <div role="alert"> {{ session('status') }} </div>
            @endif
            {{ __('You are logged in!') }}
        </div>
        <div class="manager">Manager, welcome!</div>
    </div>
    <div id="applications">
        @foreach ($applications as $application)
        <hr>
            {{ $application->id }}
            {{ $application->topic }}
            {{ $application->message }}
            <a href="{{ asset( '/storage/' . $application->file) }}">open</a>
            {{ $application->user->name }}
            {{ $application->user->email }}
            <form action="{{ route('manager.update', $application->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="{{ $application->status }}">
                <input type="submit"
                    @if ($application->status == 0)
                        value="Не отвечено"
                    @else
                        value="Отвечено"
                    @endif
                >
            </form>
        @endforeach
    </div>
@endsection
