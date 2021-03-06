<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div>
        <div class="container inc--logo"></div>

        <div class="d-flex">
            <div class="inc--menufile"></div>

            <div class="mainCont border border-dark rounded-3 bg-white p-3 me-2">
                <h3>Add your project's database credentials here</h3>
                <p>Make sure that your IP Address is whitelisted at your remote project, otherwise you aren't able to
                    make the Backup Queries. If you are using cPanel, just go to the Database section and click on
                    Remote MySQL.<br>
                    Then add this IP Address: <span id="getMyIp">Fetching information...</span></p>

                <section class="d-flex justify-content-center">
                    <table class="w-100">
                        <tr>
                            <td>Projectname:</td>
                            <td><input type="text" class="form-control w-100" id="prname"></td>
                        </tr>
                        <tr>
                            <td>Hostname:</td>
                            <td><input type="text" class="form-control w-100" id="host"></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" class="form-control w-100" id="user"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" class="form-control w-100" id="pass"></td>
                        </tr>
                        <tr>
                            <td>Database:</td>
                            <td><input type="text" class="form-control w-100" id="thedb"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn btn-success w-100" id="registerNewHost">CHECK & REGISTER</button></td>
                        </tr>
                    </table>
                </section>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script src="js/generalizer.js"></script>
<script src="js/custom.js"></script>
<script>
    var page = "add";
    load_logo();
    load_menu();
    get_ip_address();
    check_configuration(page);
</script>

</html>