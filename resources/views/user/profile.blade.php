@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <a href="{{url('profile/edit').'/'.Auth::user()->id}}" class="btn btn-primary btn-sm float-right">
                        Edit
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('uploads/avatar').'/'.$user->image}}" alt="" class="card-img top">


                        </div>
                        <div class="col-8">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Name:</span> {{$user->name}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Mobile No.:</span> {{$user->mobile_no}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">E-mail:</span> {{$user->email}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Blood Group:</span> {{$user->blood_group}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Division:</span> {{$user->division_name_eng}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">District:</span> {{$user->district_name_eng}}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Upazila:</span> {{$user->upazila_name_eng}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card notification">
                <div class="card-header">
                    <h4 class="mb-0">Notifications</h4>
                </div>
                <div class="card-body p-0">
                    <ul class="">
                        @foreach ($notifications as $item)
                        <li class="">
                            <a class="d-block " href="{{url('show-msg').'/'.$item->id}}" data-toggle="tooltip"
                                data-placement="top" title="{{$item->message}}">
                                {{Str::limit($item->message, 40)}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('javascripts')


@endpush