<html>

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>GeeksForGeeks</h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>User Id</label>
                    <input type='text' name="user_id" id='user_id' class='form-control' placeholder='Enter user id'
                        onkeyup="GetDetail(this.value)" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        placeholder='First Name' value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder='Last Name'
                        value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder='Last Name'
                        value="">
                </div>
            </div>
        </div>
    </div>
    <script>
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("first_name").value = "";
                document.getElementById("last_name").value = "";
                document.getElementById("cpf").value = "";
                return;
            } else {
                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 &&
                        this.status == 200) {

                        var myObj = JSON.parse(this.responseText);

                        document.getElementById("first_name").value = myObj[0];
                        document.getElementById("last_name").value = myObj[1];
                        document.getElementById("cpf").value = myObj[2];

                    }
                };
                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "/retorno/" + str, true);
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>
