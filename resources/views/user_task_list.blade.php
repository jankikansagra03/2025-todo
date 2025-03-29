@extends('layouts.Guest')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <header class="hero">
                    <h1>
                        Task List
                    </h1>

                </header>


                {{-- Display Tasks in a Responsive Table --}}
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                        <h4 class="text-white">All Tasks</h4>
                    </div>
                    <div class="card-body">
                        @if ($task_result)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.NO</th>
                                            <th>Task Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task_result as $index => $task)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $task->task_name }}</td>
                                                <td>{{ $task->task_description }}</td>
                                                <td>
                                                    @if ($task->status == 'Pending')
                                                        <span class="badge bg-danger">{{ $task->status }}</span>
                                                    @else
                                                        <span class="badge bg-success">{{ $task->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $task->deadline }}</td>
                                                <td>
                                                    <a href="{{ URL::to('/') }}/userEditTask/{{ $task->id }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/') }}/userDeleteTask/{{ $task->id }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    @if ($task->status == 'Pending')
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ URL::to('/') }}/userMarkAsCompleted/{{ $task->id }}">Mark
                                                            as Complete
                                                        </a>
                                                    @else
                                                        <a class="btn btn-warning btn-sm"
                                                            href="{{ URL::to('/') }}/userMarkAsPending/{{ $task->id }}">Mark
                                                            as Pending
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
