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

                    <form id="sample_form" action="{{route('task.store')}}" method="post">
                        @csrf   
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Title</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">   <!--  -->
                                    <input type="text" name="title" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Assign to</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="employee_id" class="form-control" >
                                        @foreach ($user as $u)
                                        <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>     
                                        @endforeach
                                       
                                    </select>
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
