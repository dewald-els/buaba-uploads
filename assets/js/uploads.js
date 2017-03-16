/**
 * Created by dewal on 2/28/2017.
 */
$(document).ready(function () {

    console.log('uploads');

    $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });


    $('#add-file-upload').click(function (e) {
        e.preventDefault();
        var files = document.querySelectorAll('.file-upload');

        if (files.length <= 2) {
            var newNumber = files.length + 1;
            $('#num-of-files').val(newNumber);

            $('.file-uploads').append(
                '<div class="form-group file-upload" id="file-upload-'+newNumber+'">' +
                    '<label for="">File'+newNumber+'</label> <br>' +
                    '<input type="file" name="document'+newNumber+'" id="document'+newNumber+'" style="display: inline-block">' +
                    '<button type="button" class="btn btn-danger btn-sm pull-right" onclick="removeUpload('+newNumber+')"><i class="fa fa-trash"></i></button>' +
                    '<div class="clearfix"></div>' +
                '</div>'
            );
        }
        else
        {

        }
    });

});

function removeUpload(number) {
    var element = document.getElementById('file-upload-'+number);
    $(element).remove();
}

$(function () {
    $('[data-toggle="popover"]').popover()
});



