<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hikes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('locations.index') }}">
            Hiking Planner
        </a>

        <div>
            <a href="{{ route('locations.index') }}" class="btn btn-light me-2">
                Locations
            </a>

            <a href="{{ route('hikes.create') }}" class="btn btn-light">
                Add Hike
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <h1 class="mb-4">Hikes</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($hikes->count())

        <div class="row">

            @foreach($hikes as $hike)

                <div class="col-md-4 mb-4">

                    <div class="card h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                {{ $hike->name }}
                            </h5>

                            <h6 class="card-subtitle mb-2 text-muted">
                                Location: {{ $hike->location->name }}
                            </h6>

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

                            <p class="card-text">
                                {{ $hike->description }}
                            </p>

                            <a href="{{ route('hikes.show', $hike) }}"
                               class="btn btn-success">
                                View
                            </a>

                            <a href="{{ route('hikes.edit', $hike) }}"
                               class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('hikes.destroy', $hike) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this hike?')">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">
            No hikes have been added yet.
        </div>

        <a href="{{ route('hikes.create') }}"
           class="btn btn-success">
            Add Your First Hike
        </a>

    @endif

</div>

</body>
</html>