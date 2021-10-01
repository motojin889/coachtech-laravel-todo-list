<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/app.css">
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
    <style>
      body {
        background-color: darkblue;
        width: 100vw;
      }

      .title {
        font-size: 25px;
        padding: 30px 0 0 15px;
      }

      main {
        width: 55%;
        height: auto;
        margin: 100px auto 0;
        background-color: white;
        border-radius: 20px;
      }

      .text-form {
        width: 70%;
        margin: 10px 30px 10px;
        line-height: 30px;
        border-radius: 5px;
        border: gray solid 1px;
      }

      .table {
        width: 85%;
        margin: 0 auto;
      }

      .contents-list {
        line-height: 40px;
      }

      .contents {
        width: 90%;
        height: 25px;
        line-height: 20px;
        border-radius: 5px;
        border: 1px solid gray;
        margin: 0 auto;
      }

      .update-submit {
        color: orange;
        border: orange 2px solid;
        border-radius: 8px;
        background-color: white;
        height: 35px;
        width: 4em;
        cursor: pointer;
      }

      .update-submit:hover {
        background-color: orange;
        color: white;
        transition: 0.3s;
      }

      .delete-submit {
        color: lightblue;
        border: lightblue 2px solid;
        border-radius: 8px;
        background-color: white;
        height: 35px;
        width: 4em;
        cursor: pointer;
      }

      .delete-submit:hover {
        background-color: lightblue;
        color: white;
        transition: 0.3s;
      }
    </style>
  </main>

</body>

</html>