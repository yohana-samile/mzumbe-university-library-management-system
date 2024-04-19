$(document).ready(function () {
    var today = new Date();
    var nextTwoDays = new Date(today);
    nextTwoDays.setDate(today.getDate() + 2);
    var formattedDate = nextTwoDays.toISOString().slice(0, 10);
    document.getElementById("toBeReturnedOn").value = formattedDate;
});

$(document).ready(function () {
    $('#register_book_action').on('submit', function (e) {
        e.preventDefault();
        var url = "register_book_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Book Registered Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/book/index";
                    }
                });
                $("#register_book_action")[0].reset();
            },
            // error: function(xhr, status, error) {
            // console.log("XHR status: " + status);
            // console.log("Error message: " + error);
            // console.log("Server response: " + xhr.responseText);
            // }
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // register_book_genre_action
    $('#register_book_genre_action').on('submit', function (e) {
        e.preventDefault();
        var url = "/book/register_book_genre_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Book Genre Added Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/book/genre";
                    }
                });
                $("#register_book_genre_action")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // update_book_detail
    $('#update_book_detail').on('submit', function (e) {
        e.preventDefault();
        var url = "/book/update_book_detail";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Book Details Updated Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/book/index";
                    }
                });
                $("#update_book_detail")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // borrow_this_book
    $('#borrow_this_book').on('submit', function (e) {
        e.preventDefault();
        var url = "/book/borrow_this_book";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Book Borrowed Successfully, Return It Before Two Days From Now").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/book/index";
                    }
                });
                $("#borrow_this_book")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // return_this_book
    $('#return_this_book').on('submit', function (e) {
        e.preventDefault();
        var url = "/book/return_this_book";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Book Returned Successfully, Thank Your Trust").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/book/book_issued";
                    }
                });
                $("#return_this_book")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // add_fine_to_this_student
    $('#add_fine_to_this_student').on('submit', function (e) {
        e.preventDefault();
        var url = "/book/view_fine_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Fine Added").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "view_fine";
                    }
                });
                $("#add_fine_to_this_student")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // pay_my_fine
    $('#pay_my_fine').on('submit', function (e) {
        e.preventDefault();
        var url = "pay_my_fine";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Fine Paid Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "view_fine";
                    }
                });
                $("#pay_my_fine")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // add_service
    $('#add_service_action').on('submit', function (e) {
        e.preventDefault();
        var url = "/services/add_service_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Service Added Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/services/index";
                    }
                });
                $("#add_service_action")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // delete_service
    $('#delete_service').on('submit', function (e) {
        e.preventDefault();
        var url = "/services/delete_service";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Service Deleted Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/services/index";
                    }
                });
                $("#delete_service")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // add_service
    $('#add_event_action').on('submit', function (e) {
        e.preventDefault();
        var url = "/events/add_event_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Event Added Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/events/index";
                    }
                });
                $("#add_event_action")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // delete_event
    $('#delete_event_or_announcement').on('submit', function (e) {
        e.preventDefault();
        var url = "/events/delete_event";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Event Or Announcements Deleted Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/events/index";
                    }
                });
                $("#delete_event_or_announcement")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });
});
