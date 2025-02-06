<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-12 d-flex justify-content-between">
                <h3 class="mb-0">Edit Page</h3>
                <a href="<?php echo admin_url('pagelist'); ?>" class="btn btn-primary"><i class="bi bi-skip-backward"></i> Go Back</a>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="mb-0">Component</h4>      
                  </div>
                  <div class="card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <?php if(!empty($components)) {
                      $page_components = isset($page->component_id) ? explode(',', $page->component_id) : []; ?>              
                      <?php foreach ($components as $component) { 
                        if (in_array($component->id, $page_components)) {
                          continue;
                        }?>
                      <div class="info-box draggable-component" id="component-list" data-id="<?php echo $component->id; ?>" data-name="<?php echo htmlspecialchars($component->component_name, ENT_QUOTES, 'UTF-8'); ?>" 
                      data-icon="<?php echo base_url($component->component_icon); ?>">
                        <img width="60" height="60" src="<?php echo base_url($component->component_icon); ?>" alt="Component Icon">
                        <div class="info-box-content pl-4">
                          <h5 class="info-box-text"><?php echo $component->component_name;?></h5>
                        </div>
                        <span class="m-auto">
                          <a href="<?php echo admin_url('edit_component/' . $component->id); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg> 
                          </a>
                        </span>
                        <span class="m-auto">
                          <a href="#" id="add_component">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-grip-vertical" viewBox="0 0 16 16">
                              <path d="M7 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M7 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-3 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                          </a>
                        </span>
                      </div>
                      <?php } ?>
                      <?php } else {?>
                        <div class="info-box">
                          <img width="60" height="60" src="" alt="Component Icon">
                          <div class="info-box-content">
                            <span class="info-box-text">No Component Found</span>
                          </div>
                        </div>
                      <?php }?>
                  </div>
                  <!-- /.card-header -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="mb-0">Edit Page</h4>
                  </div>
                  <!-- form start -->
                  <?php echo form_open_multipart(admin_url('edit_page/'.$page_id), ['id' => 'page_form']); ?>
                  <div class="card-body edit-page-drop-zone">
                  <?php 
                    // Fetch the existing component IDs from the pages table
                    $page_components = isset($page->component_id) ? explode(',', $page->component_id) : [];
                    if(!empty($components)) {
                    foreach ($components as $component) { 
                        // Check if the current component is already in the page's component_id list
                        if (!in_array($component->id, $page_components)) {
                            continue; // Skip components that are not added
                        }
                    ?>
                      <div class="info-box draggable-component" 
                          id="component-list" 
                          data-id="<?php echo $component->id; ?>" 
                          data-name="<?php echo htmlspecialchars($component->component_name, ENT_QUOTES, 'UTF-8'); ?>" 
                          data-icon="<?php echo base_url($component->component_icon); ?>">
                          <input type="hidden" name="component_id[]" value="<?php echo $component->id; ?>">
                          <img width="60" height="60" src="<?php echo base_url($component->component_icon); ?>" alt="Component Icon">
                          
                          <div class="info-box-content pl-4">
                              <h5 class="info-box-text"><?php echo $component->component_name;?></h5>
                          </div>
                          <span class="m-auto remove-component">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                          </span>
                        </div>
                    <?php } } else {?>
                      <h6 class="drop-placeholder">Drag components here...</h6>
                    <?php }?>
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" name="page_status" value="1" <?php echo isset($page->page_status) && $page->page_status == 1 ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="customSwitch2">Page Status</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="page_title">Page Title</label>
                      <input type="text" class="form-control" id="page_title" name="page_title" placeholder="Enter Page Title" value="<?php echo $page->page_title;?>">
                    </div>
                    <div class="form-group">
                      <label for="page_title">Page Slug</label>
                      <input type="text" class="form-control" id="page_slug" name="page_slug" placeholder="Enter Page Slug" value="<?php echo $page->page_slug;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="meta_image">Page Image</label>
                      <input type="file" class="form-control" id="meta_image" name="meta_image">
                      <?php if (!empty($page->meta_image)) : ?>
                        <div class="mt-2">
                          <img src="<?php echo base_url($page->meta_image); ?>" 
                                alt="Page Image" width="150">
                        </div>
                        <input type="hidden" name="existing_meta_image" value="<?php echo $page->meta_image; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" value="<?php echo $page->meta_title; ?>">
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="<?php echo $page->meta_keywords; ?>">
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" rows="5"><?php echo $page->meta_description; ?></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::App Content-->
    </main>
    <!--end::App Main-->