<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gitcs Admin | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Gitcs Admin" />
    <meta
      name="description"
      content=""
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php echo base_url('plugins/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-4.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('plugins/toastr.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/adminlte.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
  </head>
  <!--end::Head-->
    <!--begin::Body-->
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <!-- Display user's name or email -->
                    <span class="d-none d-md-inline">
                        <?php echo $this->session->userdata('name') ? $this->session->userdata('name') : $this->session->userdata('email'); ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::Menu Footer-->
                    <li class="user-footer text-center">
                        <a href="<?php echo admin_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <span class="brand-text fw-light">Gitcs Admin</span>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="<?php echo admin_url(''); ?>" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo admin_url('users'); ?>" class="nav-link">
                  <i class="nav-icon bi bi-clipboard-fill"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Navigation
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="box-sizing: border-box; display: none;">
                  <li class="nav-item">
                    <a href="<?php echo admin_url('navigation'); ?>" class="nav-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 3v6m10 7l4-4l-4-4"></path><path d="M6 21v-6a3 3 0 0 1 3-3h11"></path></g></svg>
                      <p>Manage Navigation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo admin_url('header'); ?>" class="nav-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 3v6m10 7l4-4l-4-4"></path><path d="M6 21v-6a3 3 0 0 1 3-3h11"></path></g></svg>
                      <p>Header Navigation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo admin_url('footer'); ?>" class="nav-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 3v6m10 7l4-4l-4-4"></path><path d="M6 21v-6a3 3 0 0 1 3-3h11"></path></g></svg>
                      <p>Footer Navigation</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Pages
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="box-sizing: border-box; display: none;">
                  <li class="nav-item">
                    <a href="<?php echo admin_url('pages'); ?>" class="nav-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 3v6m10 7l4-4l-4-4"></path><path d="M6 21v-6a3 3 0 0 1 3-3h11"></path></g></svg>
                      <p>Page Manage</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo admin_url('components'); ?>" class="nav-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 3v6m10 7l4-4l-4-4"></path><path d="M6 21v-6a3 3 0 0 1 3-3h11"></path></g></svg>
                      <p>Component Manage</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->