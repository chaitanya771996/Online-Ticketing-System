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
                            <table class="table">
                                <tr>
                                    <th>Event</th>
                                    <td>{{ $booking->event->title }}</td>
                                </tr>
                                <tr>
                                    <th>Tickets Booked</th>
                                    <td>{{ $booking->tickets_booked }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $booking->event->event_date }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $booking->event->location }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ ucfirst($booking->event->status) }}</td>
                                </tr>
                            </table>

                            <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back to My Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer_section')

