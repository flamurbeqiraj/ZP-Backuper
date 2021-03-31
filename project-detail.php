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
                <div class="d-flex align-items-baseline">
                    <h3>Project name</h3>
                    <span class="fst-italic fs-6 text-muted ms-2">(<b>Last backup:</b> <span>2 Hours and 13
                            Minutes</span>)</span>
                </div>

                <div class="w-100 h-75 mb-1 border border-dark overflow-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="position-sticky sticky-top bg-primary">#</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Table</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Columns</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Records</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Action's</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>tbl_name</td>
                                <td>10</td>
                                <td>456</td>
                                <td><button class="btn btn-primary btn-sm">VIEW</button></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center" colspan="5">There is no tables in this backup file.</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/generalizer.js"></script>
<script>
    load_logo();
    load_menu();
</script>

</html>