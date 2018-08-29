<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class GroupContent extends Model {

use Sortable;
  protected $table = 'news_cat';
  protected $primaryKey = 'id';

    protected $fillable = ['type_news_cat','order','name_th', 'name_en', 'create_user', 'create_date', 'last_user', 'last_date'];
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("type_newss_cat", "LIKE","%$keyword%")
                    ->orWhere("name_th", "LIKE", "%$keyword%")
                    ->orWhere("name_en", "LIKE", "%$keyword%")
                    ->orWhere("create_user", "LIKE", "%$keyword%")
                    ->orWhere("create_date", "LIKE", "%$keyword%")
                    ->orWhere("last_user", "LIKE", "%$keyword%")
                    ->orWhere("last_date", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
