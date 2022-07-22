<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 *
 * @method static where(string $string, mixed $id)
 * @method static create(array $array)
 */
class BookGenre extends Pivot
{
    use HasFactory;

    protected $fillable = ['book_id', 'genre_id'];

    public $timestamps  = false;
}
