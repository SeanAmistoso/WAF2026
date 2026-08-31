<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hiking Locations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('locations.index') }}">
            Hiking Planner
        </a>

        <a href="{{ route('locations.create') }}" class="btn btn-light">
            Add Location
        </a>
    </div>
</nav>

<div class="container mt-4">

    <h1 class="mb-4">Hiking Locations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($locations->count())

        <div class="row">

            @foreach($locations as $location)

                <div class="col-md-4 mb-4">

                    <div class="card h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                {{ $location->name }}
                            </h5>

                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $location->county }}
                            </h6>

                            <p class="card-text">
                                {{ $location->description }}
                            </p>

                            <a href="{{ route('locations.show', $location) }}"
                               class="btn btn-success">
                                View
                            </a>

                            <a href="{{ route('locations.edit', $location) }}"
                               class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('locations.destroy', $location) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this location?')">
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
            No hiking locations have been added yet.
        </div>

        <a href="{{ route('locations.create') }}" class="btn btn-success">
            Add Your First Location
        </a>

    @endif

</div>

</body>
</html>