<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Flat3\Lodata\Attributes\LodataRelationship;
use App\Models\Model\Review;


class Product extends Model
{
    use HasFactory;

    #[LodataRelationship]
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
