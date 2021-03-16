<?php
    if (!file_exists('dbcon.php')) {
        echo json_encode(array('status' => 'no_db'));
    } else {
        echo json_encode(array('status' => 'db_found'));
    }
?>