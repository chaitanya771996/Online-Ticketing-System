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
                        <li class="breadcrumb-item active" aria-current="page">Bookings</li>
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
                            <h3 class="card-title">View Bookings</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Event</th>
                                        <th>Tickets Booked</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->event->id }}</td>
                                        <td>{{ $booking->event->title }}</td>
                                        <td>{{ $booking->tickets_booked }}</td>
                                        <td>{{ $booking->event->event_date }}</td>
                                        <td>
                                            <span class="badge {{ $booking->event->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($booking->event->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('bookings.show', $booking) }}" class="btn btn-info btn-sm">View Details</a>
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