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
                <h3 class="mb-0">Add Page</h3>
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
                  <!-- /.card-header -->
                  <div class="card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <?php if(!empty($components)) { ?>
                      <?php foreach ($components as $component) { ?>
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
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="mb-0">Create Page</h4>
                  </div>
                  <!-- form start -->
                  <?php echo form_open_multipart(admin_url('add_page/'), ['id' => 'page_form']); ?>
                  <div class="card-body edit-page-drop-zone">
                    <h6 class="drop-placeholder">Drag components here...</h6>
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" name="page_status" value="1" checked>
                        <label class="custom-control-label" for="customSwitch2">Page Status</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="page_title">Page Title</label>
                      <input type="text" class="form-control" id="page_title" name="page_title" placeholder="Enter Page Title">
                    </div>
                    <div class="form-group">
                      <label for="page_title">Page Slug</label>
                      <input type="text" class="form-control" id="page_slug" name="page_slug" placeholder="Enter Page Slug" readonly>
                    </div>
                    <div class="form-group">
                      <label for="meta_image">Page Image</label>
                      <input type="file" class="form-control" id="meta_image" name="meta_image">
                      <?php if (!empty($page_seo->meta_image)) : ?>
                        <div class="mt-2">
                          <img src="<?php echo base_url($page_seo->meta_image); ?>" 
                                alt="Page Image" width="150">
                        </div>
                        <input type="hidden" name="existing_meta_image" value="<?php echo $page_seo->meta_image; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords">
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" rows="5"></textarea>
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