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
              <div class="col-sm-6"><h3 class="mb-0">Social Links</h3></div>
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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-social"><i class="bi bi-plus-lg"></i> Add New</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SVG</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($socials)) { ?>              
                        <?php foreach ($socials as $social) { ?>              
                        <tr class="odd">
                          <td><?php echo $social->id;?></td>
                          <td><?php echo $social->social_name;?></td>
                          <td><?php echo $social->social_svg;?></td>
                          <td>
                            <?php if ($social->social_status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-social" onclick="editSocial(<?php echo $social->id; ?>)">
                              Edit
                            </button>
                            <a href="<?php echo admin_url('delete_social/' . $social->id); ?>" onclick="return confirm('Are you sure you want to delete this social link?');" class="btn btn-sm btn-danger">Delete</a>
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
      <div class="modal fade" id="modal-social" aria-modal="true" role="dialog">
        <div class="modal-dialog">
        <?php echo form_open(admin_url('social/'), ['id' => 'social_form']); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="edit-title hide">Edit Social Link</h4>
              <h4 class="add-title">Add Social Link</h4>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="social_id" id="social_id" value="">
                <div class="form-group">
                    <label for="social_name">Name</label>
                    <input type="text" class="form-control" id="social_name" name="social_name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="social_svg">SVG Code <a href="https://icons.getbootstrap.com/" class="badge badge-success" target="_blank">Bootstrap Icons</a></label>
                    <input type="text" class="form-control" id="social_svg" name="social_svg" placeholder="Enter svg code">
                </div>
                <div class="form-group">
                    <label for="social_target">Target</label>
                    <select name="social_target" id="social_target" class="form-control">
                      <option value="self">Self</option>
                      <option value="blank">Blank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="social_url">URL</label>
                    <input type="text" class="form-control" id="social_url" name="social_url" placeholder="Enter url">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="social_status" value="1" checked>
                    <label class="custom-control-label" for="customSwitch2">Social Status</label>
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