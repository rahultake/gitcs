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
              <div class="col-sm-6"><h3 class="mb-0">Multilevel Navigations List <span class="badge badge-primary"><?php echo $navigation->navigation_name;?></span></h3></div>
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
                    <a href="<?php echo admin_url('navigation'); ?>" class="btn btn-primary"><i class="bi bi-skip-backward"></i> Go Back</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-navigation"><i class="bi bi-plus-lg"></i> Add Multilevel Navigation</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>SVG</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($multilevels)) { ?>              
                        <?php foreach ($multilevels as $multilevel) { ?>              
                        <tr class="odd">
                          <td><?php echo $multilevel->id;?></td>
                          <td><?php echo $multilevel->multilevel_name;?></td>
                          <td><?php echo $multilevel->multilevel_slug;?></td>
                          <td><?php echo $multilevel->multilevel_svg;?></td>
                          <td>
                            <?php if ($multilevel->multilevel_status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-navigation" onclick="editsubNavigation(<?php echo $multilevel->id; ?>)">
                              Edit
                            </button>
                            <a href="<?php echo admin_url('delete_sub_navigation/' . $multilevel->id); ?>" onclick="return confirm('Are you sure you want to delete this sub navigation?');" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                        <?php } else {?>
                          <tr class="odd"><td class="text-center" colspan="5">No data found</td></tr>
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
        <?php echo form_open(admin_url('multilevel_navigation/'.$navigation_id), ['id' => 'navigation_form']); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="edit-title hide">Edit Multilevel Navigation</h4>
              <h4 class="add-title">Add Multilevel Navigation</h4>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="multilevel_id" id="multilevel_id" value="">
                <div class="form-group">
                    <label for="name">Navigation Name</label>
                    <input type="text" class="form-control" id="multilevel_name" name="multilevel_name" placeholder="Enter navigation name" required>
                </div>
                <div class="form-group">
                    <label for="name">Navigation Order</label>
                    <input type="number" class="form-control" id="multilevel_order" name="multilevel_order" placeholder="Enter navigation order" required>
                </div>
                <div class="form-group">
                    <label for="multilevel_svg">SVG Code</label>
                    <textarea class="form-control" rows="3" name="multilevel_svg" id="multilevel_svg" placeholder="Enter SVG Code"></textarea>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="multilevel_status" value="1" checked>
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