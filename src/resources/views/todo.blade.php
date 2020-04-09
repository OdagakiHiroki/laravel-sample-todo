<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('/css/todo.css')}}">
</head>
<body>
  <ul class="ul">
    <li>これからやること</li>
    @if (isset($runningItems))
    @foreach($runningItems as $runningItem)
      <li class="todo">{{htmlspecialchars($runningItems->title) ."  " .htmlspecialchars($runningItem->content)}}</li>
      <li>
        <form method="POST" action="/todo/update">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$runningItem->Id}}">
          <input type="hidden" name="flg" value="{{$runnningItem->flg}}">
          <input type="submit" class="todo_button" value="終了">
        </form>
      </li>
    @endforeach
    @endif
  </ul>
  <ul class="ul">
    <li>もうやったこと</li>
    @if(isset($doneItems))
    @foreach($doneItems as $doneItem)
      <li class="todo">{{htmlspecialchars($doneItem->title) ."  " .htmlspecialchars($doneItem->content)}}</li>
      <li>
        <form method="POST" action="/todo/delete">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$doneItem->id}}">
          <input type="hidden" name="flg" value="{{$doneItem->flg}}">
          <input type="submit" class="todo_button" value="削除">
        </form>
      </li>
    @endforeach
    @endif
  </ul>
  <form class="form" method="POST" action="todo/create">
    {{csrd_field()}}
    <input type="text" class="title" name="title" placeholder="タイトルを入力してね">
    <textarea class="content" name="content" placeholder="内容を入力してね"></textarea>
    <input type="submit" class="todo_button" value="追加">
  </form>
</body>
</html>