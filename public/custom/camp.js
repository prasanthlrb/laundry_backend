function createCamp() {
    var campData = new FormData($('#campForm')[0]);
    $.ajax({
        url: '/camp-save',
        type: "POST",
        data: campData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
            toastr.success(data, 'Campaign');
            window.location.href = "/camp-management";
            //console.log(data)
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function (i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}
function updateCamp() {
    var campData = new FormData($('#campForm')[0]);
    $.ajax({
        url: '/camp-update',
        type: "POST",
        data: campData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
            toastr.success(data, 'Campaign');
            window.location.href = "/camp-management";
            //console.log(data)
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function (i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

