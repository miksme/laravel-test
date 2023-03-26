<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function email($email) {
        $this->where('email', $email);
    }

    public function insecure() {
        $this->where('password', '=', 'test');
    }
}
