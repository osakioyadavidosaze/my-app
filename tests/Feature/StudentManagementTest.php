<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('students index loads successfully', function () {
    Student::factory()->create([
        'student_id' => 'STU-1001',
        'first_name' => 'Ada',
        'last_name' => 'Lovelace',
        'email' => 'ada@example.com',
    ]);

    $response = $this->get('/students');

    $response->assertOk()
        ->assertSee('Lincoln Student Management')
        ->assertSee('Ada');
});

test('a student can be created', function () {
    $response = $this->post('/students', [
        'student_id' => 'STU-2001',
        'first_name' => 'Grace',
        'last_name' => 'Hopper',
        'email' => 'grace@example.com',
        'phone' => '123456789',
        'date_of_birth' => '1999-12-09',
        'gender' => 'Female',
        'address' => '25 Tech Street',
        'department' => 'Computer Science',
        'year_level' => '3rd Year',
    ]);

    $response->assertRedirect('/students');

    $this->assertDatabaseHas('students', [
        'student_id' => 'STU-2001',
        'email' => 'grace@example.com',
    ]);
});

test('a student can be updated', function () {
    $student = Student::factory()->create([
        'student_id' => 'STU-3001',
        'first_name' => 'Alan',
        'last_name' => 'Turing',
        'email' => 'alan@example.com',
        'department' => 'Mathematics',
    ]);

    $response = $this->put('/students/'.$student->id, [
        'student_id' => 'STU-3001',
        'first_name' => 'Alan',
        'last_name' => 'Turing',
        'email' => 'alan.updated@example.com',
        'department' => 'Computer Science',
        'year_level' => '4th Year',
    ]);

    $response->assertRedirect('/students');

    $this->assertDatabaseHas('students', [
        'id' => $student->id,
        'email' => 'alan.updated@example.com',
        'department' => 'Computer Science',
    ]);
});

test('a student can be deleted', function () {
    $student = Student::factory()->create();

    $response = $this->delete('/students/'.$student->id);

    $response->assertRedirect('/students');
    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});
