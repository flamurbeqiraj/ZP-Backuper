<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div>
        <div class="container inc--logo"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 border border-dark rounded-3 bg-white p-5 text-center">
                    <h3>1. Step: Configuration :-)</h3>
                    <p class="italicInfo flexer">
                        Welcome to ZP Database Backuper, all you need to do is to give your localhost/phpmyadmin
                        connection
                        credentials, so you have control over the remote databases.
                    </p>
                    <section class="d-flex justify-content-center">
                        <table>
                            <tr>
                                <td>Hostname:</td>
                                <td><input type="text" id="host" class="form-control w-auto ms-5" value="localhost"></td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" id="user" class="form-control w-auto ms-5" value="root"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="text" id="pass" class="form-control w-auto ms-5"></td>
                            </tr>
                            <tr>
                                <td>Database:</td>
                                <td><input type="text" id="thedb" class="form-control w-auto ms-5" value="zpbackuper"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button class="btn btn-success w-100" id="checkConfiguration">CHECK & REGISTER</button></td>
                            </tr>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script src="js/generalizer.js"></script>
<script src="js/custom.js"></script>
<script>
    var page = 'config';
    load_logo();
    check_configuration(page);
</script>

</html>