
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
    {{View::make('layouts.header')}}
        <h4 class="text-center">Employee CRUD</h4><br>
        <h5># Add Employee</h5>
        <!-- <div class="card card-default"> -->
            <!-- <div class="card-body"> -->
                <form id="addEmployee" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <input id="id" type="text" class="form-control" name="id" placeholder="Employee ID" required autofocus>
                    </div>
                    <br>
                    <div class="form-group mx-sm-3 mb-2">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email"required autofocus>
                    </div>
                    <button id="submitEmployee" type="button" class="btn btn-primary mb-2">Submit</button>
                </form>
            <!-- </div>
        </div> -->
    
    
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
        firebase.database().ref('Employee/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function (index, value) {
                if (value) {
                    htmls.push('<tr>\
                    <td>' + value.id + '</td>\
                    <td>' + value.email + '</td>\
                    <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
                    <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Delete</button></td>\
                </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitEmployee").removeClass('desabled');
        });

        // Add Data
        $('#submitEmployee').on('click', function () {
            var values = $("#addEmployee").serializeArray();
            var id = values[0].value;
            var email = values[1].value;
            var employeeID = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Employee/' + employeeID).set({
                id: id,
                email: email,
            });

            // Reassign lastID value
            lastIndex = employeeID;
            $("#addEmployee input").val("");
        });

    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>