<?php
    if (isset($_POST['case']) && $_POST['case'] == 'checkConfiguration') {
        if (!file_exists('includes/dbcon.php')) {
            echo json_encode(array('status' => 'no_db'));
        } else {
            echo json_encode(array('status' => 'db_found'));
        }
    }
    if (isset($_POST['case']) && $_POST['case'] == 'getDbConnStatus') {
        ini_set('display_errors', '0');
        $host = $_POST['hostname'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $thedb= $_POST['database'];

        $errorStatus = false;
        $errorMessage= '';

        $conn = new mysqli($host, $user, $pass);
        if ($conn->connect_error) {
            $errorStatus = true;
            $errorMessage= $conn->connect_error;
        }

        $reponseArray = array(
            "error_status"  => $errorStatus,
            "error_message" => $errorMessage
        );

        echo json_encode($reponseArray);
    }

    
    $conn->close();