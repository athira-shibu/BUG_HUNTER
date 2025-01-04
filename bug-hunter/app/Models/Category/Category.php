<?php
declare(strict_types=1);

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function toArray(): array
    {
        return [
            'id' => $this->getAttribute('id'),
            'name' => $this->getAttribute('name')
        ];
    }
}
