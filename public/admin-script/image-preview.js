$(document).ready(function() {
    function validateImage(inputId, errorId, imageElementId) {
        var input = $('#' + inputId)[0];
        var fileSize = input.files[0].size;
 
        if (Math.round(fileSize / (1024 * 1024)) > 10) {
            $('#' + errorId).text('The image must be less than 10 MB!');
            $('#' + inputId).val('');
            $('#' + imageElementId).addClass('d-none');
        } else {
            var fileName = input.value;
            var extFile = fileName.split('.').pop().toLowerCase();
 
            if (['jpg', 'jpeg', 'png', 'webp','svg'].indexOf(extFile) !== -1) {
                $('#' + errorId).text('');
                $('#' + imageElementId).removeClass('d-none');
 
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#' + imageElementId).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            } else {
                $('#' + errorId).text('Only jpg/jpeg, webp, and png files are allowed!');
                $('#' + inputId).val('');
                $('#' + imageElementId).addClass('d-none');
            }
        }
    }
 
    $('#image').on('change', function() {
        validateImage('image', 'image_error', 'image_preview');
    });
    $('#top_speed_icon').on('change', function() {
        validateImage('top_speed_icon', 'top_speed_icon_error', 'top_speed_icon_preview');
    });
    $('#mileage_icon').on('change', function() {
        validateImage('mileage_icon', 'mileage_icon_error', 'mileage_icon_preview');
    });
    $('#feature_one_icon').on('change', function() {
        validateImage('feature_one_icon', 'feature_one_icon_error', 'feature_one_icon_preview');
    });
    $('#feature_two_icon').on('change', function() {
        validateImage('feature_two_icon', 'feature_two_icon_error', 'feature_two_icon_preview');
    });
 });
 