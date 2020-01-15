$(document).ready(function() {
    var token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
});