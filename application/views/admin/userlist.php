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
              <div class="col-sm-6"><h3 class="mb-0">Users</h3></div>
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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-user"><i class="bi bi-plus-lg"></i> Add User</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($users)) { ?>              
                        <?php foreach ($users as $user) { ?>              
                        <tr class="odd">
                          <td><?php echo $user->id;?></td>
                          <td><?php echo $user->name;?></td>
                          <td><?php echo $user->email;?></td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-user" onclick="editUser(<?php echo $user->id; ?>)">
                              Edit
                            </button>
                            <a href="<?php echo admin_url('delete_user/' . $user->id); ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-sm btn-danger">Delete</a>
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
      <div class="modal fade" id="modal-user" aria-modal="true" role="dialog">
        <div class="modal-dialog">
        <?php echo form_open(admin_url('users/'), ['id' => 'user_form']); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="edit-title hide">Edit User</h4>
              <h4 class="add-title">Add User</h4>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
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