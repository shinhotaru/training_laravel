@extends('layouts.app')

@section('content')
<h2>New User Walking Record</h2>

<form method="POST" action="{{ route('user-walkings.store') }}">
    @csrf
    <label>User ID:</label>
    <input type="number" name="user_id" required>

    <label>Date (YYYY-MM-DD):</label>
    <input type="date" name="walking_on" required>

    <label>Step Count:</label>
    <input type="number" name="step_cnt" required>

    <button type="submit">Save</button>
    <a href="{{ route('user-walkings.index') }}">Cancel</a>
</form>
@endsection
