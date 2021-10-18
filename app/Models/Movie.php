<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Movie extends Model
{
    use SoftDeletes;
    protected $table = 'movies';
    protected $fillable = ['title', 'overview', 'genres', 'posterpath'];

    public function getCreatedAt()
    {
        return Carbon::create($this->created_at)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAt()
    {
        return Carbon::create($this->updated_at)->format('d-m-Y H:i:s');
    }

    public function getDeletedAt()
    {
        return Carbon::create($this->deleted_at)->format('d-m-Y H:i:s');
    }
}
