<?php
    //Configuration script's
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
    if (isset($_POST['case']) && $_POST['case'] == 'checkDatabaseExists') {
        ini_set('display_errors', '0');
        $hostname       = $_POST['hostname'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $databasename   = $_POST['thedb'];

        $conn = new mysqli($hostname, $username, $password);

        $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databasename'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo json_encode(array("status" => 1));
        } else {
            $createDBsql = "CREATE DATABASE $databasename";
            if ($conn->query($createDBsql) === TRUE) {
                echo json_encode(array("status" => 2));
            } else {
                echo json_encode(array("status" => 3, "error_message" => $conn->error));
            }
        }
    }
    if (isset($_POST['case']) && $_POST['case'] == 'creatingConfigTables') {
        ini_set('display_errors', '0');
        $hostname       = $_POST['hostname'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $databasename   = $_POST['thedb'];

        $conn = new mysqli($hostname, $username, $password, $databasename);

        $tblsql = "CREATE TABLE `table_projects` (
            `id` int(11) NOT NULL,
            `projectname` varchar(100) NOT NULL,
            `hostname` varchar(100) NOT NULL,
            `username` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `databasename` varchar(100) NOT NULL,
            `date_registred` datetime NOT NULL,
            `backup_nr` int(11) NOT NULL,
            `last_backup` datetime NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
          ALTER TABLE `table_projects` ADD PRIMARY KEY (`id`);
          ALTER TABLE `table_projects` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
        if ($conn->multi_query($tblsql) === TRUE) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false, "error_message" => $conn->error));
        }
    }
    if (isset($_POST['case']) && $_POST['case'] == 'creatingConfigFile') {
        ini_set('display_errors', '0');
        $hostname       = $_POST['hostname'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $databasename   = $_POST['thedb'];

        if (!file_exists('dbcon.php')) {
            $connectionFile = fopen("dbcon.php", "w") or die("Unable to open file!");
            $content_file = "<?php\n";
            $content_file .= '    $hostname = "'.$_POST["hostname"].'";'."\n";
            $content_file .= '    $username = "'.$_POST["username"].'";'."\n";
            $content_file .= '    $password = "'.$_POST["password"].'";'."\n";
            $content_file .= '    $databasename = "'.$_POST["thedb"].'";'."\n";
            $content_file .= '    $conn = new mysqli($hostname, $username, $password, $databasename);';
            fwrite($connectionFile, $content_file);
            fclose($connectionFile);

            if (!file_exists('dbcon.php')) {
                echo json_encode(array("status" => 2));
            } else {
                echo json_encode(array("status" => 3));
            }
        } else {
            echo json_encode(array("status" => 1));
        }
    }

    //Activities
    if (isset($_POST['case']) && $_POST['case'] == 'checkConfiguration') {
        if (!file_exists('dbcon.php')) {
            echo json_encode(array('status' => 'no_db'));
        } else {
            echo json_encode(array('status' => 'db_found'));
        }
    }
    if (isset($_POST['case']) && $_POST['case'] == 'loadProjectsMenu') {
        require_once('dbcon.php');
        $status = '';
        $sql = "SELECT id, projectname FROM `table_projects`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $collection = array();
            while($row = $result->fetch_assoc()) {
                $subarray = array();

                $subarray['id']          = $row['id'];
                $subarray['projectname'] = $row['projectname'];

                $collection[] = $subarray;
            }
            $status = 'ok';
        }

        $responseArray = array(
            "status" => $status,
            "data"   => $collection
        );

        echo json_encode($responseArray);
    }