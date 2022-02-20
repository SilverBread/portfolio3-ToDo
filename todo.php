<!doctype html>
<html lang="ja" >
  <head>
    <title>My Todo Lists</title>
    <link href="css/todo.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="List">
        <h1>My Todo Lists</h1>
        <form action="write.php" method="post">
          <div class="List-Task">
            <div class="List-Task-task">Task</div>
            <input type="text" name="task" class="form-control">
            <input type="submit" class="Add-Btn" value="追加">   
          </div>
        </form>
        <table class="task-table">
          <thead>
            <tr>
              <th>Check</th>
              <th>Task</th>
              <th>Time</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <!-- チェックボックス -->
              <td>
                <input type="checkbox" class="check"/>
              </td>
              <!-- タスク -->
              <td>
                <div></div>
              </td>
              <!-- 時間 -->
              <td>
                <div></div>
              </td>
              <!-- 削除ボタン -->
              <td>
                <div class="List-Delete">
                  <form class="delete" action="delete.php" method="POST">
                    <input type="submit" class="Delete-Btn" value="削除">
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
      </div>
    </main>
  </body>
</html>
