@extends('Admin.layout.master')
@section('content')
    <style>
        <style>

        /* Match Select2 with Bootstrap's form-select */
        .select2-container .select2-selection--multiple {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            height: auto;
            background-color: #fff;
        }

        .select2-container .select2-selection--multiple .select2-selection__choice {
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            margin-right: 0.25rem;
        }

        .select2-container .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 0.25rem;
            cursor: pointer;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
            background-color: #0056b3;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 300px;
            /* Optional: Limit dropdown height */
            overflow-y: auto;
        }
    </style>

    </style>
    <div class="container-fluid">
        <div class="card p-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{ session()->get('success') }}</strong>
                </div>
                @endif @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <strong>{{ session()->get('error') }}</strong>
                    </div>
                @endif
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id=""
                                class="form-control @error('title') is-invalid @enderror" placeholder=""
                                value="{{ $setting->title ?? '' }}" aria-describedby="helpId" />
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" name="logo" id=""
                                class="form-control @error('logo') is-invalid @enderror" placeholder=""
                                aria-describedby="helpId" />
                            @error('logo')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror

                            @if ($setting->logo !== null)
                                <div>
                                    <img src="/storage/{{ $setting->logo }}" alt="" srcset="" width="100"
                                        height="100">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4 mt-3 mb-3">
                            <label for="" class="form-label">Contact</label>
                            <input type="number" name="contact" id=""
                                class="form-control @error('contact') is-invalid @enderror" placeholder=""
                                value="{{ $setting->contact ?? '' }}" aria-describedby="helpId" />
                            @error('contact')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4 mt-3 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" id=""
                                class="form-control @error('email') is-invalid @enderror" placeholder=""
                                value="{{ $setting->email ?? '' }}" aria-describedby="helpId" />
                            @error('email')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4 mt-3 mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" id=""
                                class="form-control @error('address') is-invalid @enderror" placeholder=""
                                value="{{ $setting->address ?? '' }}" aria-describedby="helpId" />
                            @error('address')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control description" name="description" id="" rows="3">{!! $setting->description ?? '' !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Work Description</label>
                            <textarea class="form-control description" name="work_description" id="" rows="3">{!! $setting->work_description ?? '' !!}</textarea>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">Facebook Url</label>
                            <input type="url" name="facebook_url" id=""
                                class="form-control @error('facebook_url') is-invalid @enderror" placeholder=""
                                value="{{ $setting->facebook_url ?? '' }}" aria-describedby="helpId" />
                            @error('facebook_url')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">GitHub Url</label>
                            <input type="url" name="github_url" id=""
                                class="form-control @error('github_url') is-invalid @enderror" placeholder=""
                                value="{{ $setting->github_url ?? '' }}" aria-describedby="helpId" />
                            @error('github_url')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Twitter Url</label>
                            <input type="url" name="twitter_url" id=""
                                class="form-control @error('twitter_url') is-invalid @enderror" placeholder=""
                                value="{{ $setting->twitter_url }}" aria-describedby="helpId" />
                            @error('twitter_url')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Instagram Url</label>
                            <input type="url" name="instagram_url" id=""
                                value="{{ $setting->instagram_url ?? '' }}"
                                class="form-control @error('instagram_url') is-invalid @enderror" placeholder=""
                                aria-describedby="helpId" />
                            @error('instagram_url')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-4 fetch-multiple-columns">

                            <h4 class="mt-3 mb-3">Working Hour</h4>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="" class="form-label">Days</label>
                                    <select multiple class="form-select p-4 form-select-lg multiple-days"
                                        id="select-days-data" name="days[]" id="multiple-days">
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thrusday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Starting Date</label>
                                    <input type="time" name="starting_time" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Ending Date</label>
                                    <input type="time" name="ending_time" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="button" class="btn btn-primary addMoreBtn">Add More</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            @foreach ($workingHours as $workingHour)
                                <div class="col-md-12">
                                    <div class="working-hour-entry">
                                        @php
                                            $daysArray = json_decode($workingHour->days, true); // Decode JSON to array
                                        @endphp

                                        @if (is_array($daysArray))
                                            <span><strong>Days:</strong> {{ implode(', ', $daysArray) }}</span><br>
                                        @else
                                            <span><strong>Days:</strong> {{ $workingHour->days }}</span><br>
                                        @endif

                                        <span><strong>Starting Time:</strong> {{ $workingHour->starting_time }}</span><br>
                                        <span><strong>Ending Time:</strong> {{ $workingHour->ending_time }}</span><br>

                                        <button type="button" class="btn btn-warning editBtn"
                                            data-id="{{ $workingHour->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger deleteBtn"
                                            data-id="{{ $workingHour->id }}">Delete</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <button class="btn btn-success mt-3 mb-3">Submit</button>
                </form>
        </div>

    </div>
    {{-- <script></script> --}}
@endsection
