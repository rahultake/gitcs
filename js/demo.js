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
$('#page_title').on('keyup', function () {
    var title = $(this).val();
    var slug = title.toLowerCase() // Convert to lowercase
        .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
        .replace(/\s+/g, '-') // Replace spaces with hyphens
        .replace(/-+/g, '-'); // Remove multiple hyphens

    $('#page_slug').val(slug); // Set slug value
});
$(".draggable-component").draggable({
    helper: "clone",
    revert: "invalid"
});

// Make the Edit Page section droppable
$(".edit-page-drop-zone").droppable({
    accept: ".draggable-component",
    drop: function(event, ui) {
        $(".drop-placeholder").remove(); // Remove placeholder text if present

        let componentId = ui.helper.attr("data-id");
        let componentName = ui.helper.attr("data-name");
        let componentIcon = ui.helper.attr("data-icon");

        let droppedItem = ui.helper.clone(); // Clone dragged item
        droppedItem.removeClass("draggable-component"); // Remove draggable class
        droppedItem.appendTo($(this).find(".card-body")); // Append to the edit page section

        ui.helper.remove(); // Remove dragged item from original section
        ui.draggable.remove();

        let newComponent = `
            <div class="info-box">
                <input type="hidden" name="component_id[]" value="${componentId}">
                <img width="60" height="60" src="${componentIcon}" alt="Component Icon">
                <div class="info-box-content pl-4">
                    <h5 class="info-box-text">${componentName}</h5>
                </div>
                <span class="m-auto remove-component">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </span>
            </div>
        `;
        $(this).prepend(newComponent);
    }
});
$(document).on("click", ".remove-component", function() {
    let removedItem = $(this).closest(".info-box"); // Get the dropped item

    // Extract values from the removed item
    let componentId = removedItem.find("input[name='component_id']").val();
    let componentName = removedItem.find(".info-box-text").text();
    let componentIcon = removedItem.find("img").attr("src");

    // Remove the item from the edit page section
    removedItem.remove();

    // Restore it back to the component list
    let newComponent = $(`
        <div class="info-box draggable-component" data-id="${componentId}" data-icon="${componentIcon}" data-name="${componentName}">            
            <img width="60" height="60" src="${componentIcon}" alt="Component Icon">
            <div class="info-box-content pl-4">
                <h5 class="info-box-text">${componentName}</h5>
            </div>
            <span class="m-auto">
                <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg> 
                </a>
            </span>
            <span class="m-auto cursor-pointer">
                <a href="#" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-grip-vertical" viewBox="0 0 16 16">
                    <path d="M7 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M7 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg>
                </a>
            </span>
        </div>
    `);

    $(".card-widget").prepend(newComponent); // Add back to the component list

    // Reinitialize draggable on the new component
    newComponent.draggable({
        helper: "clone",
        revert: "invalid"
    });

    // If no items left in the drop zone, show placeholder text
    if ($("#component-drop-zone").children().length === 0) {
        $("#component-drop-zone").html('<p class="text-muted drop-placeholder">Drag components here...</p>');
    }
});
$(document).on("click", "#add_component", function(event) {
    event.preventDefault();

    let component = $(this).closest(".draggable-component");
    
    let componentId = component.attr("data-id");
    let componentName = component.attr("data-name");
    let componentIcon = component.attr("data-icon");

    let newComponent = `
        <div class="info-box">
            <input type="hidden" name="component_id[]" value="${componentId}">
            <img width="60" height="60" src="${componentIcon}" alt="Component Icon">
            <div class="info-box-content pl-4">
                <h5 class="info-box-text">${componentName}</h5>
            </div>
            <span class="m-auto remove-component">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </span>
        </div>
    `;

    $(".edit-page-drop-zone").prepend(newComponent); // Add the component

    $(".drop-placeholder").remove(); // Remove placeholder text
    component.remove();
});
function editComponentDetail(Id) {
    $.ajax({
        url: adminUrl + 'get_componentdetailbyid/' + Id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#component_details_id').val(response.id);
            $('#name').val(response.name);
            $('#description').val(response.description);
            // Show the image in an <img> tag if it exists
            if (response.detail_image) {
                let imageUrl = adminUrl + '../' +response.detail_image; // Ensure the correct path
                if ($("#preview_image").length === 0) {
                    $("#detail_image").after('<img id="preview_image" src="' + imageUrl + '" alt="Component Image" class="img-thumbnail mt-2" width="150">');
                } else {
                    $("#preview_image").attr("src", imageUrl);
                }
            }

            // Load text into Summernote
            $('#summernote2').summernote('code', response.long_description);
            $('.edit-title').removeClass('hide');
            $('.add-title').addClass('hide');
        }
    });
}
function editSocial(id) {
    $.ajax({
        url: adminUrl + 'get_socialbyid/' + id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#social_id').val(response.id);
            $('#social_name').val(response.social_name);
            $('#social_svg').val(response.social_svg);
            $('#social_target').val(response.social_target).trigger('change');
            $('#social_url').val(response.social_url);
            $('#customSwitch2').prop('checked', response.social_status == 1);
            $('.edit-title').removeClass('hide');
            $('.add-title').addClass('hide');
        }
    });
}