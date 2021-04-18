<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getNews(bool $isAdmin = false)
    {
        if(!$isAdmin){
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->where('status', NewsStatusEnum::PUBLISHED)
            ->get();
        }

        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->get();
    }
    public function getNewsById(int $id)
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->where('id', $id)
            ->first();
    }



}
