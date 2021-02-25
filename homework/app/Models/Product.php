<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_creator',
        'image_path'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function deleteImage() {
        if (!$this->image_path)
            return;

        $path = storage_path('app/' . $this->image_path);

        if (file_exists($path))
            unlink($path);
    }

}
