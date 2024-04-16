function getDistrict(id) {
    var division_track_id = id;
    if (division_track_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/getDistrict",
            dataType: 'json',
            data: {
                division_track_id: division_track_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select onchange="javascript:getThana(this.value);"  class="form-control" id="district_track_id" name="district_track_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.districtList, function (key, Event) {
                        html += '<option value="' + Event.district_track_id + '">' + Event.district_name_bn + '</option>';
                    });

                    html += '</select>';
                    $("#districtDiv").html(html);
                } else {

                }
            }
        });
    }
}

function getThana(id) {
    var district_track_id = id;
    if (district_track_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/getThana",
            dataType: 'json',
            data: {
                district_track_id: district_track_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select class="form-control" id="thana_track_id" name="thana_track_id"> <option value="">নির্বাচন করুন</option> ';
                    $.each(obj.thanaList, function (key, Event) {
                        html += '<option value="' + Event.thana_track_id + '">' + Event.thana_name_bn + '</option>';
                    });
                    html += '</select>';
                    $("#thanaDiv").html(html);
                } else {

                }
            }
        });
    }
}

/*
 * Get district according to banbeis
 */
function firstBanbeisDistrict(id) {
    var banbeis_division_id = id;
    if (banbeis_division_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getDistrict",
            dataType: 'json',
            data: {
                banbeis_division_id: banbeis_division_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select onchange="javascript:firstBanbeisThana(this.value);javascript:firstBanbeisInstitute(this.value);"  class="form-control" id="banbeis_first_district_id" name="banbeis_first_district_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.districtList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_district_id + '">' + Event.banbeis_district_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisFirstDistrict").html(html);
                } else {

                }
            }
        });
    }
}
/*
 * Get thana according to banbeis
 */
function firstBanbeisThana(id) {
    var banbeis_district_id = id;
    if (banbeis_district_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getThana",
            dataType: 'json',
            data: {
                banbeis_district_id: banbeis_district_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select onchange="javascript:firstBanbeisInstitute(this.value);"  class="form-control" id="banbeis_first_thana_id" name="banbeis_first_thana_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.thanaList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_thana_id + '">' + Event.banbeis_thana_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisFirstThana").html(html);
                } else {

                }
            }
        });
    }
}
/*
 * Get thana according to banbeis
 */
function firstBanbeisInstitute(id) {
    var banbeis_thana_id = id;
    if (banbeis_thana_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getInstitute",
            dataType: 'json',
            data: {
                banbeis_thana_id: banbeis_thana_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select class="form-control" id="banbeis_first_institute_id" name="banbeis_first_institute_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.instituteList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_id + '">' + Event.banbeis_institute_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisFirstInstitute").html(html);
                } else {

                }
            }
        });
    }
}
/*
 * Get district according to banbeis
 */
function secondBanbeisDistrict(id) {
    var banbeis_division_id = id;
    if (banbeis_division_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getDistrict",
            dataType: 'json',
            data: {
                banbeis_division_id: banbeis_division_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select onchange="javascript:secondBanbeisThana(this.value);javascript:secondBanbeisInstitute(this.value);"  class="form-control" id="banbeis_second_district_id" name="banbeis_second_district_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.districtList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_district_id + '">' + Event.banbeis_district_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisSecondDistrict").html(html);
                } else {

                }
            }
        });
    }
}
/*
 * Get thana according to banbeis
 */
function secondBanbeisThana(id) {
    var banbeis_district_id = id;
    if (banbeis_district_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getThana",
            dataType: 'json',
            data: {
                banbeis_district_id: banbeis_district_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select onchange="javascript:secondBanbeisInstitute(this.value);"  class="form-control" id="banbeis_second_thana_id" name="banbeis_second_thana_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.thanaList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_thana_id + '">' + Event.banbeis_thana_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisSecondThana").html(html);
                } else {

                }
            }
        });
    }
}
/*
 * Get thana according to banbeis
 */
function secondBanbeisInstitute(id) {
    var banbeis_thana_id = id;
    if (banbeis_thana_id !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/banbeis/getInstitute",
            dataType: 'json',
            data: {
                banbeis_thana_id: banbeis_thana_id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var html = '<select class="form-control" id="banbeis_second_institute_id" name="banbeis_second_institute_id"><option value="">নির্বাচন করুন</option>';
                    $.each(obj.instituteList, function (key, Event) {
                        html += '<option value="' + Event.banbeis_id + '">' + Event.banbeis_institute_name + '</option>';
                    });

                    html += '</select>';
                    $("#banbeisSecondInstitute").html(html);
                } else {

                }
            }
        });
    }
}

$(document).ready(function () {
    $("button[type='submit'], input[type='submit']").on("click", function () {
        //$(this).attr("type", "button");
        $(this).attr("disabled", "true").off("click");
        $(this).parents("form").submit();
    });
});