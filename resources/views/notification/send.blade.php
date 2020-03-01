@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">User Booking</div>

                <div class="card-body">

                    <form action="{{url('send-msg')}}" method="POST">

                        @csrf

                        <div class="form-group ">
                            <label for="">Username</label>
                            <input type="hidden" name="donor_id" value="{{$user->id}}">
                            <input type="text" class="form-control" name="user_name" value="{{$user->name}}" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="">Message</label>
                            <textarea name="message" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="">Message</label>
                            <input type="date" class="form-control" name="booking_date">
                        </div>


                        <button type="submit" class="btn btn-dark w-100">Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection