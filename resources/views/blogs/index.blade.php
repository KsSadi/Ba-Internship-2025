@extends('layouts.app')

@section('title', 'AdminLTE v4 | Blogs')

@section('breadcrumb-title', 'Blogs')

@push('styles')
    <!-- DataTables CSS (if not already included in your AdminLTE theme) -->
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

@endpush
@section('content')
    <div class="container-fluid">
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-12">
                @if(session('success'))
                    <div class="callout callout-info">
                        {{ session('success') }}
                    </div>
                @endif


            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-12">

                <!--end::Quick Example-->
                <!--begin::Input Group-->
                <div class="card card-success card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header"><div class="card-title">Blog List </div></div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add New Blog</a>

                        <table class="table table-striped table-bordered" id="blogsTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Data is loaded via AJAX -->
                            </tbody>
                        </table>

                    </div>

                    <!--end::Footer-->
                </div>

            </div>
            <!--end::Col-->
            <!--end::Col-->
        </div>
        <!--end::Row-->





    </div>
@endsection

@section('content')

    <table id="blogs-table" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th width="200px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Data is loaded via AJAX -->
        </tbody>
    </table>
@endsection



@push('scripts')
    <!-- jQuery (if not already loaded) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#blogsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('blogs.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'author', name: 'author'},
                    {data: 'category', name: 'category'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush
