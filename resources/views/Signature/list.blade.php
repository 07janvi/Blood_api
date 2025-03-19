<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signature Details</title>
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
        padding: 10px 15px;
    }

    table img {
        border-radius: 10px;
    }

    .table-responsive {
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-5">
                    <h3 class="text-center text-primary">Signature List</h3>
                    <table class="table table-striped table-hover table-bordered text-center">
                        <a href="{{ route('signature_view') }}" class="btn btn-info btn-sm" target="_blank">Add
                            Details</a>
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Today's Date</th>
                                <th>Person Name</th>
                                <th>Surname</th>
                                <th>Birth Date</th>
                                <th>Contect No</th>
                                <th>State</th>
                                <th>District</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($signature as $data)
                            <tr>
                                <th>{{ $data->id }}</th>
                                <th>{{ $data->date }}</th>
                                <th>{{ $data->person_name }}</th>
                                <th>{{ $data->surname }}</th>
                                <th>{{ $data->dob }}</th>
                                <th>{{ $data->contectno}}</th>
                                <th>{{ $data->state}}</th>
                                <th>{{ $data->district}}</th>
                                <td>
                                    <a href="{{ route('signature_edit', $data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('signature_delete', $data->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-info btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Capacity List Table -->


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

</body>

</html>