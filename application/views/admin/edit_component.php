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
                <h3 class="mb-0">Edit Component</h3>
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
                    <h4 class="mb-0">Update Component</h4>
                  </div>
                  <!-- form start -->
                  <?php echo form_open_multipart(admin_url('edit_component/'.$component_id), ['id' => 'component_form']); ?>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" name="component_status" value="1" <?php echo isset($component->component_status) && $component->component_status == 1 ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="customSwitch2">Component Status</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="component_name">Component Name</label>
                      <input type="text" class="form-control" id="component_name" name="component_name" placeholder="Enter Component Name" value="<?php echo $component->component_name;?>">
                    </div>
                    <div class="form-group">
                      <label for="component_heading">Heading</label>
                      <input type="text" class="form-control" id="component_heading" name="component_heading" placeholder="Enter Heading" value="<?php echo $component->component_heading;?>">
                    </div>
                    <div class="form-group">
                      <label for="component_sub">Sub Heading</label>
                      <input type="text" class="form-control" id="component_sub" name="component_sub" placeholder="Enter Sub Heading" value="<?php echo $component->component_sub;?>">
                    </div>
                    <div class="form-group">
                      <label for="component_icon">Component Icon</label>
                      <input type="file" class="form-control" id="component_icon" name="component_icon">
                      <?php if (!empty($component->component_icon)) : ?>
                        <div class="mt-2">
                          <img src="<?php echo base_url($component->component_icon); ?>" 
                                alt="Component Icon" width="40">
                        </div>
                        <input type="hidden" name="existing_component_icon" value="<?php echo $component->component_icon; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="component_content">Component Content</label>
                      <textarea class="form-control" name="component_content" id="summernote" placeholder="Enter Component Content" rows="8"><?php echo $component->component_content;?></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">                    
                      <h4 class="mb-0">Manage</h4>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-banner"><i class="bi bi-plus-lg"></i> Add</a>              
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($component_details)) { ?>              
                        <?php foreach ($component_details as $component_detail) { ?>              
                        <tr class="odd">
                          <td><?php echo $component_detail->id;?></td>
                          <td><?php echo $component_detail->name;?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#modal-banner" class="btn btn-sm btn-primary" onclick="editComponentDetail(<?php echo $component_detail->id; ?>)">Edit</a>
                            <a href="<?php echo admin_url('delete_component_detail/' . $component_detail->id.'/' . $component_id); ?>" onclick="return confirm('Are you sure you want to delete this component?');" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                        <?php } else {?>
                          <tr class="odd"><td class="text-center" colspan="6">No data found</td></tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
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
    <div class="modal fade" id="modal-banner" aria-modal="true" role="dialog">
        <div class="modal-dialog">
        <?php echo form_open_multipart(admin_url('component_details/'.$component_id), ['id' => 'component_details_form']); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="edit-title hide">Edit</h4>
              <h4 class="add-title">Add</h4>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="component_details_id" id="component_details_id" value="">
                <div class="form-group">
                    <label for="name">Heading</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter heading">
                </div>
                <div class="form-group">
                    <label for="email">Sub Heading</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter sub heading" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label for="detail_image">Image</label>
                  <input type="file" class="form-control" id="detail_image" name="detail_image">
                </div>
                <div class="form-group">
                    <label for="password">Description</label>
                    <textarea class="form-control" name="long_description" id="summernote2"></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>