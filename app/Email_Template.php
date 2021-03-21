<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array[] $data)
 * @method static find(string $id)
 * @method static create(array $all)
 * @method static findOrFail(string $id)
 * @method static filter(\Illuminate\Http\Request $request)
 */
class Email_Template extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'title',
        'content'
    ];

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value. '%');
    }

    public function filterTitle($query, $value)
    {
        return $query->where('title', 'LIKE', '%' . $value . '%');
    }

    public function filterCreated_AtFrom($query, $value)
    {
        return $query->where('received_date', '>=' , $value);
    }

    public function filterCreated_AtTo($query, $value)
    {
        return $query->where('received_date', '<=' , $value);
    }

    protected $primaryKey = 'id';
    protected $table = 'email_templates';
}
