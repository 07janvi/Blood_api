<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signature Form</title>
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        Signature Form
                    </div>
                    <div class="card-body">
                        <form id="signatureForm" method="POST" action="{{ route('store_signature') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Today's Date</label>
                                    <input type="date" class="form-control" id="date" name="date" readonly>
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
                                    <input type="number" class="form-control" name="contectno" id="contectno">
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

                                <div class="mb-3">
                                    <label class="form-label">Your Drawn Signature</label>
                                    <canvas id="signature-pad"></canvas>
                                    <button type="button" class="btn btn-warning mt-2"
                                        id="clear-signature">Clear</button>
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
        // Set today's date by default
        document.getElementById('date').value = new Date().toISOString().split('T')[0];

        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

        document.getElementById('clear-signature').addEventListener('click', () => signaturePad.clear());

        document.getElementById('signatureForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (signaturePad.isEmpty()) {
                alert('Please provide a signature!');
                return;
            }
            const signatureImage = signaturePad.toDataURL();
            const formData = new FormData(this);
            formData.append('signature', signatureImage);

            fetch("http://127.0.0.1:8000/api/store_signature", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    document.getElementById('signatureForm').reset();
                    signaturePad.clear();
                })
                .catch(error => {
                    alert("Error saving data!");
                    console.error(error);
                });
        });
    </script>
</body>

</html>