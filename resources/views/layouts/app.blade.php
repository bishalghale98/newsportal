<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />

    {{-- company index file --}}
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    {{-- company index file end --}}


    {{-- post  --}}
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">


</head>

<body>

    {{-- sweet alert --}}
    @include('sweetalert::alert')
    {{-- sweet alert end --}}


    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>

                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <i data-feather="settings"></i>
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">

                {{-- side bar import --}}
                <x-admin-sidebar />
            </div>
            <!-- Main Content -->
            <div class="main-content">

                {{-- import dashboard --}}
                {{ $slot }}

                {{-- side bar setting --}}
                <x-admin-sidebar-setting />


            </div>


            <footer class="main-footer">

                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>

                <div class="footer-right">
                </div>

            </footer>


        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>

    {{-- company index js file --}}
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/datatables.js"></script>

    {{-- post page  --}}
    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>




    {{-- confirm delete pop up --}}

    <!-- Include SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- Confirm Delete --}}
    <script>
        $(document).on('click', 'a[data-confirm-delete]', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var token = '{{ csrf_token() }}';
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            '_token': token
                        },
                        success: function(data) {
                            window.location.replace(window.location.href)
                        },
                        error: function(data) {
                            console.warn(data);
                            window.location.replace(window.location.href)
                        }
                    });
                }
            });
        });
    </script>

    {{-- confirm delete pop up end --}}





</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
