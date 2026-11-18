@extends('layouts.app')

@section('title', 'Add Student | Lincoln')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">LINCOLN / STUDENT SERVICES</p>
            <h1 class="page-title">Add a student</h1>
            <p class="page-description">Create a profile and add academic details to the directory.</p>
        </div>
        <a class="button button-secondary" href="{{ route('students.index') }}">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m15 18-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Back to directory
        </a>
    </div>

    <section class="form-card">
        <div class="form-card-heading">
            <span class="form-heading-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </span>
            <div>
                <h2>Student information</h2>
                <p>Fields marked <span class="required-mark">*</span> are required.</p>
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-section">
                <h3 class="form-section-title">Personal details</h3>
                <div class="form-grid">
                    <div class="field">
                        <label for="student_id">Student ID <span class="required-mark">*</span></label>
                        <input class="form-control" id="student_id" name="student_id" value="{{ old('student_id') }}" placeholder="e.g. LIN-2026-001" autocomplete="off" required>
                        @error('student_id')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="first_name">First name <span class="required-mark">*</span></label>
                        <input class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" autocomplete="given-name" required>
                        @error('first_name')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="last_name">Last name <span class="required-mark">*</span></label>
                        <input class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name" autocomplete="family-name" required>
                        @error('last_name')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="email">Email address <span class="required-mark">*</span></label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="student@example.com" autocomplete="email" required>
                        @error('email')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="phone">Phone number</label>
                        <input class="form-control" id="phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" autocomplete="tel">
                        @error('phone')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="date_of_birth">Date of birth</label>
                        <input class="form-control" id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="bday">
                        @error('date_of_birth')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select gender</option>
                            <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                            <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                            <option value="Other" @selected(old('gender') === 'Other')>Other</option>
                        </select>
                        @error('gender')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field field-wide">
                        <label for="address">Home address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter the student's address" autocomplete="street-address">{{ old('address') }}</textarea>
                        @error('address')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3 class="form-section-title">Academic details</h3>
                <div class="form-grid">
                    <div class="field">
                        <label for="department">Department</label>
                        <input class="form-control" id="department" name="department" value="{{ old('department') }}" placeholder="e.g. Computer Science">
                        @error('department')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label for="year_level">Year level</label>
                        <input class="form-control" id="year_level" name="year_level" value="{{ old('year_level') }}" placeholder="e.g. 1st Year">
                        @error('year_level')<p class="field-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a class="button button-secondary" href="{{ route('students.index') }}">Cancel</a>
                <button class="button button-primary" type="submit">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 12.5 4.5 4.5L19 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Save student
                </button>
            </div>
        </form>
    </section>
@endsection
