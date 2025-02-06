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
              <div class="col-sm-6"><h3 class="mb-0">Page List</h3></div>
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
                    <a href="<?php echo admin_url('add_page/'); ?>" class="btn btn-primary">Add Page</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered dtr-inline">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Component</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>    
                        <?php if(!empty($pages)) { ?>              
                        <?php foreach ($pages as $page) { ?>              
                        <tr class="odd">
                          <td><?php echo $page->id;?></td>
                          <td><?php echo $page->page_title;?></td>
                          <td><?php echo $page->page_slug;?></td>
                          <td></td>
                          <td>
                            <?php if ($page->page_status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="<?php echo admin_url('edit_page/' . $page->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?php echo admin_url('delete_page/' . $page->id); ?>" onclick="return confirm('Are you sure you want to delete this page?');" class="btn btn-sm btn-danger">Delete</a>
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