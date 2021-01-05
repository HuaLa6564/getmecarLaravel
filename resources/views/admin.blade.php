
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
    {{View::make('layouts.header')}}
        <h4 class="text-center">Admin CRUD</h4><br>
        <h5># Add Admin</h5>
        <!-- <div class="card card-default"> -->
            <!-- <div class="card-body"> -->
                <form id="addAdmin" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <input id="id" type="text" class="form-control" name="id" placeholder="Admin ID" required autofocus>
                    </div>
                    <br>
                    <div class="form-group mx-sm-3 mb-2">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email"required autofocus>
                    </div>
                    <button id="submitAdmin" type="button" class="btn btn-primary mb-2">Submit</button>
                </form>
            <!-- </div>
        </div> -->
        <br>
        <h5># Admin</h5>
        <table class="table table-bordered" style="background-color:#7ea4b3">
            <tr>
                <th>Admin ID</th>
                <th>Email</th>
                <th width="180" class="text-center">Action</th>
            </tr>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>

    <!-- Update Model -->
    <form action="" method="POST" class="admin-update-record-model form-horizontal">
        <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-success updateAdmin">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Model -->
    <form action="" method="POST" class="admin-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    
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
        firebase.database().ref('Admin/').on('value', function (snapshot) {
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
            $("#submitAdmin").removeClass('desabled');
        });

        // Add Data
        $('#submitAdmin').on('click', function () {
            var values = $("#addAdmin").serializeArray();
            var id = values[0].value;
            var email = values[1].value;
            var adminID = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Admin/' + adminID).set({
                id: id,
                email: email,
            });

            // Reassign lastID value
            lastIndex = adminID;
            $("#addAdmin input").val("");
        });

        // Update Data
        var updateID = 0;
        $('body').on('click', '.updateData', function () {
            updateID = $(this).attr('data-id');
            firebase.database().ref('Admin/' + updateID).on('value', function (snapshot) {
                var values = snapshot.val();
                var updateData = '<div class="form-group">\
                    <label for="first_name" class="col-md-12 col-form-label">Admin ID</label>\
                    <div class="col-md-12">\
                        <input id="first_name" type="text" class="form-control" name="id" value="' + values.id + '" required autofocus>\
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

        $('.updateAdmin').on('click', function () {
            var values = $(".admin-update-record-model").serializeArray();
            var postData = {
                id: values[0].value,
                email: values[1].value,
            };

            var updates = {};
            updates['/Admin/' + updateID] = postData;

            firebase.database().ref().update(updates);

            $("#update-modal").modal('hide');
        });

        // Remove Data
        $("body").on('click', '.removeData', function () {
            var id = $(this).attr('data-id');
            $('body').find('.admin-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
        });

        $('.deleteRecord').on('click', function () {
            var values = $(".admin-remove-record-model").serializeArray();
            var id = values[0].value;
            firebase.database().ref('Admin/' + id).remove();
            $('body').find('.admin-remove-record-model').find("input").remove();
            $("#remove-modal").modal('hide');
        });
        $('.remove-data-from-delete-form').click(function () {
            $('body').find('.admin-remove-record-model').find("input").remove();
        });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 

</body>
</html>