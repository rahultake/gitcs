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
                <h3 class="mb-0">Add Component</h3>
                <a href="<?php echo admin_url('componentlist'); ?>" class="btn btn-primary"><i class="bi bi-skip-backward"></i> Go Back</a>
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
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="mb-0">Create Component</h4>
                  </div>
                  <!-- form start -->
                  <?php echo form_open_multipart(admin_url('add_component/'), ['id' => 'component_form']); ?>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" name="component_status" value="1" checked>
                        <label class="custom-control-label" for="customSwitch2">Component Status</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="component_name">Component Name</label>
                      <input type="text" class="form-control" id="component_name" name="component_name" placeholder="Enter Component Name">
                    </div>
                    <div class="form-group">
                      <label for="component_heading">Heading</label>
                      <input type="text" class="form-control" id="component_heading" name="component_heading" placeholder="Enter Heading">
                    </div>
                    <div class="form-group">
                      <label for="component_sub">Sub Heading</label>
                      <input type="text" class="form-control" id="component_sub" name="component_sub" placeholder="Enter Sub Heading">
                    </div>
                    <div class="form-group">
                      <label for="component_icon">Component Icon</label>
                      <input type="file" class="form-control" id="component_icon" name="component_icon">
                    </div>
                    <div class="form-group">
                      <label for="component_content">Component Content</label>
                      <textarea class="form-control" name="component_content" id="summernote" placeholder="Enter Component Content" rows="8"></textarea>
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