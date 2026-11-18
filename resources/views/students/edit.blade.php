@extends('layouts.app')

@section('title', 'Edit Student | Lincoln')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">LINCOLN / STUDENT SERVICES</p>
            <h1 class="page-title">Edit student</h1>
            <p class="page-description">Update the personal or academic information for this student.</p>
        </div>
        <a class="button button-secondary" href="{{ route('students.show', $student) }}">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m15 18-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Back to profile
        </a>
    </div>

    <section class="form-card">
        <div class="form-card-heading">
            <span class="form-heading-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="m15.2 5.2 3.6 3.6M4 20l4.4-.9L19.6 7.9a2.55 2.55 0 0 0-3.6-3.6L4.8 15.6 4 20Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <div>
                <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p>Update the details below and save your changes.</p>
            </div>
        </div>

        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-section">
                <h3 class="form-section-title">Personal details</h3>
                <div class="form-grid">
                    <div class="field">
                        <label for="student_id">Student ID <span class="required-mark">*</span></label>
                        <input class="form-control" id="student_id" name="student_id" value="{{ old('student_id', $student->student_id) }}" autocomplete="off" required>
                        @error('student_id')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="first_name">First name <span class="required-mark">*</span></label>
                        <input class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}" autocomplete="given-name" required>
                        @error('first_name')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="last_name">Last name <span class="required-mark">*</span></label>
                        <input class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}" autocomplete="family-name" required>
                        @error('last_name')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="email">Email address <span class="required-mark">*</span></label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $student->email) }}" autocomplete="email" required>
                        @error('email')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="phone">Phone number</label>
                        <input class="form-control" id="phone" type="tel" name="phone" value="{{ old('phone', $student->phone) }}" autocomplete="tel">
                        @error('phone')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="date_of_birth">Date of birth</label>
                        <input class="form-control" id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}" autocomplete="bday">
                        @error('date_of_birth')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select gender</option>
                            <option value="Male" @selected(old('gender', $student->gender) === 'Male')>Male</option>
                            <option value="Female" @selected(old('gender', $student->gender) === 'Female')>Female</option>
                            <option value="Other" @selected(old('gender', $student->gender) === 'Other')>Other</option>
                        </select>
                        @error('gender')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field field-wide">
                        <label for="address">Home address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" autocomplete="street-address">{{ old('address', $student->address) }}</textarea>
                        @error('address')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3 class="form-section-title">Academic details</h3>
                <div class="form-grid">
                    <div class="field">
                        <label for="department">Department</label>
                        <input class="form-control" id="department" name="department" value="{{ old('department', $student->department) }}">
                        @error('department')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="year_level">Year level</label>
                        <input class="form-control" id="year_level" name="year_level" value="{{ old('year_level', $student->year_level) }}">
                        @error('year_level')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a class="button button-secondary" href="{{ route('students.show', $student) }}">Cancel</a>
                <button class="button button-primary" type="submit">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 12.5 4.5 4.5L19 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Save changes
                </button>
            </div>
        </form>
    </section>
@endsection
