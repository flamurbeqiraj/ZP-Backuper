<?php
    // if (!file_exists('dbcon.php')) {
    //     echo json_encode(array('status' => 'no_db'));
    // } else {
    //     echo json_encode(array('status' => 'db_found'));
    // }
    if (isset($_GET['case']) && $_GET['case'] == 'getDbConnStatus') {
        $host = $_GET['hostname'];
        $user = $_GET['username'];
        $pass = $_GET['password'];
        $thedb= $_GET['database'];
    }
?>