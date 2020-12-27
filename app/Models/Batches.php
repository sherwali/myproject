<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Batches
 * @package App\Models
 * @version December 20, 2020, 3:12 am UTC
 *
 * @property integer $session_id
 * @property integer $grade_id
 */
class Batches extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'batches';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'session_id',
        'grade_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'session_id' => 'integer',
        'grade_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session_id' => 'required|integer',
        'grade_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
 public function students()
 {
     return $this->belongsToMany(Student::class, 'batch_student', 'batch_id', 'student_id');
 }
}
