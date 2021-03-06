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
                <div class="d-flex">
                    <h3>Hello, what do you need to do?</h3>
                </div>
                <ul class="ps-3">
                    <li><a href="add.php">Add a project</a></li>
                    <li><a href="#">Backup all project's</a></li>
                    <li><a href="#">View Backups</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/generalizer.js"></script>
<script>
    var page = 'index';
    load_logo();
    load_menu();
    check_configuration(page);
</script>

</html>