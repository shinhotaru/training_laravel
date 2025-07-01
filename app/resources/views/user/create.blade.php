<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
  </head>
  <body>
    <h1>新規登録</h1>
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
    <form action="{{ action('UserController@store') }}" method="POST">
      {{ csrf_field() }}
      <table id="show">
        <tr>
          <th>名前</th>
          <td><input type="text" name="user_name" value="{{ old('user_name') }}"></td>
        </tr>
        <tr>
          <th>名前カナ</th>
          <td><input type="text" name="user_name_kana" value="{{ old('user_name_kana') }}"></td>
        </tr>
        <tr>
          <th>性別</th>
          <td>
            <input type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : ''}}>
            <label for="male">男性</label>
            <input type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : ''}}>
            <label for="female">女性</label>
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td><input type="number" name="age" value="{{ old('age') }}"></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="email" name="mail_address" value="{{ old('mail_address') }}"></td>
        </tr>
      </table>
      <input type="submit" value="登録" onclick="return confirm('登録しますか？');" style="margin-top:20px;">
    </form>
    <br>
    <a href="{{ action('UserController@index') }}">一覧へ戻る</a>
  </body>
</html>
