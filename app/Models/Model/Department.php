<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Flat3\Lodata\Attributes\LodataRelationship;

class Department extends Model
{
    use HasFactory;
    #[LodataRelationship]
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
