@if (Route::currentRouteName() == 'admin.user')
<button type="button" class="btn btn-info resetUserBtn"  data-bs-toggle="modal"  data-id="{{ $data->id }}">Reset Password</button>
<button type="button" class="btn btn-warning editUserButton"  data-bs-toggle="modal" data-action="edit" data-bs-target="#staticBackdrop" data-id="{{ $data->id }}">Edit</button>
{{-- <button type="button" class="btn btn-secondary open-modal-btn"  data-bs-toggle="modal" data-action="detail" data-bs-target="#detailModal" data-id="{{ $data->id }}">Detail</button> --}}
 <button type="button" class="btn btn-danger deleteData" data-bs-toggle="modal" data-action="delete" data-bs-target="#deleteModal" data-id="{{ $data->id }}">Delete</button>
@else
<button type="button" class="btn btn-warning editUserButton"  data-bs-toggle="modal" data-action="edit" data-bs-target="#staticBackdrop" data-id="{{ $data->id }}">Edit</button>
{{-- <button type="button" class="btn btn-secondary open-modal-btn"  data-bs-toggle="modal" data-action="detail" data-bs-target="#detailModal" data-id="{{ $data->id }}">Detail</button> --}}
 <button type="button" class="btn btn-danger deleteData" data-bs-toggle="modal" data-action="delete" data-bs-target="#deleteModal" data-id="{{ $data->id }}">Delete</button>
@endif
