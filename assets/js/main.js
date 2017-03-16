/**
 * Created by dewal on 2/28/2017.
 */
$(document).ready(function () {

    var $btnLogout = $('#btn-logout');

    $btnLogout.click(function (e) {
        e.preventDefault();
        $('#logout-modal').modal('show');
    });


});


$(function () {
    $('[data-toggle="popover"]').popover()
});