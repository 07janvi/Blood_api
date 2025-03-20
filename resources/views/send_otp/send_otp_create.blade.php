<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send Otp Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
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

    #signature-pad {
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        height: 200px;
    }

    #sendOtpBtn:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        Send Otp Form
                    </div>
                    <div class="card-body">
                        <form id="otpForm" method="POST" action="{{ route('storesendotp') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Today's Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>

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
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="contactno" id="contactno"
                                            placeholder="Enter 10-digit number">
                                        <button type="button" class="btn btn-warning" id="sendOtpBtn">Send OTP</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Enter OTP</label>
                                    <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district" id="district">
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
    <script>
    const sendOtpButton = document.getElementById('sendOtpBtn');
    const contactInput = document.getElementById('contactno');
    const otpInput = document.getElementById('otp');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    sendOtpButton.addEventListener('click', () => {
        const number = contactInput.value;
        if (number.length === 10) {
            fetch('/api/send-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        number
                    })
                })
                .then(res => res.json())
                .then(data => alert(data.message))
                .catch(() => alert('Failed to send OTP'));
        } else alert('Please enter a valid 10-digit number.');
    });

    otpInput.addEventListener('input', () => {
        if (otpInput.value.length === 4) {
            fetch('/api/verify-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        otp: otpInput.value
                    })
                })
                .then(res => res.json())
                .then(data => submitButton.disabled = !data.success);
        }
    });

    $(document).ready(function() {
        $("#otpForm").on("submit", function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("http://127.0.0.1:8000/api/storesendotp", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    $("#otpForm")[0].reset();
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