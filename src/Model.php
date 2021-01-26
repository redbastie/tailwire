<?php

namespace Redbastie\Tailwire;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }

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
