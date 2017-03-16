/**
 * Created by forest-sumo on 2017/03/15.
 */

var newsId = null;
var $deleteModal;
var $enableModal;

$(document).ready(function () {
    $('#news-table').DataTable();
    $deleteModal = $('#delete-item-modal');
    $enableModal = $('#enable-item-modal');
});


function disableItem(id) {
    newsId = id;
    $deleteModal.modal('show');
}

function enableItem(id) {
    newsId = id;
    $enableModal.modal('show');
}

function completeDelete() {
    $.post($('#site-url').val() + 'investor/disable_investor_item', {
        news_id: newsId
    }, function (response) {
        console.log(response);
        $deleteModal.modal('hide');
        window.location.reload();
    });
}

function completeEnable() {
    $.post($('#site-url').val() + 'investor/enable_investor_item', {
        news_id: newsId
    }, function (response) {
        console.log(response);
        $deleteModal.modal('hide');
        window.location.reload();
    });
}