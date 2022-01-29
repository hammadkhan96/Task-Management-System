@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->role)
                    <a href="{{ route('task.create') }}" class="btn btn-primary">Create Task</a>
                @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Assign To</th>
                                <th>Feedback</th>
                                <th>Status</th>
                                @if (!auth()->user()->role)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if($task)
                            @foreach($task as $t)
                            <tr>
                                <td>{{ $t['title'] }}</td>
                                <td>{{ $t['name'] }}</td>
                                <td>{{ $t['feedback'] }}</td>
                                <td>{{ $t['completed'] ? 'Completed' : 'Incompleted' }}</td>
                                @if (!auth()->user()->role)
                                <th><a href="{{ route('task.edit',$t['id']) }}" class="btn btn-primary">Edit</a></th>
                            @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
