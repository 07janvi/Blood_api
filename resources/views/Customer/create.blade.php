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
                        Customer Details Form
                    </div>
                    <!-- Form Fields -->

                    <div class="card-body">
                        <form id="mailForm" method="POST" action="{{ route('store_customer') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        placeholder="Enter agronomy name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Enter Email Id ">
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">Contact No</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="contect_no" id="contect_no"
                                            placeholder="Enter 10-digit number">
                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-select" id="state" name="state">
                                        <option value="">Select State</option>
                                        <option value="state1">State 1</option>
                                        <option value="state2">State 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <select class="form-select" id="district" name="district">
                                        <option value="">Select </option>
                                        <option value="district1">District 1</option>
                                        <option value="district2">District 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"
                                        placeholder="Enter Address..."></textarea>
                                </div>

                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-secondary me-2"
                                    onclick="window.location.reload()">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $("#mailForm").on("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("http://127.0.0.1:8000/api/store_customer", {
                method: "POST",
                body: formData,
            })
            // .then(response => response.json())
            // .then(data => {
            //     alert(data.message);
            //     if (data.image_url) {
            //         document.getElementById('imagePreview').src = data.image_url;
            //     }

            // })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                $("#mailForm")[0].reset();
            })
            .catch(error => {
                alert("Error saving data!");
                console.error(error);
            });
    });
    </script>

</body>

</html>