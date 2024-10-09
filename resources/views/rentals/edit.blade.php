@extends('layouts.customer_layout')

@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Rental Property</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Rentals</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Rental Property</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body add-products p-0">
                        <div class="p-4">
                            <form method="POST" action="{{ route('rentals.update', $rental->id) }}" enctype="multipart/form-data">
                                @csrf  <!-- Include CSRF token for form security -->
                                @method('PUT')  <!-- Method spoofing for PUT request -->
                                <div class="row gy-3">
                                    <!-- Left side: Form Fields -->
                                    <div class="col-md-8">
                                        <div class="row gy-3">
                                            <div class="col-md-12">
                                                <label for="rental-name" class="form-label">Rental Name</label>
                                                <input type="text" class="form-control" id="rental-name" name="rental_name" value="{{ old('rental_name', $rental->rental_name) }}" placeholder="Enter Rental Name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="rental-category" class="form-label">Category</label>
                                                <select class="form-control" id="rental-category" name="rental_category" required>
                                                    <option value="">Select Category</option>
                                                    <option value="House" {{ $rental->rental_category == 'House' ? 'selected' : '' }}>House</option>
                                                    <option value="Apartment" {{ $rental->rental_category == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                                    <option value="Villa" {{ $rental->rental_category == 'Villa' ? 'selected' : '' }}>Villa</option>
                                                    <option value="Condo" {{ $rental->rental_category == 'Condo' ? 'selected' : '' }}>Condo</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no-of-beds" class="form-label">Number of Beds</label>
                                                <input type="number" class="form-control" id="no-of-beds" name="no_of_beds" value="{{ old('no_of_beds', $rental->no_of_beds) }}" placeholder="Enter Number of Beds" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="washroom" class="form-label">Number of Washrooms</label>
                                                <input type="number" class="form-control" id="washroom" name="washroom" value="{{ old('washroom', $rental->washroom) }}" placeholder="Enter Number of Washrooms" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="each-person-price" class="form-label">Price per Person</label>
                                                <input type="text" class="form-control" id="each-person-price" name="each_person_price" value="{{ old('each_person_price', $rental->each_person_price) }}" placeholder="Enter Price per Person" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $rental->address) }}" placeholder="Enter Address" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city" class="form-label">Select City</label>
                                                <select class="form-control" id="city" name="city" required>
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $id => $city)
                                                        <option value="{{ $id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $rental->phone) }}" placeholder="Enter Phone Number" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no-of-shares" class="form-label">Number of Shares</label>
                                                <input type="number" class="form-control" id="no-of-shares" name="no_of_shares" value="{{ old('no_of_shares', $rental->no_of_shares) }}" placeholder="Enter Number of Shares" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pets" class="form-label">Pets Allowed</label>
                                                <select class="form-control" id="pets" name="pets" required>
                                                    <option value="">Select</option>
                                                    <option value="Yes" {{ $rental->pets == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ $rental->pets == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="parking" class="form-label">Parking</label>
                                                <select class="form-control" id="parking" name="parking" required>
                                                    <option value="">Select</option>
                                                    <option value="Yes" {{ $rental->parking == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ $rental->parking == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="smoking" class="form-label">Smoking Allowed</label>
                                                <select class="form-control" id="smoking" name="smoking" required>
                                                    <option value="">Select</option>
                                                    <option value="Yes" {{ $rental->smoking == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ $rental->smoking == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="music" class="form-label">Music Allowed</label>
                                                <select class="form-control" id="music" name="music" required>
                                                    <option value="">Select</option>
                                                    <option value="Yes" {{ $rental->music == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ $rental->music == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a brief description">{{ old('description', $rental->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right side: Picture Upload -->
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div>
                                            <label for="rental-property-pictures" class="form-label">Rental Property Pictures</label>
                                            <input type="file" class="form-control" id="rental-property-pictures" name="rental_property_pictures[]" multiple 
                                                style="height: 120px; width: 300px; padding: 10px; display: block; border: 2px dashed #ced4da; background-color: #f8f9fa;">
                                        </div>
                                    </div>
    
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-success-light m-1">Update Rental Property<i class="bi bi-download ms-2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>
</div>
<!-- End::app-content -->
@endsection
