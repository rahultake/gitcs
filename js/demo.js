function editUser(userId) {
    $.ajax({
        url: adminUrl + 'get_userbyid/' + userId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#user_id').val(response.id);
            $('#name').val(response.name);
            $('#email').val(response.email);
            $('.edit-title').removeClass('hide');
            $('.add-title').addClass('hide');
        }
    });
}
function editNavigation(navigationId) {
    $.ajax({
        url: adminUrl + 'get_navigationbyid/' + navigationId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#navigation_id').val(response.id);
            $('#navigation_name').val(response.navigation_name);
            $('#navigation_display').val(response.navigation_display);
            $('#navigation_order').val(response.navigation_order);
            $('#navigation_target').val(response.navigation_target);
            $('#customSwitch1').prop('checked', response.custom_url == 1);
            $('#customSwitch2').prop('checked', response.navigation_status == 1);
            $('#navigation_type').val(response.navigation_type);
            $('#custom_link').val(response.custom_link);
            $('.edit-title').removeClass('hide');
            $('.add-title').addClass('hide');
        }
    });
}
$('#customSwitch1').on('change', function () {
    if ($(this).prop('checked')) {
        $('#custom_link_group').removeClass('hide').show(); // Show the input field
    } else {
        $('#custom_link_group').hide(); // Hide the input field
    }
});
function editsubNavigation(multilevelId) {
    $.ajax({
        url: adminUrl + 'get_subnavigationbyid/' + multilevelId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#multilevel_id').val(response.id);
            $('#multilevel_name').val(response.multilevel_name);
            $('#multilevel_order').val(response.multilevel_order);
            $('#multilevel_svg').val(response.multilevel_svg);
            $('#customSwitch2').prop('checked', response.multilevel_status == 1);
            $('.edit-title').removeClass('hide');
            $('.add-title').addClass('hide');
        }
    });
}