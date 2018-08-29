<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $oid
 * @property string $o_name_th
 * @property string $o_name_en
 * @property int $o_sort
 */
class OfficerCat extends Model
{ use Sortable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'officer_cat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'oid';

    /**
     * @var array
     */
    protected $fillable = ['o_name_th', 'o_name_en', 'o_sort'];

}
