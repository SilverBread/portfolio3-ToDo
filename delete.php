<?php
  // データの受け取り
  $id = intval($_POST['id']);

  // 必須項目チェック
  if ($id == ''){
    header('Location: todo.php');
    exit();
  }

  // DBに接続
  $dsn = '';
  $user = '';
  $password = '';

  try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // プリペアドステートメントを作成
    $stmt = $db->prepare("DELETE FROM  WHERE id=:id");
    // パラメータ割り当て
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // クエリの実行
    $stmt->execute();
  } catch (PDOException $e){
    exit('エラー：' . $e->getMessage());
  }
  header('Location: todo.php');
  exit();
?>
