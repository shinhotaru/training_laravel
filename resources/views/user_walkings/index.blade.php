@extends('layouts.app')

@section('content')
<h2>User Walkings</h2>

<form method="GET" action="{{ route('user-walkings.index') }}">
    <input type="text" name="user_id" placeholder="Filter by User ID" value="{{ request('user_id') }}">
    <button type="submit">Filter</button>
    <a href="{{ route('user-walkings.create') }}">+ New Record</a>
</form>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Date</th>
            <th>Steps</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($walkings as $walk)
            <tr>
                <td>{{ $walk->id }}</td>
                <td>{{ $walk->user_id }}</td>
                <td>{{ $walk->walking_on }}</td>
                <td>{{ $walk->step_cnt }}</td>
                <td>
                    <a href="{{ route('user-walkings.edit', $walk->id) }}">Edit</a>
                    <form action="{{ route('user-walkings.destroy', $walk->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this record?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $walkings->links() }}
@endsection

