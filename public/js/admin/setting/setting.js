$(document).ready(function () {
    $(".description").summernote({
        height: 300,
    });
    // Multiple Select
    $(".multiple-days").select2({
        placeholder: "Please Select the days",
        allowClear: true,
    });

    // Initialize selected days array
    let selectedDays = [];

    // Function to update dropdown options
    function updateDropdownOptions() {
        $(".multiple-days").each(function () {
            // Get the current select element
            const $select = $(this);

            // Get its selected values
            const currentSelection = $select.val() || [];

            // Reset its options
            $select.find("option").prop("disabled", false);

            // Disable already selected values
            selectedDays.forEach((day) => {
                if (!currentSelection.includes(day)) {
                    $select
                        .find(`option[value="${day}"]`)
                        .prop("disabled", true);
                }
            });

            // Refresh the Select2 dropdown (if applicable)
            if ($select.hasClass("select2-hidden-accessible")) {
                $select.select2();
            }
        });
    }

    $(document).on("click", ".addMoreBtn", function () {
        $(".fetch-multiple-columns").append(`
            <div class="row fetchExtraColumn">
                    <div class="col-md-2">
                            <label for="" class="form-label">Days</label>
                            <select
                                multiple
                                class="form-select form-select-lg multiple-days"
                                name="days[]"
                            >
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
                            <label for="" class="form-label">Starting Time</label>
                            <input
                                type="time"
                                name="starting_time[]"
                                id=""
                                class="form-control"
                                placeholder=""
                                aria-describedby="helpId"
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Ending Time</label>
                            <input
                                type="time"
                                name="ending_time[]"
                                id=""
                                class="form-control"
                                placeholder=""
                                aria-describedby="helpId"
                            />
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="button" class="btn btn-primary addMoreBtn">Add More</button>
                            <button type="button" class="btn btn-danger removeColumnBtn">Remove</button>
                        </div>


                    </div>

        `);
        updateDropdownOptions();
        $(".multiple-days").select2({
            placeholder: "Please Select the days",
            allowClear: true,
        });
    });

    $(".fetch-multiple-columns").on("click", ".removeColumnBtn", function () {
        const $row = $(this).closest(".fetchExtraColumn");

        // Get the selected values from the row being removed
        const removedValues = $row.find(".multiple-days").val() || [];

        // Remove the row
        $row.remove();

        // Update the selectedDays array
        selectedDays = selectedDays.filter(
            (day) => !removedValues.includes(day)
        );

        // Update the dropdown options
        updateDropdownOptions();
    });

      // Track changes in select elements
      $(".fetch-multiple-columns").on("change", ".multiple-days", function () {
        // Update the selectedDays array
        selectedDays = [];

        $(".multiple-days").each(function () {
            const values = $(this).val() || [];
            selectedDays = selectedDays.concat(values);
        });

        // Update the dropdown options
        updateDropdownOptions();
    });
    

});
