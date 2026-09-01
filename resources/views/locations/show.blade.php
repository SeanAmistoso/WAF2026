<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $location->name }}</title>

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

    <div class="card">

        <div class="card-body">

            <h1 class="card-title">
                {{ $location->name }}
            </h1>

            <h5 class="text-muted mb-3">
                {{ $location->county }}
            </h5>

            <h5>Description</h5>

            <p class="card-text">
    {{ $location->description }}
</p>

<hr>

<h3>Hikes at this location</h3>

@if($location->hikes->count())

    <div class="row">

        @foreach($location->hikes as $hike)

            <div class="col-md-4 mb-3">

                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $hike->name }}
                        </h5>

                        <p class="card-text">
                            <strong>Difficulty:</strong>
                            {{ $hike->difficulty }}
                        </p>

                        <p class="card-text">
                            <strong>Distance:</strong>
                            {{ $hike->distance }} km
                        </p>

                        <p class="card-text">
                            <strong>Duration:</strong>
                            {{ $hike->duration }}
                        </p>

                        <a href="{{ route('hikes.show', $hike) }}"
                           class="btn btn-success">
                            View Hike
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="alert alert-info">
        No hikes have been added for this location yet.
    </div>

@endif

<hr>

<a href="{{ route('locations.edit', $location) }}"
               class="btn btn-warning">
                Edit Location
            </a>

            <a href="{{ route('locations.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>