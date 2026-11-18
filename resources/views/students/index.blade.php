@extends('layouts.app')

@section('title', 'Student Directory | Lincoln')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">LINCOLN / STUDENT SERVICES</p>
            <h1 class="page-title">Student directory</h1>
            <p class="page-description">Manage student profiles and academic records in one place.</p>
        </div>
        <a class="button button-primary" href="{{ route('students.create') }}">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            Add student
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 12.5 4.5 4.5L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <section class="summary-grid" aria-label="Student directory summary">
        <article class="summary-card">
            <div class="summary-icon summary-icon-blue" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M16 20v-1.6a3.4 3.4 0 0 0-3.4-3.4H7.4A3.4 3.4 0 0 0 4 18.4V20m11-15.8a3.4 3.4 0 0 1 0 6.6M20 20v-1.6a3.4 3.4 0 0 0-2.6-3.3M10 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div>
                <p class="summary-label">Total students</p>
                <p class="summary-value">{{ $students->count() }}</p>
            </div>
            <span class="summary-caption">Profiles in directory</span>
        </article>
        <article class="summary-card">
            <div class="summary-icon summary-icon-gold" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M4 20h16M6.5 20V8l5.5-4 5.5 4v12M9.5 10.5h.01m5-.01h.01m-5.01 4h.01m5-.01h.01M10 20v-3h4v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div>
                <p class="summary-label">Departments</p>
                <p class="summary-value">{{ $students->pluck('department')->filter()->unique()->count() }}</p>
            </div>
            <span class="summary-caption">With enrolled students</span>
        </article>
        <article class="summary-card">
            <div class="summary-icon summary-icon-green" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 3H20v18H6.5A2.5 2.5 0 0 1 4 18.5v-13A2.5 2.5 0 0 1 6.5 3ZM8 7h8m-8 4h8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div>
                <p class="summary-label">Year levels</p>
                <p class="summary-value">{{ $students->pluck('year_level')->filter()->unique()->count() }}</p>
            </div>
            <span class="summary-caption">Represented in directory</span>
        </article>
    </section>

    <section class="directory-card">
        <div class="directory-header">
            <div>
                <h2 class="section-title">All students</h2>
                <p class="section-description">A complete list of your student records.</p>
            </div>
            <label class="search-field" for="student-search">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8" stroke="currentColor" stroke-width="1.7"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                <input id="student-search" type="search" placeholder="Search students..." autocomplete="off">
                <span class="sr-only">Search by name, ID, department, or email</span>
            </label>
        </div>

        <div class="table-wrap">
            <table class="student-table" id="student-table">
                <thead>
                    <tr>
                        <th scope="col">Student</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Department</th>
                        <th scope="col">Year level</th>
                        <th scope="col">Email address</th>
                        <th scope="col" aria-label="Actions"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="student-row" data-search="{{ strtolower(implode(' ', [$student->first_name, $student->last_name, $student->student_id, $student->department, $student->year_level, $student->email])) }}">
                            <td>
                                <a class="student-name" href="{{ route('students.show', $student) }}">
                                    <span class="student-avatar" aria-hidden="true">{{ strtoupper(substr($student->first_name, 0, 1).substr($student->last_name, 0, 1)) }}</span>
                                    <span>{{ $student->first_name }} {{ $student->last_name }}</span>
                                </a>
                            </td>
                            <td><span class="id-badge">{{ $student->student_id }}</span></td>
                            <td>{{ $student->department ?? '—' }}</td>
                            <td>{{ $student->year_level ?? '—' }}</td>
                            <td><a class="email-link" href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                            <td>
                                <div class="row-actions">
                                    <a class="action-link" href="{{ route('students.show', $student) }}">View</a>
                                    <a class="action-link" href="{{ route('students.edit', $student) }}">Edit</a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-link action-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <span class="empty-state-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none"><path d="M16 20v-1.6a3.4 3.4 0 0 0-3.4-3.4H7.4A3.4 3.4 0 0 0 4 18.4V20m11-15.8a3.4 3.4 0 0 1 0 6.6M10 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                    <h3>No students yet</h3>
                                    <p>Add your first student to get the directory started.</p>
                                    <a class="button button-primary" href="{{ route('students.create') }}">Add first student</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    @if ($students->isNotEmpty())
                        <tr class="no-results-row" id="no-results-row" hidden>
                            <td colspan="6">
                                <div class="empty-state empty-state-compact">
                                    <h3>No matching students</h3>
                                    <p>Try a different name, student ID, department, or email.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="directory-footer">
            <span id="student-result-count">{{ $students->count() }} {{ \Illuminate\Support\Str::plural('student', $students->count()) }}</span>
            <span>Lincoln Student Services</span>
        </div>
    </section>
@endsection
