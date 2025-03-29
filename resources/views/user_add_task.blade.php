@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Add New Task</h1>
        <p class="lead">Access your tasks and stay organized.</p>
    </header>
    <div class="col-lg-8 offset-lg-2 p-3  " style="border:solid white;border-radius:20px;">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <form action="{{ URL::to('/') }}/userAddTask" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Task Title</label>
                        <input type="text" class="form-control @error('task_title') is-invalid @enderror"
                            placeholder="Enter task title" name="task_title">
                        @error('task_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Description</label>
                        <textarea class="form-control @error('task_description') is-invalid @enderror" placeholder="Enter task description"
                            name="task_description"></textarea>
                        @error('task_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="mb-3">
                    <label class="form-label text-white">Status</label>
                    <select class="form-control @error('task_status') is-invalid @enderror" name="task_status">
                        <option value="">Select Status</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                    @error('task_status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label
                            text-white">Due Date</label>
                    <input type="date" class="form-control @error('task_due_date') is-invalid @enderror"
                        name="task_due_date">
                    @error('task_due_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn form-control btn-custom btn-lg">Add Task</button>
            </div>

            </form>
        </div>
    </div>

    </div>
@endsection
