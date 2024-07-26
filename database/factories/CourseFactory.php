<?php
namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courses = [
            'PHP',
            'JavaScript',
            'C#',
            'Java',
            'Python',
            'Ruby',
            'Go',
            'Swift',
            'Kotlin',
            'TypeScript',
            'SQL',
            'HTML',
            'CSS',
            'React',
            'Angular',
            'Vue.js',
            'Node.js',
            'Django',
            'Flask',
            'Laravel'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($courses),
            'duration' => $this->faker->numberBetween(1, 12) . ' months',
            'syllabus' => $this->faker->paragraph,
            'teacher_id' => Teacher::factory(), // Assuming you also have a factory for Teacher
        ];
    }
}
