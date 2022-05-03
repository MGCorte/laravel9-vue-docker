<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;
    protected $fillable = [
        'repository_id',
        'avatar_url',
        'name',
        'full_name',
        'description',
        'html_url',
        'homepage',
        'language',
        'stargazers_count',
        'topics',
        'language_id',
    ];

    public function language() {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
