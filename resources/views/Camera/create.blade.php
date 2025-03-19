<!DOCTYPE html>
<html lang="en">

<head>
    <title>Image Capture Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #5dade2;
        color: white;
        font-size: 22px;
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

    #camera {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    #captured-image {
        width: 100%;
        margin-top: 10px;
        display: none;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        Image Capture Form
                    </div>
                    <div class="card-body">
                        <form id="imageForm" method="POST" action="{{ route('store_data') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Person Name</label>
                                    <input type="text" class="form-control" name="person_name" id="person_name"
                                        placeholder="Enter person name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control" name="surname" id="surname"
                                        placeholder="Enter surname">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" name="dob" id="dob">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Contact No</label>
                                    <input type="number" class="form-control" name="contactno" id="contactno">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district" id="district">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"
                                        placeholder="Enter Address..."></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Capture Image</label>
                                    <video id="camra" autoplay></video>
                                    <button type="button" class="btn btn-success mt-2"
                                        id="capture-button">Capture</button>
                                    <canvas id="captured-image"></canvas>
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

    <script>
    const video = document.getElementById('camera');
    const canvas = document.getElementById('captured-image');
    const captureButton = document.getElementById('capture-button');

    // Start the camera
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(stream => video.srcObject = stream)
        .catch(err => console.error("Camera access error:", err));

    // Capture image
    captureButton.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        canvas.style.display = 'block';
        video.style.display = 'none';
    });

    // Form submission
    document.getElementById('imageForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const imageData = canvas.toDataURL('image/png');
        const formData = new FormData(this);
        formData.append('captured_image', imageData);

        fetch("http://127.0.0.1:8000/api/store_image", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                document.getElementById('imageForm').reset();
            })
            .catch(error => {
                alert("Error saving data!");
                console.error(error);
            });
    });
    </script>
</body>

</html>