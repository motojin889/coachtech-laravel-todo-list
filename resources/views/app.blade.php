<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>

<body>
  <main>
    <h1 class="title">ToDo List</h1>
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
      <form action="/todo/update" method="post">
        @csrf
        <tr>
          <td>{{$item->created_at}}</td>
          <td><input type="text" name="content" placeholder="{{$item->content}}"><input type="hidden" name="id" value="{{$item->id}}"></td>
          <td><input type="submit" value="更新"></td>
          <td></td>
        </tr>
      </form>
      @endforeach
    </table>

  </main>
  <style>
    body {
      background-color: darkblue;
      width: 100vw;
    }

    .title {
      font-size: 25px;
      padding: 30px 0 0 30px;
    }

    main {
      width: 50%;
      height: 60vh;
      margin: 100px auto;
      background-color: white;
      border-radius: 20px;
    }

    .text-form {
      width: 70%;
      margin: 0 30px 10px;
      line-height: 30px;
      border-radius: 10px;
    }

    .table {
      width: 100%;
    }
  </style>
</body>

</html>