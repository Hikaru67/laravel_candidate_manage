<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 * @method static create(array $all)
 * @method static find(string $id)
 */
class Candidate_Profile extends Model
{
    use Filterable;

    public $timestamps = true;

    protected $filterable = [
        'position_id' => 'position',
        'source_id' => 'source',
        'gender'
    ];
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'position_id',
        'source_id',
        'received_date',
        'filtered_result',
        'interview_date',
        'feedback',
        'interview_result',
        'cv_link',
        'note',
    ];

    public function filterFirstName($query, $value)
    {
        return $query->where('first_name', 'LIKE', '%' . $value. '%');
    }

    public function filterLastName($query, $value)
    {
        return $query->where('last_name', 'LIKE', '%' . $value . '%');
    }

    public function filterPosition($query, $value)
    {
        return $query->where('position_id', '=', $value);
    }

    public function filterSource($query, $value)
    {
        return $query->where('source_id', '=', $value);
    }

    public function filterReceiverDateFrom($query, $value)
    {
        return $query->whereDate('receiver_date', '>=' , $value);
    }

    public function filterReceiverDateTo($query, $value)
    {
        return $query->whereDate('receiver_date', '<=' , $value);
    }

    protected $primaryKey = 'id';
    protected $table = 'candidate_profiles';
}
