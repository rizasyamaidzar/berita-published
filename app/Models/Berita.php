<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'tanggal',
        'cover',
        'artikel',
        'category_id',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilter(Builder $query, array $filters): void
    {

        // $query->where('judul', 'like', '%' . request('search') . '%');

        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where('judul', 'like', '%' . $search . '%'));

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $id = Category::where('nama', $category)->first();
            if ($id) {
                $query->whereHas('category', function ($query) use ($id) {
                    $query->where('category_id', $id->id);
                });
            }
        });
    }
}
