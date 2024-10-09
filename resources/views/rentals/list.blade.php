@extends('layouts.customer_layout')
<br>
@section('content')
<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Rentals</h1> <!-- Updated title -->
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rentals</li> <!-- Updated breadcrumb -->
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">   
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Rentals List
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Rental Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price per Person</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th> <!-- New City Column -->
                                        <th scope="col">Phone</th>
                                        <th scope="col">Published</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rentals as $rental)
                                        <tr class="rental-list">
                                            <td>
                                                <div class="fw-semibold">
                                                    {{ $rental->rental_name }}
                                                </div>
                                            </td>
                                            <td>{{ $rental->rental_category }}</td>
                                            <td>{{ $rental->each_person_price }}</td>
                                            <td>{{ $rental->address }}</td>
                                            <td>{{ $rental->city->name }}</td> <!-- Display City -->
                                            <td>{{ $rental->phone }}</td>
                                            <td>{{ $rental->created_at->format('d, M Y - h:i A') }}</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-icon btn-sm btn-info-light">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-sm btn-danger-light product-btn">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
        <!-- End::row-1 -->

    </div>
</div>
<!-- End::app-content -->

@endsection
