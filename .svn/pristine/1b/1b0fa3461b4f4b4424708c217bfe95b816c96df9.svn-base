<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $nid
 * @property int $orders
 * @property string $cat
 * @property string $title_th
 * @property string $title_en
 * @property string $type
 * @property string $img
 * @property string $text_th
 * @property string $text_en
 * @property string $file
 * @property string $url
 * @property int $year
 * @property string $record_status
 * @property string $create_user_new
 * @property string $create_date_new
 * @property string $last_user_new
 * @property string $last_date_new
 */
class NewsData extends Model
{
    use Sortable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nid';

    /**
     * @var array
     */
    protected $fillable = ['orders', 'cat', 'title_th', 'title_en', 'type', 'img', 'text_th', 'text_en', 'file', 'url', 'year', 'record_status', 'create_user_new', 'create_date_new', 'last_user_new', 'last_date_new'];
    public function scopeSearchByKeyword($query, $keyword)
    {
      if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title_th", "LIKE","%$keyword%")
                    ->orWhere("title_en", "LIKE", "%$keyword%")
                    ->orWhere("last_user_new", "LIKE", "%$keyword%")
                    ->orWhere("type", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
