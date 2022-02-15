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
            <input type="hidden" name="token" value="<?php echo hash("sha256", session_id()) ?>">
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

<?php while ($row = $stmt->fetch()): ?>
          <tbody>
            <tr>
              <!-- チェックボックス -->
              <td>
                <input type="checkbox" class="check"/>
              </td>
              <!-- タスク -->
              <td>
                <div><?php echo htmlspecialchars($row['task'], ENT_QUOTES, 'UTF-8') ?></div>
              </td>
              <!-- 時間 -->
              <td>
                <div><?php echo htmlspecialchars($row['tasked'], ENT_QUOTES, 'UTF-8') ?></div>
              </td>
              <!-- 削除ボタン -->
              <td>
                <div class="List-Delete">
                  <form class="delete" action="delete.php" method="POST">
                    <input type="hidden" name="id" value= <?php echo $row['id'] ?>>
                    <input type="submit" class="Delete-Btn" value="削除">
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
<?php endwhile; ?>
          
      </div>
    </main>
  </body>
</html>
