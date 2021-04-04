<?php
// 正解or不正解のメッセージ
$correct_msg = "<span class='correct'>○ 正解</span>";
$wrong_msg = "<span class='wrong'>× 不正解</span>";

// Q1の選択肢
$options_q1 = array(
  "ぺこぱ",
  "かまいたち",
  "見取り図",
  "マヂカルラブリー"
);

// Q2の選択肢
$options_q2 = array(
  "蛙亭",
  "パーパー",
  "変ホ長調",
  "Everybody",
  "エルフ",
  "ゆにばーす",
  "納言",
  "Aマッソ"
);

// Q1の答え
$correct1 = "かまいたち";

// Q2の答え
$correct2 = array(
  "蛙亭",
  "パーパー",
  "Everybody",
  "ゆにばーす",
  "納言"
);

// Q3の答え
$correct3 = "のぶゆき";

/* 正誤判定処理の流れ
  1. フォームから受け取ったパラメータ$_POSTに、その問題の回答が含まれているか調べる
  2. 回答が含まれていたら、正誤判定を行い、結果発表のメッセージを作成する
  3. さらに、「あなたの回答」 のメッセージを作成する
  
  【無回答でフォームが送信された場合】
  ・見た目上は何もしない。回答があった場合のみ正解か不正解を表示する
  ・ラジオボタンとチェックボックスは上記1の処理でNULLでなければ正誤判定を行う
  ・テキストボックスの場合は上記1の処理に加え、空の文字列""かどうかも調べる
*/

// Q1の正誤判定処理
if (isset($_POST["a1"])) {
  $answer1 = $_POST["a1"];
  if ($answer1 == $correct1) {
    $result1 = $correct_msg;
  } else {
    $result1 = $wrong_msg;
  }
  $print_answer1 = " （あなたの回答: {$answer1}）";
} 

// Q2の正誤判定処理
if (isset($_POST["a2"])) {
  $answer2 = $_POST["a2"];
  if ($answer2 == $correct2) {
    $result2 = $correct_msg;
  } else {
    $result2 = $wrong_msg;
  }
  $answer2 = implode(", ", $answer2);
  $print_answer2 = " （あなたの回答: {$answer2}）";
}

// Q3の正誤判定処理
if (isset($_POST["a3"])) {
  $answer3 = $_POST["a3"];
  if ($answer3 == $correct3) {
    $print_answer3 = " （あなたの回答: {$answer3}）";
    $result3 = $correct_msg;
  } elseif ($answer3 != "" && $answer3 != $correct3) {
    $print_answer3 = " （あなたの回答: {$answer3}）";
    $result3 = $wrong_msg;
  }
  // 送信された内容が空文字列""だった場合は何もしない
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>クイズ</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
  <div class="content">
    <h1><a href="index.php">お笑いクイズ</a></h1>
    <div class="questions">
      <form action="index.php" method="post">

        <h2>Q1. M-1グランプリ2019で第2位となったコンビは？</h2>
        <div class="question">
          <?php foreach ($options_q1 as $option): ?>
            <label><input type="radio" name="a1" value="<?php echo $option ?>"><?php echo $option ?></label>
          <?php endforeach ?>
          <p class="result"><?php echo $result1 . $print_answer1 ?></p>
        </div>

        <h2>Q2. 次のお笑いコンビのうち、男女コンビを全て選択せよ</h2>
        <div class="question">
          <?php foreach ($options_q2 as $option): ?>
            <label><input type="checkbox" name="a2[]" value="<?php echo $option ?>"><?php echo $option ?></label>
          <?php endforeach ?>
          <p class="result"><?php echo $result2 . $print_answer2 ?></p>
        </div>
        
        <h2>Q3. 次のお笑い芸人に共通する下の名前（本名）をひらがなで答えよ</h2>
        <div class="question">
          <p>千鳥ノブ　ナイツ塙　ナイツ土屋</p>
          <input type="text" name="a3" placeholder="入力">
          <p class="result"><?php echo $result3 . $print_answer3 ?></p>
        </div>
        <div class="submit_field">
          <input type="submit" value="回答を送信する" class="button">
        </div>
      </form>
    </div>
  </div>
</body>
</html>