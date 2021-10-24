<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
  </head>
  <body>
    <h1>{{ $user->user_name }}({{ $user->user_name_kana }})さんの詳細情報</h1>
    <table id="show">
      <tr>
        <th>id</th>
        <td>{{ $user->id }}</td>
      </tr>
      <tr>
        <th>性別</th>
        <td>{{ $user->gender_text }}</td>
      </tr>
      <tr>
        <th>年齢</th>
        <td>{{ $user->age }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $user->mail_address }}</td>
      </tr>
      <tr>
        <th>作成日時</th>
        <td>{{ $user->created_at }}</td>
      </tr>
      <tr>
        <th>更新日時</th>
        <td>{{ $user->updated_at }}</td>
      </tr>
    </table>
    <br>
    <a href="{{ action('UserController@edit', ['user' => $user->id]) }}">編集する</a>
    <br>
    <a href="{{ action('UserController@index') }}">一覧へ戻る</a>
  </body>
</html>
