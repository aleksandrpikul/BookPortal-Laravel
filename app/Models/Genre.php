<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function Books(): BelongsToMany
    {
        return $this->BelongsToMany(Book::class, 'book_genre');
    }
}
