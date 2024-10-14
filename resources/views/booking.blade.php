<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/slick/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('main/css/styles.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .details-content {
            display: flex;  
            justify-content: space-between;
            align-items: flex-start; /* Align items to the start */
            margin-top: 20px;
            min-height: 80vh; /* Ensure enough space for vertical centering */
        }

        .details-content img {
            max-width: 400px;
            height: auto;
            border-radius: 10px;
            margin-top: 10px; /* Space between button and image */
        }

        .details-content p {
            margin-top: 10px;
            font-size: 14px;
            color: #555; /* Description text color */
            text-align: center;
        }

        .property-details {
            margin-left: 20px;
            max-width: 600px;
            width: 100%;
        }

        .property-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .property-details table th,
        .property-details table td {
            padding: 10px;
            border: 1px solid #e5e7eb;
        }

        .property-details table th {
            background-color: #f3f4f6;
            font-weight: bold;
            text-align: left;
        }

        .property-details table td {
            background-color: #fff;
            text-align: left;
        }
    </style>
    <title>Tchao Tchao</title>
</head>
<body>
    <!-- header start -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="{{ route('home')}}" onclick="showSection('home')"> 
                    <img src="{{ asset('main/imgs/logo.png')}}" alt="Logo" />
                </a>
            </div>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <nav>
            <ul class="nav-links">
    <li class="nav-item">
        <a href="{{ route('rentals.create') }}" onclick="showSection('contact')">
            <button class="secondary">Envie de proposer</button>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home') }}" onclick="showSection('contacts')">
            <button class="btn">Besoin de rechercher</button>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home') }}" onclick="showSection('home')">Home</a>
    </li>
    <li class="nav-item">
        <a href="#howitswork" onclick="showSection('howitswork')">How It Works</a>
    </li>

    @if (Auth::check())
        <!-- Display the username as a link to the dashboard for authenticated users -->
        <li class="nav-item">
            <a href="{{ route('customer_dashboard') }}">{{ Auth::user()->name }}</a>
        </li>
    @else
        <!-- Display Registration and Login for guests -->
        <li class="nav-item">
            <a href="{{ route('showregister') }}" onclick="showSection('contact')">Registration</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('showlogin') }}" onclick="showSection('contacts')">Login</a>
        </li>
    @endif
</ul>


            </nav>
        </div>
    </header>
    <!-- header end -->

    <section id="details" class="details section" style="display: block;">
        <div class="container">
            <h1>Rental Details</h1>
            <div class="details-content">
            <div style="margin-top: 100px;">
                @auth
                <button type="button" class="btn" style="background-color: #51a6b3; color: white;" data-toggle="modal" data-target="#reserveModal">
                    Reserve This Rental
                </button>
                @else
                <a href="{{ route('showlogin') }}" class="btn" style="background-color: #51a6b3; color: white;">
                    Login to Reserve
                </a>
                @endauth
                    <img src="{{ asset('images/rentals/' . $rental->rental_property_pictures) }}" alt="{{ $rental->rental_name }}">
                    <p>{{ $rental->description }}</p>
                </div>

                <!-- Property details table -->
                <div class="property-details">
                    <h2>{{ $rental->rental_name }}</h2>
                    <table>
                        <tr>
                            <th colspan="4" style="text-align: left;">Property Details</th>
                        </tr>
                        <!-- Merged Basic Information Rows -->
                        <tr>
                            <td style="white-space: nowrap;">Price</td>
                            <td style="white-space: nowrap;">{{ $rental->each_person_price }} € / Per Person</td>
                            <td style="white-space: nowrap;">City</td>
                            <td style="white-space: nowrap;">{{ $rental->city->name }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Size</td>
                            <td style="white-space: nowrap;">{{ $rental->size_in_sqm }} m²</td>
                            <td style="white-space: nowrap;">Maximum People</td>
                            <td style="white-space: nowrap;">{{ $rental->max_people }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Category</td>
                            <td style="white-space: nowrap;">{{ $rental->rental_category }}</td>
                            <td style="white-space: nowrap;">Common Rooms</td>
                            <td style="white-space: nowrap;">{{ $rental->common_rooms }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Bedrooms</td>
                            <td style="white-space: nowrap;">{{ $rental->bedrooms }}</td>
                            <td style="white-space: nowrap;">Bathrooms</td>
                            <td style="white-space: nowrap;">{{ $rental->bathrooms }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Exterior</td>
                            <td style="white-space: nowrap;">{{ $rental->exterior }}</td>
                            <td style="white-space: nowrap;">Smoke Detector</td>
                            <td style="white-space: nowrap;">{{ $rental->smoke_detector ? 'Yes' : 'No' }}</td>
                        </tr>
                        <!-- Equipment Details Rows -->
                        <tr>
                            <td style="white-space: nowrap;">Baby Bed</td>
                            <td style="white-space: nowrap;">{{ $rental->baby_bed ? 'Yes' : 'No' }}</td>
                            <td style="white-space: nowrap;">Double Bed</td>
                            <td style="white-space: nowrap;">{{ $rental->double_bed ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Sofa Bed</td>
                            <td style="white-space: nowrap;">{{ $rental->sofa_bed ? 'Yes' : 'No' }}</td>
                            <td style="white-space: nowrap;">Duvets</td>
                            <td style="white-space: nowrap;">{{ $rental->duvets ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Pillows</td>
                            <td style="white-space: nowrap;">{{ $rental->pillows ? 'Yes' : 'No' }}</td>
                            <td style="white-space: nowrap;">Sheets</td>
                            <td style="white-space: nowrap;">{{ $rental->sheets ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Pillow Protectors</td>
                            <td style="white-space: nowrap;">{{ $rental->pillow_protectors ? 'Yes' : 'No' }}</td>
                            <td style="white-space: nowrap;">Shower</td>
                            <td style="white-space: nowrap;">{{ $rental->shower ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">Bath Towels</td>
                            <td style="white-space: nowrap;">{{ $rental->bath_towels ? 'Yes' : 'No' }}</td>
                            <td style="white-space: nowrap;">Hand Towels</td>
                            <td style="white-space: nowrap;">{{ $rental->hand_towels ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

   <!-- Large Modal for Reservation -->
<div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reserveModalLabel">Reserve This Rental</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reservationForm">
                    <div class="form-group">
                        <label for="numberOfPersons">Number of Persons</label>
                        <input type="number" class="form-control" id="numberOfPersons" required min="1" placeholder="Enter number of persons" />
                    </div>
                    <div class="form-group">
                        <label for="arrivalDate">Arrival Date</label>
                        <input type="date" class="form-control" id="arrivalDate" required />
                    </div>
                    <div class="form-group">
                        <label for="departureDate">Departure Date</label>
                        <input type="date" class="form-control" id="departureDate" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="checkoutForm" action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <!-- Hidden inputs to send reservation data -->
                    <input type="hidden" name="number_of_persons" id="hiddenNumberOfPersons">
                    <input type="hidden" name="arrival_date" id="hiddenArrivalDate">
                    <input type="hidden" name="departure_date" id="hiddenDepartureDate">
                    
                    <!-- Hidden inputs for property details -->
                    <input type="hidden" name="rental_name" id="hiddenRentalName" value="{{ $rental->rental_name }}">
                    <input type="hidden" name="rental_id" id="hiddenRentalID" value="{{ $rental->id }}">
                    <input type="hidden" name="each_person_price" id="hiddenEachPersonPrice" value="{{ $rental->each_person_price }}">
                    <input type="hidden" name="city" id="hiddenCity" value="{{ $rental->city->name }}">
                    
                    <button type="submit" class="btn btn-primary" id="proceedPaymentBtn">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#proceedPaymentBtn').on('click', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Get the reservation data from the form
            const numberOfPersons = $('#numberOfPersons').val();
            const arrivalDate = $('#arrivalDate').val();
            const departureDate = $('#departureDate').val();

            // Populate the hidden input fields with the reservation data
            $('#hiddenNumberOfPersons').val(numberOfPersons);
            $('#hiddenArrivalDate').val(arrivalDate);
            $('#hiddenDepartureDate').val(departureDate);

            // Submit the form to the checkout route
            $('#checkoutForm').submit();
        });
    });
</script>

</body>
</html>
