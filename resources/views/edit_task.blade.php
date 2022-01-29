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

                    <form id="sample_form" action="{{route('task.update',$task->id)}}" method="post">
                        @csrf 
                        <input type="hidden" name="_method" value="put">  
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Status</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">   
                                    <select name="completed" class="form-control" >
                                        <option value="0" {{ $task->completed ? '' : 'selected' }}>Incomplete</option>     
                                        <option value="1" {{ $task->completed ? 'selected' : '' }}>Complete</option>     
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Feedback</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                   <input type="text" name="feedback" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
