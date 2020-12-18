<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Batch extends Pivot
{
    protected $table = 'batches';

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
