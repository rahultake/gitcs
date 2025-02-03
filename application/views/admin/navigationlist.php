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
              <div class="col-sm-6"><h3 class="mb-0">Navigations List</h3></div>
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
                <div class="card mb-4">
                  <div class="card-header">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-navigation">Add Navigation</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Display</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($navigations)) { ?>              
                        <?php foreach ($navigations as $navigation) { ?>              
                        <tr class="odd">
                          <td><?php echo $navigation->id;?></td>
                          <td><?php echo $navigation->navigation_name;?></td>
                          <td><?php echo $navigation->navigation_slug;?></td>
                          <td><?php echo $navigation->navigation_display;?></td>
                          <td>
                            <?php if ($navigation->navigation_status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-navigation" onclick="editNavigation(<?php echo $navigation->id; ?>)">
                              Edit
                            </button>
                            <?php if ($navigation->navigation_type == 'multiple'): ?>
                              <a href="<?php echo admin_url('multilevel_navigation/' . $navigation->id); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add Multilevel</a>                           
                            <?php endif; ?>
                            <a href="<?php echo admin_url('add_seo/' . $navigation->id); ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add SEO</a>
                            <a href="<?php echo admin_url('delete_navigation/' . $navigation->id); ?>" onclick="return confirm('Are you sure you want to delete this navigation?');" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                        <?php } else {?>
                          <tr class="odd"><td class="text-center" colspan="4">No data found</td></tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
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
      <div class="modal fade" id="modal-navigation" aria-modal="true" role="dialog">
        <div class="modal-dialog">
        <?php echo form_open(admin_url('navigation/'), ['id' => 'navigation_form']); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="edit-title hide">Edit Navigation</h4>
              <h4 class="add-title">Add Navigation</h4>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="navigation_id" id="navigation_id" value="">
                <div class="form-group">
                    <label for="name">Navigation Name</label>
                    <input type="text" class="form-control" id="navigation_name" name="navigation_name" placeholder="Enter navigation name" required>
                </div>
                <div class="form-group">
                    <label for="name">Navigation Order</label>
                    <input type="number" class="form-control" id="navigation_order" name="navigation_order" placeholder="Enter navigation order" required>
                </div>
                <div class="form-group">
                    <label for="navigation_display">Navigation Display</label>
                    <select name="navigation_display" class="form-control">
                      <option value="header">Header</option>
                      <option value="footer">Footer</option>
                      <option value="both">Both</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="navigation_target">Target Link</label>
                    <select name="navigation_target" class="form-control">
                      <option value="self">Self</option>
                      <option value="blank">Blank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="navigation_type">Navigation Type</label>
                    <select name="navigation_type" id="navigation_type" class="form-control">
                      <option value="single">Single</option>
                      <option value="multiple">Multiple</option>
                    </select>
                </div>
                <div class="form-group hide" id="custom_link_group">
                    <label for="custom_link">Custom Url</label>
                    <input type="text" class="form-control" id="custom_link" name="custom_link" placeholder="Enter custom url">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="custom_url" value="1">
                    <label class="custom-control-label" for="customSwitch1">Custom Link</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="navigation_status" value="1" checked>
                    <label class="custom-control-label" for="customSwitch2">Navigation Status</label>
                  </div>
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