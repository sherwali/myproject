<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Student
 * @package App\Models
 * @version December 14, 2020, 8:22 pm UTC
 *
 * @property string $name
 */
class Student extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'students';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    public function getEmailAttribute(){
        return $this->name.'@admin.com';
    }


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    // mutator
    // accessor
// getNameAttribute


public function batches()
{
    return $this->belongsToMany(Batch::class, 'batch_student', 'student_id', 'batch_id');
}
}
