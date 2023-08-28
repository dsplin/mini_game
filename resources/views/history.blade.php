@extends('layout')

@section('title', 'Game History')

@section('content')
<div class="container mt-5">
    <h1>Game History</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Random Number</th>
            <th>Result</th>
            <th>Win Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($gameHistory as $gameResult)
        <tr>
            <td>{{ $gameResult->random_number }}</td>
            <td>{{ $gameResult->result }}</td>
            <td>{{ $gameResult->win_amount }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <form action="{{ route('page.a', ['link' => $link]) }}" method="get">
        <button type="submit" class="btn btn-secondary">Back to Page A</button>
    </form>
</div>
@endsection
