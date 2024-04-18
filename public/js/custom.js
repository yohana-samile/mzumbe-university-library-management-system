jQuery.noConflict();
(function ($) {
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
                            window.location.href = "book/index";
                        }
                    });
                    $("#register_book_action")[0].reset();
                },
                error: function () {
                // error: function(xhr, status, error) {
                    swal.fire("error", "something went wrong, try again");
                    // console.log("XHR status: " + status);
                    // console.log("Error message: " + error);
                    // console.log("Server response: " + xhr.responseText);
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
                            window.location.href = "book/genre";
                        }
                    });
                    $("#register_book_genre_action")[0].reset();
                },
                error: function () {
                // error: function(xhr, status, error) {
                    swal.fire("error", "something went wrong, try again");
                    // console.log("XHR status: " + status);
                    // console.log("Error message: " + error);
                    // console.log("Server response: " + xhr.responseText);
                }
            });
        });
    });
});
