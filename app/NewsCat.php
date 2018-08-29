<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $id
 * @property int $type_news_cat
 * @property int $order
 * @property string $name_th
 * @property string $name_en
 * @property string $create_user
 * @property string $create_date
 * @property string $last_user
 * @property string $last_date
 */
class NewsCat extends Model
{
  use Sortable;
    protected $table = 'news_cat';
    protected $primaryKey = 'id';

      protected $fillable = ['type_news_cat','order','name_th', 'name_en', 'create_user', 'create_date', 'last_user', 'last_date','view'];
      public function scopeSearchByKeyword($query, $keyword)
      {
        if ($keyword!='') {
          if($keyword == 'ข่าวประกาศ'){
          $keyword = 1;
        } if ($keyword == 'นิสิตปริญญาตรี') {
          $keyword =  2;
        }if ($keyword == 'บัณฑิตศึกษา') {
          $keyword =  3;
        }if ($keyword == 'คณาจารย์/เจ้าหน้าที่') {
          $keyword =  4;
        }
              $query->where(function ($query) use ($keyword) {
                  $query->where("type_news_cat", "LIKE","%$keyword%")
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
