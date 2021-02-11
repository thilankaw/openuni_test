@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available Career Opurtunities</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('messageD'))
                        <div class="alert alert-danger">
                            {{ session()->get('messageD') }}
                        </div>
                    @endif

                     
                    <div class="form-group row">
                    
                    </div>
                    <table class="table table borderless">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Position</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jobOp as $key => $job)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $job->name }}</td>
                                <td></td>
                                <td>
                                    <form id="apply" action="{{ url('view/' . $job->id) }}" method="POST" class="form-inline">
                                        
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="submit" value="Details" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                    </form>
                                </td>   
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

