@extends('Admin.layout.master')
@section('content')
    <div class="container-fluid">
        <button class="btn btn-primary" id="addMachineBtn">Add Machine</button>
        @include('Admin.pages.Machine.machineModal')
        <div
            class="table-responsive mt-4"
        >
            <table
                class="table table-bordered table-striped"
                id="fetch-notice-data"
            >
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
@endsection