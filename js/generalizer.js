function load_menu() {
    $(".inc--menufile").load("includes/menu.html");
}
function load_logo() {
    $(".inc--logo").load("includes/logo.html");
}
function check_configuration(pagename) {
    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'checkConfiguration'
        },
        dataType: 'JSON',
        success: function(response) {
            // console.log(response);
            if (pagename === 'index' && response.status === 'no_db') {
                window.location.href = 'configuration.html';
            }
            if (pagename === 'config' && response.status === 'db_found') {
                window.location.href = 'index.html';
            }
        }
    });
}
function checkStep2(dbname) {
    $('#statuslog').text("Checking if database '"+dbname+"' exists...");

    $.ajax({
        type: 'post',
        url: 'includes/server.php',
        data: {
            case: 'checkDatabaseExists',
            thedb:dbname
        },
        dataType: 'JSON',
        success: function(response) {
            console.log(response);
        }
    });
}