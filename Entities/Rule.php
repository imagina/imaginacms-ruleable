<?php

namespace Modules\Ruleable\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Iprofile\Entities\Department;
use Modules\Ihelpers\Traits\Relationable;

class Rule extends Model
{

    use Relationable;

    protected $table = 'ruleable__rules';
    protected $fillable = [
        'name',
        'status',
        'values',
        'type',
    ];

    protected $casts = [
        'values' => 'array'
    ];

    public function ruleable(){
        return $this->morphTo('ruleable', 'ruleable__ruleable', 'rule_id', 'ruleable_id');
    }


}
