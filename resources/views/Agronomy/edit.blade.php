<!DOCTYPE html>
<html lang="en">

<head>
    <title>Farmer Details Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 18px;
        font-weight: bold;
        border-radius: 15px 15px 0 0;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
        padding: 10px 20px;
    }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        Farmer Details Form
                    </div>

                    <!-- Form Fields -->

                    <div class="card-body">
                        <form id="agronomyForm" method="POST" action="{{ route('agronomy_update', $agronomy->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Farmer Name</label>
                                    <input type="text" class="form-control" name="farmer_name" id="farmer_name"
                                        value="{{ $agronomy->farmer_name }}" placeholder=" Enter Farmer Name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number"
                                        value="{{ $agronomy->contact_number }}" maxlength="10"
                                        placeholder="Enter Contact Number">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-select" id="state" name="state">
                                        <option value="">Select State</option>
                                        <option value="state1" {{ $agronomy->state == 'state1' ? 'selected' : '' }}>
                                            State 1</option>
                                        <option value="state2" {{ $agronomy->state == 'state2' ? 'selected' : '' }}>
                                            State 2</option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <select class="form-select" id="district" name="district">
                                        <option value="">Select District</option>
                                        <option value="district1"
                                            {{ $agronomy->district == 'district1' ? 'selected' : '' }}>District 1
                                        </option>
                                        <option value="district2"
                                            {{ $agronomy->district == 'district2' ? 'selected' : '' }}>District 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mandal / Taluk</label>
                                    <input type="text" class="form-control" name="mandal_taluk" id="mandal_taluk"
                                        value="{{ $agronomy->mandal_taluk }}" placeholder="Enter Mandal / Taluk">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Village</label>
                                    <input type="text" class="form-control" name="village" id="village"
                                        value="{{ $agronomy->village }}" placeholder="Enter Village">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Crop</label>
                                    <select class="form-select" id="crop" name="crop">
                                        <option value="">Select Crop</option>
                                        <option value="crop1" {{ $agronomy->crop == 'crop1' ? 'selected' : '' }}>Crop 1
                                        </option>
                                        <option value="crop2" {{ $agronomy->crop == 'crop2' ? 'selected' : '' }}>Crop 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Area (in Ha)</label>
                                    <input type="number" class="form-control" name="area" id="area"
                                        value="{{ $agronomy->area }}" placeholder="Enter Area in Ha">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Type of MIS</label>
                                    <select class="form-select" id="mis_type" name="mis_type">
                                        <option value="">Select Type of MIS</option>
                                        <option value="mis1" {{ $agronomy->mis_type == 'mis1' ? 'selected' : '' }}>MIS 1
                                        </option>
                                        <option value="mis2" {{ $agronomy->mis_type == 'mis2' ? 'selected' : '' }}>MIS 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Crop Spacing</label>
                                    <select class="form-select" id="crop_spacing" name="crop_spacing">
                                        <option value="">Select Crop Spacing</option>
                                        <option value="spacing1"
                                            {{ $agronomy->crop_spacing == 'spacing1' ? 'selected' : '' }}>Spacing 1
                                        </option>
                                        <option value="spacing2"
                                            {{ $agronomy->crop_spacing == 'spacing2' ? 'selected' : '' }}>Spacing 2
                                        </option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Month & Year of Installation</label>
                                    <input type="date" class="form-control" id="installation_date"
                                        name="installation_date" value="{{ $agronomy->installation_date }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Month & Year of Planting</label>
                                    <input type="date" class="form-control" id="planting_date" name="planting_date"
                                        value="{{ $agronomy->planting_date }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Month & Year of Harvesting</label>
                                    <input type="date" class="form-control" id="harvesting_date" name="harvesting_date"
                                        value="{{ $agronomy->harvesting_date }}">
                                </div>

                                <hr>

                                <div class="row g-3">
                                    <div class="col-md-6 form-group mb-1">
                                        <label>Yield under drip In current Area</label>
                                        <input class="form-control" type="number" name="drip_current_area"
                                            id="drip_current_area" value="{{ $agronomy->drip_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Yield under drip Per Ha</label>
                                        <input class="form-control" type="number" name="drip_par" id="drip_par"
                                            value="{{ $agronomy->drip_par }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Expenditure in Current Area</label>
                                        <input class="form-control" type="number" name="expenditure_current_area"
                                            id="expenditure_current_area"
                                            value="{{ $agronomy->expenditure_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Expenditure Per Ha</label>
                                        <input class="form-control" type="number" name="expenditure_par"
                                            id="expenditure_par" value="{{ $agronomy->expenditure_par }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Income in Current Area</label>
                                        <input class="form-control" type="number" name="income_current_area"
                                            id="income_current_area" value="{{ $agronomy->income_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Income Per Ha</label>
                                        <input class="form-control" type="number" name="income_par" id="income_par"
                                            value="{{ $agronomy->income_par }}">
                                    </div>

                                    <!-- <div class="col-md-6 form-group mb-1">
                                        <label>Total Income Per Ha</label>
                                        <input class="form-control" type="number" name="Income_par" id="Income_par"
                                            value="{{ $agronomy->Income_par }}" readonly>
                                    </div> -->

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Net Profit in Current Area</label>
                                        <input class="form-control" type="number" name="profit_current_area"
                                            id="profit_current_area" value="{{ $agronomy->profit_current_area }}"
                                            readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Net Profit Per Ha</label>
                                        <input class="form-control" type="number" name="profit_par" id="profit_par"
                                            value="{{ $agronomy->profit_par }}" readonly>
                                    </div>
                                </div>

                                <hr>
                                <!-- section - b -->
                                <div class="row g-3">
                                    <div class="col-md-6 form-group mb-1">
                                        <label>Yield In current Area</label>
                                        <input class="form-control" type="number" name="yield_current_area"
                                            id="yield_current_area" value="{{ $agronomy->yield_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Yield Per Ha</label>
                                        <input class="form-control" type="number" name="yield_par" id="yield_par"
                                            value="{{ $agronomy->yield_par }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Expenditure in Current Area</label>
                                        <input class="form-control" type="number" name="e_current_area"
                                            id="e_current_area" value="{{ $agronomy->e_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Expenditure Per Ha</label>
                                        <input class="form-control" type="number" name="e_par" id="e_par"
                                            value="{{ $agronomy->e_par }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Income in Current Area</label>
                                        <input class="form-control" type="number" name="i_current_area"
                                            id="i_current_area" value="{{ $agronomy->i_current_area }}">
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Total Income Per Ha</label>
                                        <input class="form-control" type="number" name="i_par" id="i_par"
                                            value="{{ $agronomy->i_par }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Net Profit in Current Area</label>
                                        <input class="form-control" type="number" name="net_current_area"
                                            id="net_current_area" value="{{ $agronomy->net_current_area }}" readonly>
                                    </div>

                                    <div class="col-md-6 form-group mb-1">
                                        <label>Net Profit Per Ha</label>
                                        <input class="form-control" type="number" name="net_par" id="net_par"
                                            value="{{ $agronomy->net_par }}" readonly>
                                    </div>
                                </div>

                                <hr>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Additional Income with Drip in Current Area</label>
                                        <input type="number" class="form-control" name="income_drip_current_area"
                                            id="income_drip_current_area"
                                            value="{{ $agronomy->income_drip_current_area }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Additional Income with Drip Per Ha</label>
                                        <input type="number" class="form-control" name="income_drip_par"
                                            id="income_drip_par" value="{{ $agronomy->income_drip_par }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Farmers Feedback</label>
                                        <input type="text" class="form-control" name="farmer_feedback"
                                            id="farmer_feedback" value="{{ $agronomy->farmer_feedback }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Crop and Farmers Photos</label>
                                        <input type="file" class="form-control" name="crop_farmer_photos[]"
                                            id="crop_farmer_photos" accept="image/*" multiple required
                                            onchange="validateImageUpload()">
                                        <small class="text-muted">Please upload exactly 4 images.</small>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Success Story</label>
                                        <textarea class="form-control" name="success_story" id="success_story" rows="4"
                                            placeholder="Enter Success Story">{{ $agronomy->success_story }}</textarea>
                                    </div>
                                </div>


                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-secondary me-2"
                                        onclick="window.location.reload()">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    //upload image code to javascript
    function validateImageUpload() {
        const input = document.getElementById('crop_farmer_photos');
        const files = input.files;

        if (files.length !== 4) {
            alert('You must upload exactly 4 images.');
            input.value = ''; // Clear the input if incorrect number
        }
    }


    //1) count

    document.getElementById('drip_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('drip_par').value = result.toFixed(2); // Store result with 2 decimal places
    });
    //2)count

    document.getElementById('expenditure_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('expenditure_par').value = result.toFixed(
            2); // Store result with 2 decimal places
    });

    //3)count

    document.getElementById('income_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('Income_par').value = result.toFixed(2); // Store result with 2 decimal places
    });

    //4)count

    function calculateProfit() {
        let income = parseFloat(document.getElementById('income_current_area').value) || 0;
        let expenditure = parseFloat(document.getElementById('expenditure_current_area').value) || 0;
        let profit = income - expenditure; // Calculation: Income - Expenditure
        document.getElementById('profit_current_area').value = profit.toFixed(
            2); // Display result with 2 decimal places
    }

    document.getElementById('income_current_area').addEventListener('input', calculateProfit);
    document.getElementById('expenditure_current_area').addEventListener('input', calculateProfit);

    //5)count
    function calculateProfitPerHa() {
        let incomePerHa = parseFloat(document.getElementById('Income_par').value) || 0;
        let expenditurePerHa = parseFloat(document.getElementById('expenditure_par').value) || 0;
        let profitPerHa = incomePerHa - expenditurePerHa;

        document.getElementById('profit_par').value = profitPerHa.toFixed(2);
    }

    // Watching changes on Income and Expenditure fields
    document.getElementById('income_par').addEventListener('input', calculateProfitPerHa);
    document.getElementById('expenditure_par').addEventListener('input', calculateProfitPerHa);

    // If these values are set dynamically, we can trigger the calculation
    setInterval(calculateProfitPerHa, 1000);



    // section - b count

    //1)

    document.getElementById('yield_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('yield_par').value = result.toFixed(2); // Store result with 2 decimal places
    });

    // 2)

    document.getElementById('e_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('e_par').value = result.toFixed(2); // Store result with 2 decimal places
    });

    //3) 
    document.getElementById('i_current_area').addEventListener('input', function() {
        let A = parseFloat(this.value) || 0; // Get input value and convert to number
        let result = A * 2.47; // Perform calculation
        document.getElementById('i_par').value = result.toFixed(2); // Store result with 2 decimal places
    });

    //4)
    function calculatePro() {
        let income = parseFloat(document.getElementById('i_current_area').value) || 0;
        let expenditure = parseFloat(document.getElementById('e_current_area').value) || 0;
        let profit = income - expenditure; // Calculation: Income - Expenditure
        document.getElementById('net_current_area').value = profit.toFixed(
            2); // Display result with 2 decimal places
    }

    document.getElementById('i_current_area').addEventListener('input', calculatePro);
    document.getElementById('e_current_area').addEventListener('input', calculatePro);

    //5)
    function calculate() {
        let incomePerHa = parseFloat(document.getElementById('i_par').value) || 0;
        let expenditurePerHa = parseFloat(document.getElementById('e_par').value) || 0;
        let profitPerHa = incomePerHa - expenditurePerHa;

        document.getElementById('net_par').value = profitPerHa.toFixed(2);
    }

    // Watching changes on Income and Expenditure fields
    document.getElementById('i_par').addEventListener('input', calculate);
    document.getElementById('e_par').addEventListener('input', calculate);

    // If these values are set dynamically, we can trigger the calculation
    setInterval(calculate, 1000);


    // section 3 count
    // 1)
    function calculateIncomeDrip() {
        let profit = parseFloat(document.getElementById('profit_current_area').value) || 0;
        let netProfit = parseFloat(document.getElementById('net_current_area').value) || 0;
        let incomeDrip = profit - netProfit;

        document.getElementById('income_drip_current_area').value = incomeDrip.toFixed(2);
    }

    // Check for changes every 500ms (since readonly inputs don’t trigger events)
    setInterval(calculateIncomeDrip, 500);

    // Initial calculation on page load
    window.onload = calculateIncomeDrip;

    // 2)

    function calculatedrip() {
        let profit = parseFloat(document.getElementById('profit_par').value) || 0;
        let netProfit = parseFloat(document.getElementById('net_par').value) || 0;
        let incomeDrip = profit - netProfit;

        document.getElementById('income_drip_par').value = incomeDrip.toFixed(2);
    }

    // Check for changes every 500ms (since readonly inputs don’t trigger events)
    setInterval(calculatedrip, 500);

    // Initial calculation on page load
    window.onload = calculatedrip;



    // over here
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</body>

</html>