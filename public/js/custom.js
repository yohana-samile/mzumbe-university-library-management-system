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
                        window.location.href = "/view_fine";
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
                        window.location.href = "/view_fine";
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


    // workingTime or working hours
    $('#add_workingTime_action').on('submit', function (e) {
        e.preventDefault();
        var url = "/workingTime/add_workingTime_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Working Time Scheduled Kept Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/workingTime/index";
                    }
                });
                $("#add_workingTime_action")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // units
    $('#register_unit').on('submit', function (e) {
        e.preventDefault();
        var url = "/units/register_unit";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Unit Registered Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/units/studentUnit";
                    }
                });
                $("#register_unit")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });

    // register_Programme
    $('#register_Programme').on('submit', function (e) {
        e.preventDefault();
        var url = "/units/register_Programme";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Programme Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/units/programme";
                    }
                });
                $("#register_Programme")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // register_student
    $('#register_student').on('submit', function (e) {
        e.preventDefault();
        var url = "/users/register_student_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Student Registered Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/users/student";
                    }
                });
                $("#register_student")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    // register_librarian
    $('#register_librarian').on('submit', function (e) {
        e.preventDefault();
        var url = "/users/register_librarian_action";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Librarian Registered Successfully").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "/users/staff";
                    }
                });
                $("#register_librarian")[0].reset();
            },
            error: function () {
                swal.fire("error", "something went wrong, try again");
            }
        });
    });


    //log_me_in
    $('#log_me_in').on('submit', function (e) {
        e.preventDefault();
        var url = "log_me_in";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Login Successfully, GET OPEN ENJOY LIBRARY SERVICES").then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "home";
                    }
                });
                $("#log_me_in")[0].reset();
            },
            error: function () {
                swal.fire("error", "Wrong Username Or Password. try again");
            }
        });
    });


    // log_me_out
    $('#log_me_out').on('submit', function (e) {
        e.preventDefault();
        var url = "log_me_out";
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                window.location.href = "/login";
                $("#log_me_out")[0].reset();
            },
            error: function () {
                swal.fire("error", "Error In Logout. try again");
            }
        });
    });
}); //end of our project developed by developer samile 0620350083

// this generate pie chart
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: jsonData.labels,
            datasets: [{
                data: jsonData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Library Usage by Unit'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
});
