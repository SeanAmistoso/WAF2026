<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $hike->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('locations.index') }}">
            Hiking Planner
        </a>

        <a href="{{ route('hikes.index') }}" class="btn btn-light">
            Back to Hikes
        </a>
    </div>
</nav>

<div class="container mt-4">

    <div class="card">

        <div class="card-body">

            <h1>{{ $hike->name }}</h1>

            <h5 class="text-muted">
                Location: {{ $hike->location->name }}
            </h5>

            <hr>

            <p>
                <strong>Difficulty:</strong>
                {{ $hike->difficulty }}
            </p>

            <p>
                <strong>Distance:</strong>
                {{ $hike->distance }} km
            </p>

            <p>
                <strong>Duration:</strong>
                {{ $hike->duration }}
            </p>

            <p>
                <strong>Description:</strong>
                {{ $hike->description ?? 'No description provided.' }}
            </p>

            <hr>

            <a href="{{ route('hikes.edit', $hike) }}"
               class="btn btn-warning">
                Edit Hike
            </a>

            <a href="{{ route('hikes.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>