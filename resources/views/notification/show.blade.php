@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Notification</h4>
                </div>
                <div class="card-body">
                    <small class="text-primary"> {{ $message->booking_date }}</small>
                    <p>{{ $message->message }}</p>

                    <div class="buttons d-flex justify-content-end">
                        <a href="{{url('profile')}}" class="btn btn-warning btn-sm mr-2"> Back </a>

                        <form action="{{url('confirm-booking').'/'.$message->id}}" method="POST">
                            @csrf

                            @if ($message->status == 0)
                            <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                            @else
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection