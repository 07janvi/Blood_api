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
                        <form id="signatureForm" method="POST" action="{{ route('signature_update', $signature->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Today's Date</label>
                                    <input type="date" class="form-control" value="{{ $signature->date }}" id="date"
                                        name="date" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Person Name</label>
                                    <input type="text" class="form-control" name="person_name"
                                        value="{{ $signature->person_name }}" id="person_name"
                                        placeholder="Enter person name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control" name="surname"
                                        value="{{ $signature->surname }}" id="surname" placeholder="Enter surname">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" value="{{ $signature->dob }}" name="dob"
                                        id="dob">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Contact No</label>
                                    <input type="number" class="form-control" name="contectno"
                                        value="{{ $signature->contectno }}" id="contectno">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" value="{{ $signature->state }}" name="state"
                                        id="state">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district"
                                        value="{{ $signature->district }}" id="district">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"
                                        placeholder="Enter Address...">{{ $signature->address }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Signature</label>

                                    <!-- Show old signature if available -->
                                    @if($signature->signature)
                                    <img id="existing-signature" src="{{ asset('storage/' . $signature->signature) }}"
                                        alt="Signature"
                                        style="max-width: 200px; border: 1px solid #ddd; border-radius: 10px;" />
                                    @else
                                    <p>No signature available</p>
                                    @endif

                                    <!-- Canvas for new signature -->
                                    <canvas id="signature-pad"
                                        style="border: 1px solid #ddd; border-radius: 5px; width: 100%; height: 200px;"></canvas>
                                    <button type="button" class="btn btn-warning mt-2"
                                        id="clear-signature">Clear</button>

                                    <!-- Hidden field to hold the new signature data -->
                                    <input type="hidden" name="signature" id="signature-data">
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
    const canvas = document.getElementById('signature-pad');
    const clearButton = document.getElementById('clear-signature');
    const signatureData = document.getElementById('signature-data');
    const existingSignature = document.getElementById('existing-signature');
    const ctx = canvas.getContext('2d');

    // Resize canvas to match container
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    let drawing = false;

    // Start drawing
    canvas.addEventListener('mousedown', () => (drawing = true));
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', () => {
        drawing = false;
        ctx.beginPath();

        // Store the drawn signature as base64
        signatureData.value = canvas.toDataURL('image/png');

        // Hide old signature if a new one is drawn
        if (existingSignature) existingSignature.style.display = 'none';
    });

    // Drawing function
    function draw(e) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';

        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    }

    // Clear button
    clearButton.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        signatureData.value = '';
        if (existingSignature) existingSignature.style.display = 'block';
    });
    </script>
</body>

</html>