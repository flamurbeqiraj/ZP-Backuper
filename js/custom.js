$('#checkConfiguration').click(function() {
	var errorLog = '';
    var currentStep = 0;

    var host = $('#host').val();
    var user = $('#user').val();
    var pass = $('#pass').val();
    var theDb= $('#thedb').val();

	Swal.fire({
        title: 'Configuring',
        html: 'Status: <span id="statuslog">Trying database connection...</span><br><p class="text-muted fs-6">Please don\'t quit the process</p>',
        showConfirmButton: false,
        allowOutsisideClick: false,
        allowEscapeKey: false
    });

    $.ajax({
        type: 'get',
        url: 'includes/server.php',
        data: {
            case:       'getDbConnStatus',
            hostname:   host,
            username:   user,
            password:   pass,
            database:   theDb
        },
        success:function() {

        }
    });
});