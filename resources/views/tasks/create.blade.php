@extends('layouts.app')

@section('content')
<h2>Create Task</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @include('tasks._form', ['buttonText' => 'Create Task'])
</form>
@endsection
