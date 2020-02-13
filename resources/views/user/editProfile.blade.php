@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">

                    <form action="{{url('profile/update').'/'.$user->id}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small> --}}
                            </div>
                            <div class="col-6">
                                <label for="">E-mail</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Mobile No.</label>
                                <input type="text" class="form-control" name="mobile_no" value="{{$user->mobile_no}}">
                            </div>
                            <div class="col-6">
                                <label for="">Blood Group</label>
                                <input type="text" class="form-control" name="blood_group"
                                    value="{{$user->blood_group}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Blood Group</label>
                                <input type="hidden" class="form-control" name="hidden_image" value="{{$user->image}}">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-6">
                                <label for="">Division</label>
                                <select name="division" class="custom-select" id="divisions">
                                    <option value=""> Select Division </option>
                                    @foreach($divisions as $div)
                                    <option value="{{$div->id}}" {{($div->id == $user->division)?"selected":""}}>
                                        {{$div->division_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">District</label>
                                <select name="district" class="custom-select" id="districts">
                                    <option value=""> Select District </option>
                                    @foreach($districts as $dist)
                                    <option value="{{$dist->id}}" {{($dist->id == $user->district)?"selected":""}}>
                                        {{$dist->district_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Upazila</label>
                                <select name="upazila" class="custom-select" id="upazilas">
                                    <option value=""> Select Upazila </option>
                                    @foreach($upazilas as $upa)
                                    <option value="{{$upa->id}}" {{($upa->id == $user->upazila)?"selected":""}}>
                                        {{$upa->upazila_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('javascripts')

@endpush