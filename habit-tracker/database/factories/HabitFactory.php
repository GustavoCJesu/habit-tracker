<?php

namespace Database\Factories;

use App\Models\Habit;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        $habits = [
            'Beber 2L de água',
            'Fazer exercícios',
            'Caminhar 30 minutos',
            'Ler 20 minutos',
            'Estudar programação',
            'Meditar',
            'Dormir 8 horas',
            'Acordar cedo',
            'Arrumar a cama',
            'Organizar o quarto',
            'Alongar',
            'Escovar os dentes',
            'Passar fio dental',
            'Tomar vitaminas',
            'Planejar o dia',
            'Revisar tarefas',
            'Evitar redes sociais',
            'Registrar gastos',
            'Guardar dinheiro',
            'Cozinhar',
        ];  

        return [
            'user_id' => 1,
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}
