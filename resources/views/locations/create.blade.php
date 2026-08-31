<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Hiking Location</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('locations.index') }}">
            Hiking Planner
        </a>

        <a href="{{ route('locations.index') }}" class="btn btn-light">
            Back to Locations
        </a>
    </div>
</nav>

<div class="container mt-4">

    <h1 class="mb-4">Add Hiking Location</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('locations.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">
                Location Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="county" class="form-label">
                County
            </label>

            <input
                type="text"
                name="county"
                id="county"
                class="form-control"
                value="{{ old('county') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                Description
            </label>

            <textarea
                name="description"
                id="description"
                class="form-control"
                rows="5"
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Save Location
        </button>

        <a href="{{ route('locations.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

</body>
</html>