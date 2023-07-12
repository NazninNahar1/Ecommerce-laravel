<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Flat3\Lodata\Attributes\LodataRelationship;

class Employee extends Model
{

    use HasFactory;
    #[LodataRelationship]
    public function products()
    {
        return $this->belongsTo(Department::class);
    }
}

