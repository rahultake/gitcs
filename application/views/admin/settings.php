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
                <h3 class="mb-0">Site Settings</h3>                
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
                    <h4 class="mb-0">Add/Update Settings</h4>
                  </div>
                  <!-- form start -->
                  <?php echo form_open_multipart(admin_url('settings/'), ['id' => 'settings_form']); ?>
                  <div class="card-body">     
                  <input type="hidden" name="site_id" value="<?php echo isset($settings->id) ? $settings->id : ''; ?>">               
                    <div class="form-group">
                      <label for="site_name">Site Name</label>
                      <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter site Name" value="<?php echo isset($settings->site_name) ? $settings->site_name : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label for="site_logo">Site Logo</label>
                      <input type="file" class="form-control" id="site_logo" name="site_logo">
                      <?php if (!empty($settings->site_logo)) : ?>
                        <div class="mt-2">
                          <img src="<?php echo base_url($settings->site_logo); ?>" 
                                alt="Site Logo" width="40">
                        </div>
                        <input type="hidden" name="existing_site_logo" value="<?php echo $settings->site_logo; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="site_favicon">Site Favicon</label>
                      <input type="file" class="form-control" id="site_favicon" name="site_favicon">
                      <?php if (!empty($settings->site_favicon)) : ?>
                        <div class="mt-2">
                          <img src="<?php echo base_url($settings->site_favicon); ?>" 
                                alt="Site Favicon" width="40">
                        </div>
                        <input type="hidden" name="existing_site_favicon" value="<?php echo $settings->site_favicon; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="site_email"></label>
                      <input type="text" class="form-control" id="site_email" name="site_email" placeholder="Enter site email" value="<?php echo isset($settings->site_email) ? $settings->site_email : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label for="site_phone"></label>
                      <input type="text" class="form-control" id="site_phone" name="site_phone" placeholder="Enter site phone no." value="<?php echo isset($settings->site_phone) ? $settings->site_phone : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label for="copyright_text"></label>
                      <input type="text" class="form-control" id="copyright_text" name="copyright_text" placeholder="Enter copyright text" value="<?php echo isset($settings->copyright_text) ? $settings->copyright_text : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label for="opening_hours"></label>
                      <input type="text" class="form-control" id="opening_hours" name="opening_hours" placeholder="Enter opening hours" value="<?php echo isset($settings->opening_hours) ? $settings->opening_hours : ''; ?>">
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