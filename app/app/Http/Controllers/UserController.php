<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPost as UserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧表示
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $conditions = collect($request->input('filter'));
        $users = User::search($conditions)->get();

        return view('user.index', compact(['conditions', 'users']));
    }

    /**
     * ユーザー新規登録画面
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * ユーザー登録
     *
     * @param  UserPostRequest $request
     * @return Response
     */
    public function store(UserPostRequest $request)
    {
        $user = new User;
        $user->user_name = $request->user_name;
        $user->user_name_kana = $request->user_name_kana;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->mail_address = $request->mail_address;
        $user->save();

        return redirect()->route('user.create')->with('success', '登録が完了しました');
    }

    /**
     * ユーザー編集画面
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact(['user']));
    }

    /**
     * ユーザー更新
     *
     * @param  User $user
     * @param  UserPostRequest $request
     * @return Response
     */
    public function update(User $user, UserPostRequest $request)
    {
        $user->user_name = $request->user_name;
        $user->user_name_kana = $request->user_name_kana;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->mail_address = $request->mail_address;
        $user->save();

        return redirect()->route('user.edit', ['user' => $user->id])->with('success', '更新が完了しました');
    }

    /**
     * ユーザー削除
     *
     * @param  User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', '削除が完了しました');
    }

}
