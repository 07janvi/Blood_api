<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captcha Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    body {
        background-color: #f0f8ff;
        font-family: 'Arial', sans-serif;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background-color: #4facfe;
        color: white;
        font-size: 20px;
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

    .captcha-container img {
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    #reloadCaptcha {
        cursor: pointer;
        color: #007bff;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        Captcha Form
                    </div>
                    <div class="card-body">
                        <form id="captchaForm" method="POST" action="{{ route('storecaptcha') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Person Name</label>
                                    <input type="text" class="form-control" name="person_name"
                                        placeholder="Enter person name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Enter surname"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Contact No</label>
                                    <input type="number" class="form-control" name="contactno"
                                        placeholder="Enter 10-digit number" pattern="[0-9]{10}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="3"
                                        placeholder="Enter Address..." required></textarea>
                                </div>
                                <!-- Captcha Section -->
                                <div class="col-md-6">
                                    <label class="form-label">Captcha</label>
                                    <div class="captcha-container d-flex align-items-center"
                                        style="gap: 10px; margin-bottom: 10px;">
                                        <span id="captchaText" style="font-weight: bold; font-size: 1.8rem; color: #555; letter-spacing: 5px; 
                   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4); 
                   transform: rotate(-5deg); user-select: none;">
                                            {{ $captcha }}
                                        </span>
                                        <button type="button" class="btn btn-outline-secondary" id="reloadCaptcha"
                                            style="height: 40px;">
                                            &#x21bb;
                                        </button>
                                    </div>
                                    <input type="text" class="form-control mt-2" name="captcha"
                                        placeholder="Enter Captcha" required>
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
    <script>
    // Reload Captcha
    document.getElementById('reloadCaptcha').addEventListener('click', function() {
        fetch('/reload-captcha', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                const captchaText = document.querySelector('#captchaText');
                captchaText.innerHTML = data.captcha;

                // Randomly tilt the new captcha
                const tilt = Math.random() * 10 - 5;
                captchaText.style.transform = `rotate(${tilt}deg)`;
            })
            .catch(error => console.error('Error:', error));
    });
    // Form Submission
    document.getElementById("captchaForm").addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch("/api/storecaptcha", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                document.getElementById("captchaForm").reset();
                window.location.reload();
            })
            .catch(error => {
                alert("Error saving data!");
                console.error(error);
            });
    });
    </script>

</body>

</html>