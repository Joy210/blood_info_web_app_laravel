// GET DISTRICTS
$(document).ready(function() {
    $("#divisions").on("change", function() {
        var division_id = $(this).val();
        // console.log(division_id);

        $.ajax({
            url: "/get-district/" + division_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);

                var output = "";

                output = data.map(district => {
                    return `<option value="${district.id}"> ${district.district_name_eng} </option>`;
                });

                $("#districts").html(output);

                // output = '';

                // console.log(output);
            },
            error: function() {
                alert("Data Not Found!");
            }
        });
    });
});
// GET DISTRICTS

// GET UPAZILAS
$(document).ready(function() {
    $("#districts").on("change", function() {
        var district_id = $(this).val();
        // console.log(district_id);

        $.ajax({
            url: "/get-upazila/" + district_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);

                var output = "";

                output = data.map(upazila => {
                    return `<option value="${upazila.id}"> ${upazila.upazila_name_eng} </option>`;
                });

                $("#upazilas").html(output);

                // console.log(output);
            },
            error: function() {
                alert("Data Not Found!");
            }
        });
    });
});
// GET UPAZILAS

// FETCH USER DATA
$(document).ready(function() {
    $.ajax({
        url: "/fetch-users/",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            console.log(data);

            var output = "";
            output = data.map(user => {
                return `
                        <div class="col-4 mb-4">
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
                                <li class="list-group-item">
                                    <a class="btn btn-primary btn-sm w-100" href="" id="${user.id}">Book Now</a>
                                </li>
                            </ul>
                        </div> 
                    `;
            });
            $("#users-info").html(output);
        },
        error: function() {
            alert("Could not find any users!");
        }
    });
});
// FETCH USER DATA
