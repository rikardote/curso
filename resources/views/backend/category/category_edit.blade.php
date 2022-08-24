@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Category Page</h4><br><br>

                            <form id="myForm" method="POST" enctype="multipart/form-data"
                                action="{{ route('category.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $category->name }}">
                                    </div>
                                </div>



                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Category Unit">

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
                        },
                        messages: {
                            name: {
                                required: 'Please Enter Category Name',
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
