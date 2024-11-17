@extends('Admin.index')
@section('content')
    <div class="container-fluid">
        <form id="updateSiteData">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Site Name</label>
                    <input type="text" name="sitename" id=""
                        class="form-control @error('sitename')is-invalid @enderror" placeholder=""  value="{{ $siteData }}"/>
                    @error('sitename')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Site Logo</label>
                    <input type="file" name="sitelogo" id=""
                        class="form-control @error('sitelogo')is-invalid @enderror" placeholder="" />
                    @error('sitelogo')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <label for="" class="form-label">Working Hour Description</label>
                    <textarea name="workingDescription" class="form-control workingDescription" id="" cols="30"
                        rows="10"></textarea>
                </div>

                <div class="row mt-3 mb-3">
                    <h4 class=" mt-3 mb-4 fetch-shedule-data">Office Shedule Time</h4>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-3">
                            <label for="" class="form-label">Starting Day</label>
                            <select class="form-select" name="starting_day[]" id="">

                                <option value="">Select one</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">End Day</label>
                            <select class="form-select" name="ending_day[]" id="">

                                <option value="">Select one</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="" class="form-label">Starting Time</label>
                            <input type="time" name="starting_time[]" id="" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label">Ending Time</label>
                            <input type="time" name="ending_time[]" id="" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="button" class="btn btn-primary mt-1 addMoreBtn">Add More</button>
                            <button type="button" class="btn btn-danger mt-1 removeBtn" disabled>Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".workingDescription").summernote();

            // Add More Button
            $(document).on("click", ".addMoreBtn", function() {
                let data = `
        <div class="row moreSheduleDataFetch mt-2 mb-2">
                        <div class="col-md-3">
                            <label for="" class="form-label">Starting Day</label>
                            <select class="form-select" name="starting_day[]" id="">

                                <option value="">Select one</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">End Day</label>
                            <select class="form-select" name="ending_day[]" id="">

                                <option value="">Select one</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="" class="form-label">Starting Time</label>
                            <input type="time" name="starting_time[]" id="" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label">Ending Time</label>
                            <input type="time" name="ending_time[]" id="" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="button" class="btn btn-primary mt-1 addMoreBtn">Add More</button>
                            <button type="button" class="btn btn-danger mt-1 removeBtn">Remove</button>
                        </div>
        </div>`;

                $(".fetch-shedule-data").append(data);
            });

            $(document).on("click", ".removeBtn", function() {
                $(this).closest(".moreSheduleDataFetch").remove();
            });


        })
    </script>
@endsection
