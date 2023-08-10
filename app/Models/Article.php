<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use HasAuthor;
    use ModelHelpers;

    const TABLE = 'articles';

    protected $table = self::TABLE;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
    ];

    public function id(): string
    {
        return (string) $this->id;
    }

    public function title(): string
    {
        return (string) $this->title;
    }

    public function slug(): string
    {
        return (string) $this->slug;
    }

    public function body(): string
    {
        return (string) $this->body;
    }

}
