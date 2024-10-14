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
                                @csrf
                                @method('PUT')  <!-- Include PUT method for update -->
                                <div class="row gy-3">
                                    <!-- Left side: Form Fields -->
                                    <div class="col-md-8">
                                        <div class="row gy-3">
                                            <!-- Existing Fields -->
                                            <div class="col-md-12">
                                                <label for="rental-name" class="form-label">Rental Name</label>
                                                <input type="text" class="form-control" id="rental-name" name="rental_name" value="{{ old('rental_name', $rental->rental_name) }}" placeholder="Enter Rental Name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="rental-category" class="form-label">Category</label>
                                                <select class="form-control" id="rental-category" name="rental_category" required>
                                                    <option value="">Select Category</option>
                                                    <option value="House" {{ $rental->rental_category == 'House' ? 'selected' : '' }}>House</option>
                                                    <option value="FarmHouse" {{ $rental->rental_category == 'FarmHouse' ? 'selected' : '' }}>FarmHouse</option>
                                                    <option value="Villa" {{ $rental->rental_category == 'Villa' ? 'selected' : '' }}>Villa</option>
                                                    <option value="Apartment" {{ $rental->rental_category == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city" class="form-label">Select City</label>
                                                <select class="form-control" id="city_id" name="city_id" required>
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}" {{ $city->id == $rental->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
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
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $rental->phone) }}" placeholder="Enter Phone Number" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a brief description">{{ old('description', $rental->description) }}</textarea>
                                            </div>

                                            <!-- New Fields -->
                                            <div class="col-md-6">
                                                <label for="size_in_sqm" class="form-label">Size in Square Meters</label>
                                                <input type="number" step="0.01" class="form-control" id="size_in_sqm" name="size_in_sqm" value="{{ old('size_in_sqm', $rental->size_in_sqm) }}" placeholder="Enter Size in Sqm" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="max_people" class="form-label">Max People</label>
                                                <input type="number" class="form-control" id="max_people" name="max_people" value="{{ old('max_people', $rental->max_people) }}" placeholder="Enter Max People" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="common_rooms" class="form-label">Common Rooms</label>
                                                <input type="number" class="form-control" id="common_rooms" name="common_rooms" value="{{ old('common_rooms', $rental->common_rooms) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="bedrooms" class="form-label">Bedrooms</label>
                                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $rental->bedrooms) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $rental->bathrooms) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exterior" class="form-label">Exterior</label>
                                                <select class="form-control" id="exterior" name="exterior" required>
                                                    <option value="Yes" {{ $rental->exterior == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ $rental->exterior == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right side: Equipment Fields -->
                                    <div class="col-md-4">
                                        <div class="row gy-3">
                                            <!-- Equipment -->
                                            <div class="col-md-12">
                                                <label for="equipment" class="form-label">Available Equipment</label><br>
                                                @php
                                                    $equipment = [
                                                        'baby_bed' => 'Baby Bed',
                                                        'double_bed' => 'Double Bed',
                                                        'sofa_bed' => 'Sofa Bed',
                                                        'duvets' => 'Duvets',
                                                        'pillows' => 'Pillows',
                                                        'sheets' => 'Sheets',
                                                        'pillow_protectors' => 'Pillow Protectors',
                                                        'shower' => 'Shower',
                                                        'bath_towels' => 'Bath Towels',
                                                        'washing_machine' => 'Washing Machine',
                                                        'microwave' => 'Microwave',
                                                        'hotplates' => 'Hotplates',
                                                        'fridge' => 'Fridge',
                                                        'freezer' => 'Freezer',
                                                        'coffee_maker' => 'Coffee Maker',
                                                        'tea_towels' => 'Tea Towels',
                                                        'table' => 'Table',
                                                        'chairs' => 'Chairs',
                                                        'baby_high_chair' => 'Baby High Chair',
                                                        'coffee_table' => 'Coffee Table',
                                                        'television' => 'Television',
                                                        'fan' => 'Fan',
                                                        'smoke_detector' => 'Smoke Detector'
                                                    ];
                                                @endphp
                                                @foreach ($equipment as $field => $label)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="{{ $field }}" name="{{ $field }}" {{ $rental->$field ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Picture Upload -->
                                            <div class="col-md-12">
                                                <label for="rental-property-pictures" class="form-label">Rental Property Pictures</label>
                                                <input type="file" class="form-control" id="rental-property-pictures" name="rental_property_pictures">
                                                <small class="text-muted">You can upload multiple images. Previous images will be retained unless replaced.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Update Rental Property</button>
                                        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Cancel</a>
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
