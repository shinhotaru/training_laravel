<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /**
     * 性別のテキスト取得
     *
     * @return String
     */
    public function getGenderTextAttribute()
    {
        $genders = collect([
            'male' => '男性',
            'female' => '女性',
        ]);
        return $genders->get($this->gender) ?? 'その他';
    }
}
