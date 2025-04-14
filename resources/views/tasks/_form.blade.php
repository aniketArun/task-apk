@csrf

<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $task->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $task->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
        @foreach(['Pending', 'In Progress', 'Completed'] as $status)
        <option value="{{ $status }}" {{ (old('status', $task->status ?? '') === $status) ? 'selected' : '' }}>
            {{ $status }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="priority" class="form-label">Priority</label>
    <select name="priority" class="form-select" required>
        @foreach(['Low', 'Medium', 'High'] as $priority)
        <option value="{{ $priority }}" {{ (old('priority', $task->priority ?? '') === $priority) ? 'selected' : '' }}>
            {{ $priority }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="due_date" class="form-label">Due Date</label>
    // In your edit view
    <input type="date" name="due_date" value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">

</div>

<div class="mb-3">
    <label for="assigned_to" class="form-label">Assigned To</label>
    <input type="text" name="assigned_to" class="form-control" value="{{ old('assigned_to', $task->assigned_to ?? '') }}">
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
<a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>