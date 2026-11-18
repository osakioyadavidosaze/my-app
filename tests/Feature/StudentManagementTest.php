<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_students_index_loads_successfully(): void
    {
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
    }

    public function test_a_student_profile_displays_contact_and_academic_details(): void
    {
        $student = Student::factory()->create([
            'student_id' => 'STU-1501',
            'first_name' => 'Katherine',
            'last_name' => 'Johnson',
            'email' => 'katherine@example.com',
            'department' => 'Mathematics',
            'year_level' => '4th Year',
        ]);

        $response = $this->get(route('students.show', $student));

        $response->assertOk()
            ->assertSee('Katherine Johnson')
            ->assertSee('katherine@example.com')
            ->assertSee('Mathematics')
            ->assertSee('4th Year');
    }

    public function test_a_student_can_be_created(): void
    {
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
    }

    public function test_a_student_can_be_updated(): void
    {
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
    }

    public function test_a_student_can_be_deleted(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete('/students/'.$student->id);

        $response->assertRedirect('/students');
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
