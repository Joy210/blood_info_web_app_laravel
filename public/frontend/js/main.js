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
