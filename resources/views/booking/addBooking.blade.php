
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booking</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        table, th, td {
            border-collapse: collapse;
        }

        table.center {
            margin-left: auto; 
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        {{View::make('layouts.header')}}
        <h4 class="text-center">Booking CRUD</h4><br>
        <!-- <div class="card card-default"> -->
            <!-- <div class="card-body"> -->
            <table class='center' width="80%"> 
                <form id="addBooking" class="form-inline" method="POST" action="">
                    <tr><td>
                    <h5>Add Booking</h5>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="ic" class="sr-only">IC Number</label>
                        <input id="ic" type="text" class="form-control" name="ic" placeholder="IC Number" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="license" class="sr-only">License Number</label>
                        <input id="license" type="text" class="form-control" name="license" placeholder="License Number" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="address" class="sr-only">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="4" cols="50" placeholder="Address" required autofocus></textarea>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="phoneNum" class="sr-only">Phone Number</label>
                        <input id="phoneNum" type="text" class="form-control" name="phoneNum" placeholder="Phone Number" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="rentDateStart" class="sr-only">Rent Date Start</label>
                        <input id="rentDateStart" type="date" class="form-control" name="rentDateStart" placeholder="Rent Date Start" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="rentDateEnd" class="sr-only">Rent Date End</label>
                        <input id="rentDateEnd" type="date" class="form-control" name="rentDateEnd" placeholder="Rent Date End" required autofocus>
                    </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="carType" class="sr-only">Car Type</label>
                        <select name="carType" id="carType" class="form-control">
                            <option value="">Choose Your Car</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    </td></tr>
                    <tr><td><td>
                    <button id="submitBooking" type="button" class="btn btn-primary mb-2">Submit</button>
                    </td></td></tr>
                </form>
                </table>
            </div>
        </div>
        <br>
        
    {{--Firebase Tasks--}}
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>

    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDPdRuJiVEnK5qJ3-3IJWB3nG0m7YZBmH4",
        authDomain: "getmecar-43589.firebaseapp.com",
        databaseURL: "https://getmecar-43589.firebaseio.com",
        projectId: "getmecar-43589",
        storageBucket: "getmecar-43589.appspot.com",
        messagingSenderId: "942215868257",
        appId: "1:942215868257:web:1abe96dfada9c1e3579f20",
        measurementId: "G-TNBCSHWNVK"
        };
        firebase.initializeApp(config);
        firebase.analytics();

        var database = firebase.database();

        var lastIndex = 0;

        // Get Data
        firebase.database().ref('Booking/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function (index, value) {
                if (value) {
                    htmls.push('<tr>\
                    <td>' + value.name + '</td>\
                    <td>' + value.email + '</td>\
                    <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
                    <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Delete</button></td>\
                </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitBooking").removeClass('desabled');
        });

        // Add Data
        $('#submitBooking').on('click', function () {
            var values = $("#addBooking").serializeArray();
            var name = values[0].value;
            var email = values[1].value;
            var ic = values[2].value;
            var license = values[3].value;
            var address = values[4].value;
            var phoneNum = values[5].value;
            var rentDateStart = values[6].value;
            var rentDateEnd = values[7].value;
            var carType = values[8].value;
            var bookingID = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Booking/' + bookingID).set({
                name: name,
                email: email,
                ic: ic,
                license: license,
                address: address,
                phoneNum: phoneNum,
                rentDateStart: rentDateStart,
                rentDateEnd: rentDateEnd,
                carType: carType,
            });

            // Reassign lastID value
            lastIndex = bookingID;
            $("#addBooking input").val("");
        });

        // Update Data
        var updateID = 0;
        $('body').on('click', '.updateData', function () {
            updateID = $(this).attr('data-id');
            firebase.database().ref('Booking/' + updateID).on('value', function (snapshot) {
                var values = snapshot.val();
                var updateData = '<div class="form-group">\
                    <label for="first_name" class="col-md-12 col-form-label">Name</label>\
                    <div class="col-md-12">\
                        <input id="first_name" type="text" class="form-control" name="name" value="' + values.name + '" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <label for="last_name" class="col-md-12 col-form-label">Email</label>\
                    <div class="col-md-12">\
                        <input id="last_name" type="text" class="form-control" name="email" value="' + values.email + '" required autofocus>\
                    </div>\
                </div>';

                $('#updateBody').html(updateData);
            });
        });

        $('.updateBooking').on('click', function () {
            var values = $(".booking-update-record-model").serializeArray();
            var postData = {
                name: values[0].value,
                email: values[1].value,
            };

            var updates = {};
            updates['/Booking/' + updateID] = postData;

            firebase.database().ref().update(updates);

            $("#update-modal").modal('hide');
        });

        // Remove Data
        $("body").on('click', '.removeData', function () {
            var id = $(this).attr('data-id');
            $('body').find('.booking-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
        });

        $('.deleteRecord').on('click', function () {
            var values = $(".booking-remove-record-model").serializeArray();
            var id = values[0].value;
            firebase.database().ref('Booking/' + id).remove();
            $('body').find('.booking-remove-record-model').find("input").remove();
            $("#remove-modal").modal('hide');
        });
        $('.remove-data-from-delete-form').click(function () {
            $('body').find('.booking-remove-record-model').find("input").remove();
        });
    </script>

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></script> -->

    
 

</body>
</html>