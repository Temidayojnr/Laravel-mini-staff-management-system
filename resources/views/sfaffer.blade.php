@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Staff</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

   <!--staff form--> 
                    <center>
                            <div class="container">
                                <div class="col-md-5">
                                    <div class="form-area pull-center">  
                                        <form role="form" method="post" action="{{ route('views.update', $staff->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <br style="clear:both">
                                                    <h3 style="margin-bottom: 25px; text-align: center;">Staff Details</h3>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="name" placeholder="Full Name" value="{{$staff->name}}">
                                                        @if ($errors->has('name'))
                                                            <strong style="color:red">{{$errors->first('name')}}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$staff->phone}}">
                                                        @if ($errors->has('phone'))
                                                            <strong style="color:red">{{$errors->first('phone')}}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{$staff->address}}">
                                                        @if ($errors->has('address'))
                                                            <strong style="color:red">{{$errors->first('address')}}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="job" placeholder="Job Description" value="{{$staff->job}}">
                                                        @if ($errors->has('job'))
                                                            <strong style="color:red">{{$errors->first('job')}}</strong>
                                                        @endif
                                                    </div>
                                                    
                                                <!--Gender-->
                                                    <div class="form-group pull-left">
                                                    <label for="formGroupExampleInput"><strong>Gender</strong></label>
                                                        <label class="radio-inline"><input type="radio" name="gender" value="{{$staff->gender}}">Male</label>
                                                        <label class="radio-inline"><input type="radio" name="gender" value="{{$staff->gender}}">Female</label>
                                                    </div> 
                                                    @if ($errors->has('gender'))
                                                            <strong style="color:red">{{$errors->first('gender')}}</strong>
                                                        @endif
                                                    <br>
                                            <button type="submit" class="btn btn-primary">Update Staff</button>
                                            <a class="btn btn-danger" href="{{ route('ender', $staff->id) }}">Delete Staff</a>
                                        </form>
                                </div>
                            </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
