<?php

namespace Redbastie\Tailwire;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    protected $guarded = [];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->timestamps();
    }

    public function definition(Generator $faker)
    {
        return [
            'name' => $faker->name,
        ];
    }
}
