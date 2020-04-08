<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // データ登録時にidは受け付けない
    protected $guarded = ['id'];
    // テーブル名を指定（デフォルトではテーブル名はModelクラスの複数形の小文字）
    protected $table = 'todo';
    // バリデーションルール
    public static $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    // ローカルスコープを定義（呼び出し時はTodo::flg(1)のように呼び出す）
    public function scopeFlg ($query, $num) {
        return $query->where('flg', $num);
    }
}
