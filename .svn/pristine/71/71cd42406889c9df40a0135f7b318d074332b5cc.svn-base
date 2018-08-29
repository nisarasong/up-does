<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $gid
 * @property string $g_name_th
 * @property string $g_name_en
 * @property string $create_user
 * @property string $create_date
 * @property string $last_user
 * @property string $last_date
 */
class GalleryCat extends Model
{
    use Sortable;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gallery_cat';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'gid';

    /**
     * @var array
     */
    protected $fillable = ['g_name_th', 'g_name_en', 'create_user', 'create_date', 'last_user', 'last_date'];
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("g_name_th", "LIKE","%$keyword%")
                    ->orWhere("g_name_en", "LIKE", "%$keyword%")
                    ->orWhere("create_user", "LIKE", "%$keyword%")
                    ->orWhere("last_user", "LIKE", "%$keyword%")
                    ->orWhere("last_date", "LIKE", "%$keyword%")
                    ->orWhere("create_date", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
