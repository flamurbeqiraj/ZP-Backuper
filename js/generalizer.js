function load_menu() {
    $(".inc--menufile").load("includes/menu.html");
}
function load_logo() {
    $(".inc--logo").load("includes/logo.html");
}
function check_configuration(pagename) {
    $.ajax({
        type: 'GET',
        url: 'includes/server.php',
        data: {
            case: 'checkConfiguration'
        },
        dataType: 'JSON',
        success: function(response) {
            if (pagename === 'index' && response.status === 'no_db') {
                window.location.href = 'configuration.html';
            }
            if (pagename === 'config' && response.status !== 'no_db') {
                window.location.href = 'index.html';
            }
        }
    });
}
$('#checkConfiguration').click(function() {
    alert("Checking");
});