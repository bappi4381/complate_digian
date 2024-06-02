<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catagory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'short_description',
        'image',
        'description',
        'created_by_name',
    ];

    public function category()
    {
        return $this->belongsTo(Catagory::class);
    }
}
