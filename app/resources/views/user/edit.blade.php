<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
  </head>
  <body>
    <h1>編集</h1>
    @if (session('success'))
    <p class="successMessage">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
      <div class="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ action('UserController@update', ['user' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('put') }}
      <table id="show">
        <tr>
          <th>名前</th>
          <td><input type="text" name="user_name" value="{{ old('user_name') ?? $user->user_name }}"></td>
        </tr>
        <tr>
          <th>名前カナ</th>
          <td><input type="text" name="user_name_kana" value="{{ old('user_name_kana') ?? $user->user_name_kana }}"></td>
        </tr>
        <tr>
          <th>性別</th>
          <td>
            <input type="radio" name="gender" value="male" {{ collect([old(), $user->gender])->contains('male') ? 'checked' : '' }} >
            <label for="male">男性</label>
            <input type="radio" name="gender" value="female" {{ collect([old(), $user->gender])->contains('female')? 'checked' : '' }} >
            <label for="female">女性</label>
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td><input type="number" name="age" value="{{ old('age') ?? $user->age }}"></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="email" name="mail_address" value="{{ old('mail_address') ?? $user->mail_address }}"></td>
        </tr>
      </table>
      <input type="submit" value="更新" onclick="return confirm('更新しますか？');" style="margin-top:20px;">
    </form>
    <br>
    <a href="{{ action('UserController@show', ['user' => $user->id]) }}">詳細へ戻る</a>
    <br>
    <a href="{{ action('UserController@index') }}">一覧へ戻る</a>
  </body>
</html>
