<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Capacity Details</title>
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
                        Edit Capacity Details
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update', $capacity->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ $capacity->date }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Agronomist Name</label>
                                    <input type="text" class="form-control" name="agronomy_name"
                                        value="{{ $capacity->agronomy_name }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Activity</label>
                                    <select class="form-select" name="activity">
                                        <option value="activity1"
                                            {{ $capacity->activity == 'activity1' ? 'selected' : '' }}>Activity 1
                                        </option>
                                        <option value="activity2"
                                            {{ $capacity->activity == 'activity2' ? 'selected' : '' }}>Activity 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Audience</label>
                                    <select class="form-select" name="audience">
                                        <option value="audience1"
                                            {{ $capacity->audience == 'audience1' ? 'selected' : '' }}>Audience 1
                                        </option>
                                        <option value="audience2"
                                            {{ $capacity->audience == 'audience2' ? 'selected' : '' }}>Audience 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Topic Name</label>
                                    <input type="text" class="form-control" name="topic_name"
                                        value="{{ $capacity->topic_name }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-select" name="state">
                                        <option value="state1" {{ $capacity->state == 'state1' ? 'selected' : '' }}>
                                            State 1</option>
                                        <option value="state2" {{ $capacity->state == 'state2' ? 'selected' : '' }}>
                                            State 2</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">District</label>
                                    <select class="form-select" name="district">
                                        <option value="district1"
                                            {{ $capacity->district == 'district1' ? 'selected' : '' }}>District 1
                                        </option>
                                        <option value="district2"
                                            {{ $capacity->district == 'district2' ? 'selected' : '' }}>District 2
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mandal / Taluk</label>
                                    <input type="text" class="form-control" name="mandal_taluk"
                                        value="{{ $capacity->mandal_taluk }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location"
                                        value="{{ $capacity->location }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Participants</label>
                                    <input type="number" class="form-control" name="participant"
                                        value="{{ $capacity->participant }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Remarks</label>
                                    <input type="text" class="form-control" name="remarks"
                                        value="{{ $capacity->remarks }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Upload File</label>
                                    <input type="file" class="form-control" name="upload_file">
                                    @if($capacity->upload_file)
                                    <p>Current File: <a href="{{ asset('storage/' . $capacity->upload_file) }}"
                                            target="_blank">View</a></p>
                                    @endif
                                </div>



                                <div class="col-md-6">
                                    <label class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" name="upload_photo">
                                    @if($capacity->upload_photo)
                                    <p>Current Photo: <img src="{{ asset('storage/' . $capacity->upload_photo) }}"
                                            width="100"></p>
                                    @endif
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
    <!-- <script>
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


 onchange="validateImageUpload()"
    });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>