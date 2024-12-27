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
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
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
                            @if(auth()->user()->role === 'organizer')
                                <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Tickets</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->event_date }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->ticket_availability }}</td>
                                        <td>
                                            <span class="badge {{ $event->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($event->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(auth()->user()->role === 'organizer')
                                            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>
                                            @else
                                                <form action="{{ route('bookings.store') }}" method="POST" style="display:inline;">
                                                    <!-- Trigger Modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookNowModal{{ $event->id }}">
                                                        Book Now
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="bookNowModal{{ $event->id }}" tabindex="-1" aria-labelledby="bookNowModalLabel{{ $event->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="bookNowModalLabel{{ $event->id }}">Book Tickets</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('bookings.store') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                        <div class="mb-3">
                                                                            <label for="ticketsQuantity{{ $event->id }}" class="form-label">Number of Tickets</label>
                                                                            <input type="number" class="form-control" id="ticketsQuantity{{ $event->id }}" name="tickets_quantity" min="1" max="{{ $event->tickets_available }}" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="ticketType{{ $event->id }}" class="form-label">Type of Tickets</label>
                                                                            <select name="ticketType" id="ticketType{{ $event->id }}" class="form-control">
                                                                                <option value="VIP">VIP</option>
                                                                                <option value="Regular">Regular</option>
                                                                                <option value="Early Bird">Early Bird</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="ticketPrice{{ $event->id }}" class="form-label">Ticket Prices</label>
                                                                            <input type="number" class="form-control" id="ticketPrice{{ $event->id }}" name="tickets_price" min="1" max="{{ $event->price }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Book</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer_section')