@include('header_section')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"></h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View Events</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('events.update', $event) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Date</label>
                                    <input type="datetime-local" name="event_date" id="event_date" class="form-control" value="{{ $event->event_date }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ticket_availability" class="form-label">Ticket Availability</label>
                                    <input type="number" name="ticket_availability" id="ticket_availability" class="form-control" value="{{ $event->ticket_availability }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer_section')

