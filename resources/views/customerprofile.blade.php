@extends('layouts.app')
@section('title', 'My Profile')

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">My Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->

    <!-- My Profile Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Edit Your</span> Profile</h1>
                <p class="mb-5">Update your profile information below.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-8 mx-auto">
                    <!-- Profile Form -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $user->userid) }}" disabled>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $user->email) }}" disabled>
                        </div>

                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname"
                                name="fname" value="{{ old('fname', $user->fname) }}">
                            @error('fname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname"
                                name="lname" value="{{ old('lname', $user->lname) }}">
                            @error('lname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Address 1 -->
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address 1</label>
                            <input type="text" class="form-control @error('address1') is-invalid @enderror"
                                id="address1" name="address1" value="{{ old('address1', $user->address1) }}">
                            @error('address1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Address 2 -->
                        <div class="mb-3">
                            <label for="address2" class="form-label">Address 2</label>
                            <input type="text" class="form-control @error('address2') is-invalid @enderror"
                                id="address2" name="address2" value="{{ old('address2', $user->address2) }}">
                            @error('address2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- City Dropdown -->
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                                onchange="updateStateDropdown()">
                                <option value="">Select City</option>
                                @foreach ($locations as $state => $cities)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}" data-state="{{ $state }}"
                                            {{ old('city', $user->city) == $city ? 'selected' : '' }}>
                                            {{ $city }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- State Dropdown -->
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
                                @if ($user->state)
                                    <option value="{{ $user->state }}" selected>{{ $user->state }}</option>
                                @else
                                    <option value="">Select State</option>
                                @endif
                            </select>
                            @error('state')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Zip -->
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip"
                                name="zip" value="{{ old('zip', $user->zip) }}">
                            @error('zip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Country Dropdown -->
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-control @error('country') is-invalid @enderror" id="country"
                                name="country">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}"
                                        {{ old('country', $user->country) == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phonenum" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phonenum') is-invalid @enderror"
                                id="phonenum" name="phonenum" value="{{ old('phonenum', $user->phonenum) }}">
                            @error('phonenum')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- My Profile End -->

    <script>
        // JavaScript function to update the state dropdown based on the selected city
        function updateStateDropdown() {
            const citySelect = document.getElementById('city');
            const stateSelect = document.getElementById('state');

            // Get the selected city and its corresponding state
            const selectedCity = citySelect.options[citySelect.selectedIndex];
            const state = selectedCity ? selectedCity.getAttribute('data-state') : '';

            // Clear the existing options in the state dropdown
            stateSelect.innerHTML = '';
            if (state) {
                // Add the state options to the dropdown
                stateSelect.innerHTML = `<option value="${state}" selected>${state}</option>`;
            } else {
                // Add a placeholder option
                stateSelect.innerHTML = '<option value="">Select State</option>';
            }
        }

        // Initial update to set the default state if a city is pre-selected
        document.addEventListener('DOMContentLoaded', function() {
            updateStateDropdown();
        });
    </script>
@endsection
