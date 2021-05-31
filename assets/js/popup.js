$('#show').on('click', function () {
    $('.center_popup').show();
    $(this).hide();
})

$('#close').on('click', function () {
    $('.center_popup').hide();
    $('#show').show();
})