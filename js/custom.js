$('#checkConfiguration').click(function () {
    var host = $('#host').val();
    var user = $('#user').val();
    var pass = $('#pass').val();
    var theDb = $('#thedb').val();

    Swal.fire({
        title: 'Configuring',
        html: 'Status: <span id="statuslog">Trying database connection...</span><br><p class="text-muted fs-6" id="warningMessage">Please don\'t quit the process</p>',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
    });
    setTimeout(function () {
        $.ajax({
            type: 'post',
            url: 'includes/server.php',
            data: {
                case: 'getDbConnStatus',
                hostname: host,
                username: user,
                password: pass,
                database: theDb
            },
            dataType: 'JSON',
            success: function (response) {
                if (response.error_status === false) {
                    $('#statuslog').text("Connected successfuly with your database.");
                    setTimeout(function () {
                        checkStep2(host, user, pass, theDb);
                    }, 2000);
                }
                if (response.error_status === true) {
                    $('#warningMessage').addClass('d-none');
                    $('#statuslog').html(response.error_message + '<br><br>Wrong credentials given or forgot to start your MySql Service!<br><br> <button class="btn btn-danger btn-sm" onClick="Swal.close();">CLOSE</button>');
                }
            }
        });
    }, 1000);
});

$('#registerNewHost').click(function () {
    var host = $('#host').val();
    var user = $('#user').val();
    var pass = $('#pass').val();
    var theDb = $('#thedb').val();

    Swal.fire({
        title: 'Configuring',
        html: 'Testing connection: <span id="statuslog">Connecting...</span><br><p class="text-muted fs-6" id="warningMessage">Please don\'t quit the process</p>',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    setTimeout(function () {
        $.ajax({
            type: 'post',
            url: 'includes/server.php',
            data: {
                case: 'getDbConnStatus',
                hostname: host,
                username: user,
                password: pass,
                database: theDb
            },
            dataType: 'JSON',
            success: function (response) {
                if (response.error_status === false) {
                    $('#statuslog').text("Connection created successfuly.");
                    setTimeout(() => {
                        $('#statuslog').text("Looking for database.");
                        checkDatabaseExistance(host, user, pass, theDb);
                    }, 2000);
                }
                if (response.error_status === true) {
                    $('#statuslog').text("Wrong credentials given!");
                    setTimeout(() => {
                        Swal.close();
                    }, 2000);
                }
            }
        });
    }, 1500);
});