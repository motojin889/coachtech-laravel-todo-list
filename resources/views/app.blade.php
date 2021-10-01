<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<body>
  <main>
    <h1 class=" title">ToDo List</h1>
    @error('content')
    <tr>
      <th>Error</th>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <form action="/todo/create" method="POST">
      @csrf
      <input type="text" name="content" class="text-form">
      <input type="submit" value="追加">
    </form>
    <table class="table">
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>

      @foreach($items as $item )
      <form action="/todo/form" method="post">
        @csrf
        <tr class="contents-list">
          <td>{{$item->created_at}}</td>
          <td class="td-contents"><input type="text" name="content" value="{{$item->content}}" class="contents">
            <input type="hidden" name="id" value="{{$item->id}}">
          </td>
          <td><input type="submit" name="update" value="更新" class="update-submit"></td>
          <td><input type="submit" name="delete" value="削除" class="delete-submit"></td>
        </tr>
      </form>
      @endforeach
    </table>
  </main>

</body>

</html>