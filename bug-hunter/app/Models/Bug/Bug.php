<?php
declare(strict_types=1);

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
}
