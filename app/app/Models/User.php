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

    /**
     * 検索で指定されたカラムを条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  Collection  $conditions
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $conditions)
    {
        if ($conditions->isEmpty()) {
            return $query;
        }

        $query->ofId($conditions->get('id'));
        $query->likeUserName($conditions->get('user_name'));
        $query->likeUserNameKana($conditions->get('user_name_kana'));
        $query->ofGender($conditions->get('gender'));
        $query->thanAge('>=', $conditions->get('age_gte'));
        $query->thanAge('<=', $conditions->get('age_lte'));
        $query->likeMailAddress($conditions->get('mail_address'));

        return $query;
    }

    /**
     * idの完全一致を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfId($query, $id)
    {
        if ($id) {
            $query->where('id', $id);
        }
        return $query;
    }

    /**
     * user_nameの部分一致を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  String  $user_name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLikeUserName($query, $user_name)
    {
        if ($user_name) {
            $query->where('user_name', 'like', sprintf('%%%s%%', $user_name));
        }
        return $query;
    }

    /**
     * user_name_kanaの部分一致を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  String  $user_name_kana
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLikeUserNameKana($query, $user_name_kana)
    {
        if ($user_name_kana) {
            $query->where('user_name_kana', 'like', sprintf('%%%s%%', $user_name_kana));
        }
        return $query;
    }

    /**
     * genderの完全一致を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  String  $gender
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfGender($query, $gender)
    {
        if ($gender) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    /**
     * ageの比較演算を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  String  $operator
     * @param  mixed  $age
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeThanAge($query, $operator, $age)
    {
        if ($age) {
            $query->where('age', $operator, $age);
        }
        return $query;
    }

    /**
     * mail_addressの部分一致を条件に加えるスコープ
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $mail_address
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLikeMailAddress($query, $mail_address)
    {
        if ($mail_address) {
            $query->where('mail_address', 'like', sprintf('%%%s%%', $mail_address));
        }
        return $query;
    }
}
