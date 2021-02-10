@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{$jobOp->name}}</div>

                <div class="card-body">                  
                    <div class="container">
                    <h2>Details....</h2>            
                    <table class="table table borderless">
                        <thead>
                        <tr>
                            
                            <th>Position</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                      
                        <tr>
                            
                            <td>{{ $jobOp->name }}</td>
                            
                            
                            @if(!is_null($allredyApply))
                            <td>
                                <form id="edit" action="{{ url('/applicant/edit/' . $allredyApply->apply_id) }}" method="POST" class="form-inline">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <input type="submit" value="Edit" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                </form>
                            </td> <td>
                                <form id="apply" action="{{ url('/application/delete/' . $allredyApply->apply_id) }}" method="POST" class="form-inline">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xl pull-right check-apply btn-block">
                                </form>
                            </td>  
                            @else   
                            <td>
                                <form id="apply" action="{{ url('/application/job/'. $jobOp->id) }}" method="POST" class="form-inline">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <input type="submit" value="Apply" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                </form>
                            </td>  
                            <td></td>
                            @endif                       
                        </tr>
                       
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
