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
                                <h4 class="mb-sm-0">KYC</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create Kyc</h4>
                                    <form class="needs-validation" method="POST" enctype="multipart/form-data" action="{{ route('post-add-kyc') }}">
                                        @csrf


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first_name" required>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Last name" name="last_name" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Father Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Father name" name="father_name" required>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Mobile number</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Mobile number" name="phone_number" required>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Qualification</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Qualification" name="qualification" required>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Special Education</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="special education" name="special_education" required>
                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <label class="form-label">Select work categry</label>

                                                    <select class="form-select" name="category_id" id="category" required="true" aria-label="Default select example">
                                                    <option value="" selected>Select Category</option>

                                                    @foreach ($category as $categoryData)
                                                        <option value="{{ $categoryData->id }}"> {{ $categoryData->category_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                    <label class="form-label">Select work subcategry</label>

                                                    <select class="form-select" name="subcategory_id" id="subcategory" required="true" aria-label="Default select example">
                                                    <option value="">Select Subcategory</option>

                                                    </select>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Email Id</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="email id" name="email_id" required>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Select id proof categry</label>

                                                    <select class="form-select" name="id_proof" required="true" aria-label="Default select example">
                                                        <option value="" selected>Select</option>
                                                        <option value="Aadhaar Card">Aadhaar Card</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Driving licence">Driving licence</option>
                                                        <option value="Voter ID">Voter ID</option>
                                                        <option value="PAN Card">PAN Card</option>
                                                        <option value="other">other</option>
                                                    </select>

                                                </div>

                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Id Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Id Number" name="id_number" required>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Select State</label>

                                                    <select class="form-select" name="state_id" id="state" required="true" aria-label="Default select example">
                                                        <option value="">Select</option>

                                                        @foreach ($states as $stateData)
                                                        <option value="{{ $stateData->id }}"> {{ $stateData->name }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Select City</label>

                                                    <select class="form-select" name="city_id" id="city" required="true" aria-label="Default select example">

                                                        <option value="">Select</option>

                                                    </select>

                                                </div>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Address" name="address" required>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="pincode" name="pincode" required>
                                                </div>

                                            </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary" type="submit">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->

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

    <script>
        $('#state').on('change', e => {
            $('#city').empty()
            $.ajax({
                url: `getCities/${e.target.value}`,
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                success: data => {
                    $('#city').append(`<option value="">Select</option>`)

                    data.data.forEach(city =>
                        $('#city').append(`<option value="${city.id}">${city.city}</option>`)
                    )
                }
            })
        })
        $('#category').on('change', e => {
            $('#subcategory').empty()
            $.ajax({
                url: `getSubcategory/${e.target.value}`,
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                success: data => {
                    $('#subcategory').append(`<option value="">Select Subcategory</option>`)

                    data.data.forEach(city =>
                        $('#subcategory').append(`<option value="${city.id}">${city.subcategory_name}</option>`)
                    )
                }
            })
        })
    </script>

    @include('admin.utils.notification')
</body>

</html>
