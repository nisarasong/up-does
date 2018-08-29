<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $id
 * @property int $oid
 * @property string $name
 * @property string $sname
 * @property string $image
 * @property string $tel
 * @property string $growth
 * @property int $sort
 */
class Officer extends Model
{  use Sortable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'officer';

    /**
     * @var array
     */
    protected $fillable = ['oid', 'name', 'sname', 'image', 'tel', 'growth', 'sort'];
    public function scopeSearchByKeyword($query, $keyword)
    {
      if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->Where("oid", "LIKE", "%$keyword%")
                ->orWhere("name", "LIKE", "%$keyword%")
                ->orWhere("sname", "LIKE", "%$keyword%")
                ->orWhere("tel", "LIKE", "%$keyword%")
                ->orWhere("growth", "LIKE", "%$keyword%")
                ->orWhere("sort", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
