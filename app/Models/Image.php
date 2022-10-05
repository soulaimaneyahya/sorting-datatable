<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}