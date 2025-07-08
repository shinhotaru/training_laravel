@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Walking Details</h1>

        <ul>
            <li><strong>ID:</strong> {{ $walking->id }}</li>
            <li><strong>User ID:</strong> {{ $walking->user_id }}</li>
            <li><strong>Walking On:</strong> {{ $walking->walking_on }}</li>
            <li><strong>Step Count:</strong> {{ $walking->step_cnt }}</li>
            <li><strong>Created At:</strong> {{ $walking->created_at }}</li>
        </ul>

        <a href="{{ route('user-walkings.index') }}">← Back to List</a>
    </div>
@endsection
