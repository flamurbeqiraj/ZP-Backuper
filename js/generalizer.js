function load_menu() {
    $(".inc--menufile").load("includes/menu.html", function() {
        $.ajax({
            type: 'POST',
            url: 'includes/server.php',
            data: {
                case: "loadProjectsMenu"
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'ok') {
                    $('#menu-projects').html('');
                    $.each(response.data, function(k, v) {
                        $('#menu-projects').append('<tr><td class="pt-0 pb-0"><a href="'+v.id+'">'+v.projectname+'</a></td></tr>');
                    });
                } else {
                    $('#menu-projects').html('<tr><td>No projects yet</td></tr>');
                }
            }
        });
    });
}

function load_logo() {
    $(".inc--logo").load("includes/logo.html");
}

function get_ip_address() {
    $.ajax({
        type: 'get',
        url: 'https://api.ipify.org/?format=json',
        data: {
            case: 'getIpAddress'
        },
        dataType: 'json',
        success: function (response) {
            $('#getMyIp').text(response.ip);
        }
    });
}

function check_configuration(pagename) {
    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'checkConfiguration'
        },
        dataType: 'JSON',
        success: function (response) {
            // console.log(response);
            if (pagename === 'config' && response.status === 'db_found') {
                window.location.href = 'index.html';
            }
            if (pagename === 'index' && response.status === 'no_db') {
                window.location.href = 'configuration.html';
            }
            if (pagename === 'add' && response.status === 'no_db') {
                window.location.href = 'configuration.html';
            }
        }
    });
}

function checkStep2(dbhost, dbuser, dbpass, dbname) {
    $('#statuslog').text("Checking if database '" + dbname + "' exists...");

    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'checkDatabaseExists',
            hostname: dbhost,
            username: dbuser,
            dbpass: dbpass,
            thedb: dbname
        },
        dataType: 'JSON',
        success: function (response) {
            setTimeout(function () {
                if (response.status === 1) {
                    $('#warningMessage').addClass('d-none');
                    $('#statuslog').html("Database with this name already exists! Please use another name.<br><br> <button class='btn btn-danger btn-sm' onClick='Swal.close();'>CLOSE</button>");
                }
                if (response.status === 2) {
                    $('#statuslog').text("Database was created successfuly.");
                    setTimeout(() => {
                        checkStep3(dbhost, dbuser, dbpass, dbname)
                    }, 3000);
                }
                if (response.status === 3) {
                    $('#warningMessage').addClass('d-none');
                    $('#statuslog').html(response.error_message + '<br><br>Unable to create the database!<br><br> <button class="btn btn-danger btn-sm" onClick="Swal.close();">CLOSE</button>');
                }
            }, 2000);
        }
    });
}

function checkStep3(dbhost, dbuser, dbpass, dbname) {
    $('#statuslog').text("Creating tables...");

    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'creatingConfigTables',
            hostname: dbhost,
            username: dbuser,
            dbpass: dbpass,
            thedb: dbname
        },
        dataType: 'JSON',
        success: function (response) {
            setTimeout(function () {
                if (response.status === true) {
                    $('#statuslog').text("Config table was created successfuly.");
                    setTimeout(() => {
                        checkStep4(dbhost, dbuser, dbpass, dbname);
                    }, 3000);
                }
                if (response.status === false) {
                    $('#warningMessage').addClass('d-none');
                    $('#statuslog').html(response.error_message + '<br><br>Unable to create the configuration table!<br><br> <button class="btn btn-danger btn-sm" onClick="Swal.close();">CLOSE</button>');
                }
            }, 2000);
        }
    });
}

function checkStep4(dbhost, dbuser, dbpass, dbname) {
    $('#statuslog').text("Creating db connection file...");

    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'creatingConfigFile',
            hostname: dbhost,
            username: dbuser,
            dbpass: dbpass,
            thedb: dbname
        },
        dataType: 'JSON',
        success: function (response) {
            setTimeout(function () {
                if (response.status === 1) {
                    $('#statuslog').text("Connection file exists already!<br><br> <button class='btn btn-danger btn-sm' onClick='Swal.close();'>CLOSE</button>");
                    $('#warningMessage').addClass('d-none');
                }
                if (response.status === 2) {
                    $('#statuslog').text("Connection file unable to create!<br><br> <button class='btn btn-danger btn-sm' onClick='Swal.close();'>CLOSE</button>");
                    // $('#statuslog').html(response.error_message + '<br><br>Unable to create the configuration table!<br><br> <button class="btn btn-danger btn-sm" onClick="Swal.close();">CLOSE</button>');
                }
                if (response.status === 3) {
                    $('#statuslog').text("Connection file successfuly created.");
                    setTimeout(() => {
                        $('#statuslog').text("Setup completed, you will be redirected soon.");
                        setTimeout(() => {
                            window.location.href = './';
                        }, 2000);
                    }, 3000);
                }
            }, 2000);
        }
    });
}

function checkDatabaseExistance(dbhost, dbuser, dbpass, dbname) {
    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'getDatabaseNameExist',
            hostname: dbhost,
            username: dbuser,
            dbpass: dbpass,
            thedb: dbname
        },
        dataType: 'JSON',
        success: function (response) {
            setTimeout(function () {
                if (response.status === 2) {
                    $('#statuslog').text("Database doesen't exist!");
                    setTimeout(() => {
                        Swal.close();
                    }, 1000); 
                }
                if (response.status === 1) {
                    $('#statuslog').text("Database located successfuly.");
                    setTimeout(() => {
                        $('#statuslog').text("Registring...");
                        registerNewDatabase(dbhost, dbuser, dbpass, dbname);
                    }, 1000);
                }
            }, 2000);
        }
    });
}

function registerNewDatabase(fhs, fus, fps, fdb) {
    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'registerNewProject',
            hostname: fhs,
            username: fus,
            dbpass: fps,
            thedb: fdb
        },
        dataType: 'JSON',
        success: function (response) {
            setTimeout(function () {
                if (response.error_status === true) {
                    $('#statuslog').text("Your database refused to register the project.");
                    setTimeout(() => {
                        Swal.close();
                    }, 3000);
                }
                if (response.error_status === false) {
                    $('#statuslog').text("Project is registred successfuly.");
                    setTimeout(() => {
                        Swal.close();
                        window.location.href = 'index.html'
                    }, 1000);
                }
            }, 2000);
        }
    });
}