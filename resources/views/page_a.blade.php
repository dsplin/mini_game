@extends('layout')

@section('title', 'Page A')

@section('content')
<div class="container mt-5">
    <h1>Page A</h1>
    @if (session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    @if (session('result'))
    <div class="alert alert-info">
        <p>Random Number: {{ session('randomNumber') }}</p>
        <p>Result: {{ session('result') }}</p>
        <p>Win Amount: {{ session('winAmount') }}</p>
    </div>
    @endif

    <div class="btn-group mt-3" role="group">
        <form action="{{ route('generate.link', ['link' => $link]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success mx-2">Generate Link</button>
        </form>

        <form action="{{ route('deactivate.link', ['link' => $link]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mx-2">Deactivate Link</button>
        </form>

        <form action="{{ route('play.game', ['link' => $link]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary mx-2">Imfeelinglucky</button>
        </form>

        <form action="{{ route('game.history', ['link' => $link]) }}" method="get">
            <button type="submit" class="btn btn-secondary mx-2">History</button>
        </form>
    </div>
</div>
@endsection
