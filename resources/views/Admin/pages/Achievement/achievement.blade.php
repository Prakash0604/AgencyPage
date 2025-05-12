@extends('Admin.layout.master')
@section('content')
    <div class="container-fluid">
        <button class="btn btn-primary" id="addAchievementBtn">Add Achievement</button>
        @include('Admin.pages.Achievement.achievementModal')
        <div
            class="table-responsive mt-4"
        >
            <table
                class="table table-bordered table-striped"
                id="fetch-achievement-data"
            >
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Image Icon</th>
                        <th scope="col">Title</th>
                        <th scope="col">Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
@endsection