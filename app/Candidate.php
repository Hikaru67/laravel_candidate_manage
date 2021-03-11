<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(string $id)
 * @method static create(array $all)
 * @method static findOrFail(string $id)
 */
class Candidate extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'firstName',
        'lastName',
        'position',
        'origin',
        'dateReceived',
        'filtered',
        'dateInterview',
        'interviewed',
        'cv',
        'note',
    ];

    protected $primaryKey = 'id';
    protected $table = 'candidates';

}
