<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;

/**
 * Class Book.
 * @author Rafael <rafael.422023026@civitas.ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="Book model",
 *     title="Book model",
 *     required={"title", "author"},
 *     @OA\Xml(
 *         name="Book"
 *     )
 * )
 */ 

class Book extends Model
{
    use SoftDeletes;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publication_year',
        'cover',
        'description',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function data_adder(){
        return $this ->belongsTo(User::class, 'created_by', 'id');
    }
}