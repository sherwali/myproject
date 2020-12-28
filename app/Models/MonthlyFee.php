<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MonthlyFee
 * @package App\Models
 * @version December 28, 2020, 6:22 am UTC
 *
 * @property integer $amount
 * @property integer $batches_id
 */
class MonthlyFee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'monthly_fees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'amount',
        'batches_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'amount' => 'integer',
        'batches_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required|integer',
        'batches_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function batch()
    {
        return $this->belongsTo(Batches::class,'batches_id','id');
    }
}
