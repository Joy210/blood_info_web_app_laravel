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
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{$user->name}}">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">E-mail</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{$user->email}}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Mobile No.</label>
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                    name="mobile_no" value="{{$user->mobile_no}}">
                                @error('mobile_no')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Blood Group</label>
                                {{-- <input type="text" class="form-control @error('blood_group') is-invalid @enderror"
                                    name="blood_group" value="{{$user->blood_group}}">
                                @error('blood_group')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                                <select name="blood_group" id="blood_group"
                                    class="custom-select @error('blood_group') is-invalid @enderror">
                                    <option value="0">Select Blood Group</option>
                                    @foreach($blood_groups as $blood)
                                    <option value="{{$blood->id}}" {{($blood->id == $user->blood_group)?"selected":""}}>
                                        {{$blood->blood_name}}
                                    </option>
                                    @endforeach
                                    {{-- <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option> --}}
                                </select>
                                @error('blood_group')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">User Image</label>
                                <input type="hidden" class="form-control" name="hidden_image" value="{{$user->image}}">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Division</label>
                                <select name="division" class="custom-select @error('divisions') is-invalid @enderror"
                                    id="divisions">
                                    <option value=""> Select Division </option>
                                    @foreach($divisions as $div)
                                    <option value="{{$div->id}}" {{($div->id == $user->division)?"selected":""}}>
                                        {{$div->division_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('divisions')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">District</label>
                                <select name="district" class="custom-select @error('districts') is-invalid @enderror"
                                    id="districts">
                                    <option value=""> Select District </option>
                                    @foreach($districts as $dist)
                                    <option value="{{$dist->id}}" {{($dist->id == $user->district)?"selected":""}}>
                                        {{$dist->district_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('districts')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Upazila</label>
                                <select name="upazila" class="custom-select @error('upazilas') is-invalid @enderror"
                                    id="upazilas">
                                    <option value=""> Select Upazila </option>
                                    @foreach($upazilas as $upa)
                                    <option value="{{$upa->id}}" {{($upa->id == $user->upazila)?"selected":""}}>
                                        {{$upa->upazila_name_eng}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('upazilas')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
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