<?php
declare(strict_types=1);

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    public function toArray()
    {
        return [
            'id' => $this->getAttribute('id')
        ];
    }
}
