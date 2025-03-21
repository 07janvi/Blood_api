<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Details Form</title>
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
                        {{ isset($customer) ? 'Edit Customer Details' : 'Customer Details Form' }}
                    </div>

                    <!-- Form Fields -->
                    <div class="card-body">
                        <form id="mailForm" method="POST"
                            action="{{ isset($customer) ? route('update_customer', $customer->id) : route('store_customer') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($customer))
                            @method('PUT')
                            @endif

                            <div class="row g-3">

                                <!-- Customer Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        value="{{ old('customer_name', $customer->customer_name ?? '') }}"
                                        placeholder="Enter customer name">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $customer->email ?? '') }}" placeholder="Enter Email Id">
                                </div>

                                <!-- Contact No -->
                                <div class="col-md-6">
                                    <label class="form-label">Contact No</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="contect_no" id="contect_no"
                                            value="{{ old('contect_no', $customer->contect_no ?? '') }}"
                                            placeholder="Enter 10-digit number">
                                    </div>
                                </div>

                                <!-- State -->
                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-select" id="state" name="state">
                                        <option value="">Select State</option>
                                        <option value="state1"
                                            {{ (isset($customer) && $customer->state == 'state1') ? 'selected' : '' }}>
                                            State 1</option>
                                        <option value="state2"
                                            {{ (isset($customer) && $customer->state == 'state2') ? 'selected' : '' }}>
                                            State 2</option>
                                    </select>
                                </div>

                                <!-- District -->
                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <select class="form-select" id="district" name="district">
                                        <option value="">Select </option>
                                        <option value="district1"
                                            {{ (isset($customer) && $customer->district == 'district1') ? 'selected' : '' }}>
                                            District 1</option>
                                        <option value="district2"
                                            {{ (isset($customer) && $customer->district == 'district2') ? 'selected' : '' }}>
                                            District 2</option>
                                    </select>
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"
                                        placeholder="Enter Address...">{{ old('address', $customer->address ?? '') }}</textarea>
                                </div>

                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-secondary me-2"
                                    onclick="window.location.reload()">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($customer) ? 'Update' : 'Save' }}
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>