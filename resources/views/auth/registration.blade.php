@extends('layout')

@section('title', 'Registration')

@section('content')
<div class="container mt-5">
    <h1>Registration Form</h1>

    @if (session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Enter account phone (+380)" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    @if(session('uniqueLink'))
    <p class="mt-3">Here is your unique link:
        <a href="{{ route('page.a', ['link' => session('uniqueLink')]) }}" >
            {{ route('page.a', ['link' => session('uniqueLink')]) }}
        </a>
    </p>
    @endif

</div>
@endsection
