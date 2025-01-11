<?php
declare(strict_types=1);

namespace App\Models\Bug;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bug extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'severity', 'status', 'solution', 'raised_at', 'resolved_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getCategory(): Category
    {
        return $this->getRelationValue('category');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getAttribute('id'),
            'title' => $this->getAttribute('title'),
            'description' => $this->getAttribute('description'),
            'status' => $this->getAttribute('status'),
            'severity' => $this->getAttribute('severity'),
            'raised_at' => $this->getAttribute('raised_at'),
            'solution' => $this->getAttribute('solution')
        ];
    }
}
