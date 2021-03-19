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
        return $query->where('first_name', 'LIKE', '%' . $value->firstName . '%')
                    ->where('last_name', 'LIKE', '%' . $value->lastName . '%');
    }

    public function filterLastName($query, $value)
    {
        return $query->where('first_name', 'LIKE', '%' . $value->firstName . '%')
            ->where('last_name', 'LIKE', '%' . $value->lastName . '%');
    }

    public function filterPosition($query, $value)
    {
        return $query->where('position', '=', $value->position);
    }

    public function filterSource($query, $value)
    {
        return $query->where('source', '=', $value->source);
    }

    public function filterReceiverDateFrom($query, $value)
    {
        return $query->whereDate('receiver_date', '>=' , $value->receiverDateFrom)
                    ->whereDate('receiver_date', '<=' , $value->receiverDateTo);
    }

    protected $primaryKey = 'id';
    protected $table = 'candidate_profiles';
}
