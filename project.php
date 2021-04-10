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
            
            <div class="mainCont border border-dark rounded-3 bg-white p-3">
                <div class="d-flex align-items-baseline">
                    <h3 id="project_name">...</h3>
                    <span class="fst-italic fs-6 text-muted ms-2" id="backup_info">(<b>Last backup:</b> <span id="last_backup">...</span>)</span>
                </div>
                
                <div class="w-100 border border-dark overflow-auto mb-1">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="position-sticky sticky-top bg-primary">#</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Filename</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Backup date</th>
                                <th scope="col" class="position-sticky sticky-top bg-primary">Action</th>
                            </tr>
                        </thead>
                        <tbody id="body_result">
                            <!-- <tr>
                                <th scope="row">1</th>
                                <td>filename.txt</td>
                                <td>24.02.2019 22:31</td>
                                <td><button class="btn btn-primary btn-sm btn-rxs">VIEW</button> <button class="btn btn-danger btn-sm btn-rxs">DELETE</button></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center" colspan="4">There is no backup file for this project.</th>
                            </tr> -->
                            <tr>
                                <th scope="row" class="text-center" colspan="4">Loading...</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div>
                    <span>Quick backup: </span> <select><option value="1">JSON Format</option></select> <button class="btn btn-sm btn-success">GENERATE</button>
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
    load_project(<?php echo $_GET['id']; ?>);
    load_backups(<?php echo $_GET['id']; ?>);
</script>

</html>