@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <select name="divisions" id="divisions" class="custom-select">
                        <option value="">Select Division</option>

                        @foreach ($divisions as $division)
                        <option value="{{$division->id}}">{{$division->division_name_eng}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-4">
                    <select name="districts" id="districts" class="custom-select">
                        <option value="">Select Division</option>
                    </select>
                </div>
                <div class="col-4">
                    <select name="upazilas" id="upazilas" class="custom-select">
                        <option value="">Select Division</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row" id="users-info"></div>
            Show Users Informations...
        </div>
    </div>
</div>
@endsection

@push('javascripts')
<script>
    // GET DISTRICTS
    $(document).ready(function() {
        $("#divisions").on("change", function() {
            var division_id = $(this).val();
            console.log(division_id);

            $.ajax({
                url: "/find-user-by-district-or-upazila/" + division_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);

                    var output = "";

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
                                        <span class="font-weight-bold">Division:</span> ${user.division_name_eng}
                                    </li>
                                </ul>
                            </div>    
                        `;
                    });

                    $("#users-info").html(output);

                    output = '';

                },
                error: function() {
                    alert("Data Not Found!");
                }
            });
        });
    });
</script>
@endpush