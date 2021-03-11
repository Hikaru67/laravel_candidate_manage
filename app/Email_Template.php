<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array[] $data)
 * @method static find(string $id)
 * @method static create(array $all)
 * @method static findOrFail(string $id)
 */
class Email_Template extends Model
{
    protected $fillable = [
        'name',
        'title',
        'content'
    ];

    protected $primaryKey = 'id';
    protected $table = 'email_templates';
}
