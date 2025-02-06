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
              <div class="col-sm-6"><h3 class="mb-0">Component List</h3></div>
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
                    <a href="<?php echo admin_url('add_component/'); ?>" class="btn btn-primary">Add Component</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($components)) { ?>              
                        <?php foreach ($components as $component) { ?>              
                        <tr class="odd">
                          <td><?php echo $component->id;?></td>
                          <td><?php echo $component->component_name;?></td>
                          <td><img src="<?php echo base_url($component->component_icon); ?>" alt="Icon" width="40" height="40"></td>
                          <td>
                            <?php if ($component->component_status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="<?php echo admin_url('edit_component/' . $component->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?php echo admin_url('delete_component/' . $component->id); ?>" onclick="return confirm('Are you sure you want to delete this component?');" class="btn btn-sm btn-danger">Delete</a>
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
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->