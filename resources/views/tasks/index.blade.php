@extends('layouts.app')

@section('content')
<h2 class="mb-4">Task Manager</h2>

<!-- Alerts -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Filters -->
<form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">-- Filter by Status --</option>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="priority" class="form-select">
            <option value="">-- Filter by Priority --</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>
    <div class="col-md-2">
        <input type="checkbox" name="overdue" id="overdue" class="form-check-input" {{ request('overdue') ? 'checked' : '' }}>
        <label for="overdue" class="form-check-label">Overdue Only</label>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Apply</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">+ New Task</a>

<!-- Task Table -->
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Assigned To</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            @php
                $rowColor = match($task->priority) {
                    'High' => 'table-danger',
                    'Medium' => 'table-warning',
                    'Low' => 'table-success',
                    default => '',
                };

                $isOverdue = $task->due_date < now()->toDateString() && in_array($task->status, ['Pending', 'In Progress']);
            @endphp
            <tr class="{{ $rowColor }}">
                <td>
                    {{ $task->title }} <br>
                    @if($isOverdue)
                        <span class="badge bg-danger">Overdue - Needs Attention!</span>
                    @endif
                </td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</td>
                <td>{{ $task->assigned_to ?? '-' }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">No tasks found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
