<?php
  // データの受け取り
  $task = $_POST['task'];
  $token = $_POST['token'];
  
  //CSRF対策：token正しいか
  if ($token != hash("sha256", session_id())){
    header('#');
    exit();
  }

  // 必須項目チェック（空ではないか？）
  if ($task == '') {
    header("Location: todo.php");
    exit();
  }

  // DBに接続
  $dsn = '';
  $user = '';
  $password = '';

  try {
    // PDOインスタンスの作成
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // プリペアドステートメントを作成
    $stmt = $db->prepare("
      INSERT INTO  (task, tasked)
      VALUES (:task, now())"
    );
    // プリペアドステートメントにパラメータを割り当てる
    $stmt->bindParam(':task', $task, PDO::PARAM_STR);
    // クエリの実行
    $stmt->execute();

    // todo.phpに戻る
    header('Location: todo.php');
    exit();
  } catch (PDOException $e){
    exit('エラー：' . $e->getMessage());
  }
?>
