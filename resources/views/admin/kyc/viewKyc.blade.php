<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('admin.common.header')
        @include('admin.common.leftbar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">View Kyc</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table responsive" style="width: 100%;">
                                        <thead>
                                            <tr>

                                                <th>id</th>
                                                <th>Created By</th>
                                                <th>First Name</th>
                                                <th>Last name</th>
                                                <th>Father Name</th>
                                                <th>Phone Number</th>
                                                <th>Qualification</th>
                                                <th>Special Education</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Email Id</th>
                                                <th>Id Proof</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kycs as $kycsData)

                                            <tr>
                                                <td> {{ $kycsData->id }} </td>
                                                <td> {{ $kycsData->created_by }} </td>
                                                <td> {{ $kycsData->first_name}} </td>
                                                <td> {{ $kycsData->last_name}} </td>
                                                <td> {{ $kycsData->father_name}} </td>
                                                <td> {{ $kycsData->phone_number}} </td>
                                                <td> {{ $kycsData->qualification}} </td>
                                                <td> {{ $kycsData->special_education}} </td>
                                                <td> {{ $kycsData->category_name}} </td>
                                                <td> {{ $kycsData->subcategory_name}} </td>
                                                <td> {{ $kycsData->email_id}} </td>
                                                <td> {{ $kycsData->id_proof}} - {{ $kycsData->id_number}} </td>
                                                <td> {{ $kycsData->state_name}}</td>
                                                <td> {{ $kycsData->cities_name}} </td>
                                                <td> {{ $kycsData->address}} </td>
                                                <td> {{ $kycsData->pincode}} </td>

                                                <td> {{ $kycsData->created_at->format('d/m/Y ')}} </td>
                                                <td> {{ $kycsData->updated_at->format('d/m/Y ')}} </td>


                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                         <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('admin.common.rightbar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>


    <!-- apexcharts -->
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="assets/js/pages/datatables.init.js"></script>

    @include('admin.utils.notification')
</body>

</html>
