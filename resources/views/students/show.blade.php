@extends('layouts.app')

@section('title', $student->first_name.' '.$student->last_name.' | Lincoln')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">LINCOLN / STUDENT PROFILE</p>
            <h1 class="page-title">Student profile</h1>
            <p class="page-description">View the personal and academic record for this student.</p>
        </div>
        <a class="button button-secondary" href="{{ route('students.index') }}">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m15 18-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Back to directory
        </a>
    </div>

    <section class="profile-card">
        <div class="profile-hero">
            <span class="profile-avatar" aria-hidden="true">{{ strtoupper(substr($student->first_name, 0, 1).substr($student->last_name, 0, 1)) }}</span>
            <div class="profile-heading">
                <span class="profile-kicker">STUDENT</span>
                <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
                <span class="id-badge id-badge-light">{{ $student->student_id }}</span>
            </div>
            <a class="button button-light" href="{{ route('students.edit', $student) }}">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m15.2 5.2 3.6 3.6M4 20l4.4-.9L19.6 7.9a2.55 2.55 0 0 0-3.6-3.6L4.8 15.6 4 20Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Edit profile
            </a>
        </div>

        <div class="profile-content">
            <div class="profile-section">
                <h3 class="profile-section-title">Contact information</h3>
                <dl class="detail-grid">
                    <div class="detail-item">
                        <dt>Email address</dt>
                        <dd><a class="detail-link" href="mailto:{{ $student->email }}">{{ $student->email }}</a></dd>
                    </div>
                    <div class="detail-item">
                        <dt>Phone number</dt>
                        <dd>{{ $student->phone ?: 'Not provided' }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Home address</dt>
                        <dd>{{ $student->address ?: 'Not provided' }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Date of birth</dt>
                        <dd>{{ $student->date_of_birth?->format('F j, Y') ?? 'Not provided' }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Gender</dt>
                        <dd>{{ $student->gender ?: 'Not provided' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="profile-section">
                <h3 class="profile-section-title">Academic information</h3>
                <dl class="detail-grid">
                    <div class="detail-item">
                        <dt>Department</dt>
                        <dd>{{ $student->department ?: 'Not assigned' }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Year level</dt>
                        <dd>{{ $student->year_level ?: 'Not assigned' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="profile-footer">
                <span>Record created {{ $student->created_at->format('F j, Y') }}</span>
                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student record? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button class="text-button text-button-danger" type="submit">Delete student record</button>
                </form>
            </div>
        </div>
    </section>
@endsection
