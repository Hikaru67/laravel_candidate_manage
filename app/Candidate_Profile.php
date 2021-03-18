<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 * @method static create(array $all)
 * @method static find(string $id)
 */
class Candidate_Profile extends Model
{
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

    protected $primaryKey = 'id';
    protected $table = 'candidate_profiles';
}
