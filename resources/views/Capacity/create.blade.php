<!DOCTYPE html>
<html lang="en">

<head>
    <title>capacity Details Form</title>
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
                        capacity Details Form
                    </div>

                    <!-- Form Fields -->

                    <div class="card-body">
                        <form id="capacityForm" method="POST" action="{{ route('store_capacity') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Agronomist Name</label>
                                    <input type="text" class="form-control" name="agronomy_name" id="agronomy_name"
                                        placeholder="Enter agronomy name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Activity</label>
                                    <select class="form-select" id="activity" name="activity">
                                        <option value="">Select Activity</option>
                                        <option value="activity1">Activity 1</option>
                                        <option value="activity2">Activity 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Audience</label>
                                    <select class="form-select" id="audience" name="audience">
                                        <option value="">Select Audience</option>
                                        <option value="audience1">Audience 1</option>
                                        <option value="audience1">Audience 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Topic Name</label>
                                    <input type="text" class="form-control" name="topic_name" id="topic_name"
                                        placeholder="Enter topic name">
                                </div>

                                <div class="col-md-6">
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
                                        <option value="">Select District</option>
                                        <option value="district1">District 1</option>
                                        <option value="district2">District 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mandal / Taluk</label>
                                    <input type="text" class="form-control" name="mandal_taluk" id="mandal_taluk"
                                        placeholder="Enter Mandal / Taluk">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        placeholder="Enter Location">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Participants</label>
                                    <input type="number" class="form-control" name="participant" id="participant"
                                        placeholder="Enter Participants">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" id="remarks"
                                        placeholder="Enter Remarks">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Upload File</label>
                                    <input type="file" class="form-control" name="upload_file" id="upload_file"
                                        accept=".xls,.xlsx,.csv" onchange="validateFile()">
                                    <small id="fileError" style="color: red; display: none;">Please upload only .xls,
                                        .xlsx, or .csv files.</small>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" name="upload_photo" id="upload_photo"
                                        accept="image/*" onchange="validateImage()">
                                    <small id="photoError" style="color: red; display: none;">Please upload only image
                                        files (.jpg, .jpeg, .png, .gif, .webp).</small>
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
    function validateImage() {
        let fileInput = document.getElementById('upload_photo');
        let filePath = fileInput.value;
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;
        let errorMsg = document.getElementById('photoError');

        if (!allowedExtensions.exec(filePath)) {
            errorMsg.style.display = 'block';
            fileInput.value = ''; // Clear the file input
        } else {
            errorMsg.style.display = 'none';
        }
    }

    function validateFile() {
        let fileInput = document.getElementById('upload_file');
        let filePath = fileInput.value;
        let allowedExtensions = /(\.xls|\.xlsx|\.csv)$/i;
        let errorMsg = document.getElementById('fileError');

        if (!allowedExtensions.exec(filePath)) {
            errorMsg.style.display = 'block';
            fileInput.value = ''; // Clear the file input
        } else {
            errorMsg.style.display = 'none';
        }
    }
    $(document).ready(function() {
        document.getElementById('upload_photo').addEventListener('change', function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let imgPreview = document.getElementById('imagePreview');
                imgPreview.src = reader.result;
                imgPreview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });


        $("#capacityForm").on("submit", function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("http://127.0.0.1:8000/api/store_capacity", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.image_url) {
                        document.getElementById('imagePreview').src = data.image_url;
                    }

                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    $("#capacityForm")[0].reset();
                })
                .catch(error => {
                    alert("Error saving data!");
                    console.error(error);
                });

        });
    });
    </script>


</body>

</html>