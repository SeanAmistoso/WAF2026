<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Hike</title>

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

    <h1 class="mb-4">Add Hiking Route</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hikes.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Location</label>

            <select name="location_id" class="form-select">

                <option value="">Select a location</option>

                @foreach($locations as $location)
                    <option value="{{ $location->id }}"
                        {{ old('location_id') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }} - {{ $location->county }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Hike Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   placeholder="e.g. Bray Head Summit">
        </div>

        <div class="mb-3">

    <label class="form-label">Difficulty</label>

    <select name="difficulty" class="form-select">

        <option value="">Select difficulty</option>

        <option value="Easy">Easy</option>

        <option value="Moderate">Moderate</option>

        <option value="Difficult">Difficult</option>

    </select>

</div>

        <div class="mb-3">
            <label class="form-label">Distance (km)</label>

            <input type="number"
                   name="distance"
                   class="form-control"
                   value="{{ old('distance') }}"
                   step="0.01"
                   min="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Duration</label>

            <input type="text"
                   name="duration"
                   class="form-control"
                   value="{{ old('duration') }}"
                   placeholder="e.g. 2 hours">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4"
                      placeholder="Describe the hike">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Create Hike
        </button>

        <a href="{{ route('hikes.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

</body>
</html>