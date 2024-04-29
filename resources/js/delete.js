import $ from 'jquery';

$('.delete-button').on('click', function(e) {
    e.preventDefault();
    var deleteUrl = $(this).parent('form').attr('action');
    $(this).next('.modal').find('form').attr('action', deleteUrl);
    $(this).next('.modal').modal('show');
});
