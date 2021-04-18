<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "categories";

    public function getCategories()
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'created_at'])
            ->where('is_visible', true)
            ->get();
    }

}
