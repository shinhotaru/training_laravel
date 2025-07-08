<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
  </head>
  <body>
    <h1>ユーザーリスト</h1>
    @if (session('success'))
    <p class="successMessage">{{ session('success') }}</p>
    @endif
    <form method="GET">
      <table id="form">
        <tr>
          <th>id</th><td><input type="number" name="filter[id]" value="{{ $conditions->get('id') }}"></td>
          <th>名前</th><td><input type="text" name="filter[user_name]" value="{{ $conditions->get('user_name') }}"></td>
        </tr>
        <tr>
          <th>名前カナ</th><td><input type="text" name="filter[user_name_kana]" value="{{ $conditions->get('user_name_kana') }}"></td>
          <th>性別</th>
          <td>
            <input type="radio" name="filter[gender]" value="male" {{ $conditions->get('gender') == 'male' ? 'checked' : '' }}>
            <label for="man">男性</label>
            <input type="radio" name="filter[gender]" value="female" {{ $conditions->get('gender') == 'female' ? 'checked' : '' }}>
            <label for="woman">女性</label>
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td>
            <input type="number" name="filter[age_gte]" max="150" min="0" style="width:60px;" value="{{ $conditions->get('age_gte') }}">歳以上
            <input type="number" name="filter[age_lte]" max="150" min="0" style="width:60px;" value="{{ $conditions->get('age_lte') }}">歳以下
          </td>
          <th>メールアドレス</th><td><input type="text" name="filter[mail_address]" value="{{ $conditions->get('mail_address') }}"></td>
        </tr>
      </table>
      <input type="submit" style="margin-top:20px;" name="search" value="検索">
      <a href="{{ action('UserController@index') }}">リセット</a>
    </form>

    <a class="newButtonLink" href="{{ action('UserController@create') }}">新規作成</a>

    <table id="list">
      <tr>
        <th>id</th><th>名前</th><th>名前カナ</th><th>性別</th><th>年齢</th><th>メールアドレス</th><th>操作</th>
      </tr>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->user_name }}</td>
        <td>{{ $user->user_name_kana }}</td>
        <td>{{ $user->gender_text }}</td>
        <td>{{ $user->age }}</td>
        <td>{{ $user->mail_address }}</td>
        <td>
          <form name="delete{{ $loop->index }}" action="{{ action('UserController@destroy', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
          <a href="{{ action('UserController@edit', ['user' => $user->id]) }}">編集</a>
          <a href="javascript:document.forms['delete{{ $loop->index }}'].submit()" onclick="return confirm('削除しますか？')">削除</a>
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>