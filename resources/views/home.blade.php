@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <select name="divisions" id="divisions" class="custom-select">
                        <option value="">Select Division</option>

                        @foreach ($divisions as $division)
                        <option value="{{$division->id}}">{{$division->division_name_eng}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-3">
                    <select name="districts" id="districts" class="custom-select" disabled>
                        <option value="">Select Division</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="upazilas" id="upazilas" class="custom-select" disabled>
                        <option value="">Select Division</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="blood_group" id="blood_group" class="custom-select">
                        <option value="0">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row" id="users-info"></div>
            {{-- Show Users Informations... --}}
        </div>
    </div>
</div>
@endsection

@push('javascripts')





<script>
    $(document).ready(function(){

        $('#blood_group').on('change', function(e){
            const blood = $(this).val();
            // console.log(blood);

            $.ajax({
                url: '/fetch-users/',
                type: 'GET',
                dataType: 'JSON',
                success: function(data){

                    // console.log(data.blood_group);

                    var blood_group = '';
                    
                    data.forEach(user => {
                        
                        if(user.blood_group == blood){
                            console.log(user.blood_group);
                            
                            blood_group += `
                                <div class="col-4">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">Name:</span> ${user.name}
                                        </li>
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">Mobile No.:</span> ${user.mobile_no}
                                        </li>
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">E-mail:</span> ${user.email}
                                        </li>
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">Blood Group:</span> ${user.division}
                                        </li>
                                        <li class="list-group-item">
                                            <a class="btn btn-primary btn-sm w-100" href="" id="${user.id}">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            `;
                        }
                    });
                    $('#users-info').html(blood_group);

                    blood_group = '';
                },
                error: function(){
                    alert("User Not Found!")
                }
            })

        });


        // get users by divisions
        $('#divisions').on('change', function() {

            const division_id = $(this).val();
            console.log(division_id);

            const fetch_url = '/find-user-by-division/';
            callback(fetch_url, division_id);

            $('#districts').removeAttr('disabled');

        });

        // get users by divisions
        $('#districts').on('change', function() {

            const district_id = $(this).val();
            console.log(district_id);

            const fetch_url = '/find-user-by-district/';
            callback(fetch_url, district_id);

            $('#upazilas').removeAttr('disabled');

        });

        // get users by divisions
        $('#upazilas').on('change', function() {

            const upazila_id = $(this).val();
            console.log(upazila_id);

            const fetch_url = '/find-user-by-upazila/';

            callback(fetch_url, upazila_id);
        });


        // callback function
        function callback(URL, ID) {
            $.ajax({
                url: URL + ID,
                type: 'GET',
                dataType: 'JSON',
                success: function(data){
                    console.log(data)

                    var output = '';
                    output = data.map(user => {
                        return `
                            <div class="col-4">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="font-weight-bold">Name:</span> ${user.name}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="font-weight-bold">Mobile No.:</span> ${user.mobile_no}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="font-weight-bold">E-mail:</span> ${user.email}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="font-weight-bold">Blood Group:</span> ${user.blood_group}
                                    </li>
                                    <li class="list-group-item">
                                        <a class="btn btn-primary btn-sm w-100" href="" id="${user.id}">Book Now</a>
                                    </li>
                                </ul>
                            </div> 
                        `;
                    });
                    $('#users-info').html(output);
                },
                error: function(){
                    alert("Could not find any uses!");
                }
            
            })
        }
    });
</script>
@endpush