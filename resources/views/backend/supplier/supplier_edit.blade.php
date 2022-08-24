@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Supplier Page</h4><br><br>

                            <form id="myForm" method="POST" action="{{ route('supplier.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $supplier->id }}">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10  form-group">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $supplier->name }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="text" name="mobile_no"
                                            value="{{ $supplier->mobile_no }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $supplier->email }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $supplier->address }}">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Supplier">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('scripts')
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#myForm').validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            mobile_no: {
                                required: true,
                            },
                            email: {
                                required: true,
                            },
                            address: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: 'Please Enter Supplier Name',
                            },
                            mobile_no: {
                                required: 'Please Enter Supplier Mobile Numer',
                            },
                            email: {
                                required: 'Please Enter Supplier Email',
                            },
                            address: {
                                required: 'Please Enter Supplier Address',
                            },
                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        },
                    });
                });
            </script>
        @endsection
