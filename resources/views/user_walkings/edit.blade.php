@extends('layouts.app')

@section('content')
<h2>Edit User Walking Record</h2>

<form method="POST" action="{{ route('user-walkings.update', $walking->id) }}">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->

    <label>User ID:</label>
    <input type="number" name="user_id" value="{{ $walking->user_id }}" required>

    <label>Date (YYYY-MM-DD):</label>
    <input type="date" name="walking_on" value="{{ $walking->walking_on }}" required>

    <label>Step Count:</label>
    <input type="number" name="step_cnt" value="{{ $walking->step_cnt }}" required>

    <button type="submit">Update</button>
    <a href="{{ route('user-walkings.index') }}">Cancel</a>
</form>
@endsection
