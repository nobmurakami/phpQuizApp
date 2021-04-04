<?php
// require_once('');

$options_q1 = array(
  "ぺこぱ",
  "かまいたち",
  "見取り図",
  "マヂカルラブリー"
);

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

$correct1 = "かまいたち";

$correct2 = array(
  "蛙亭",
  "パーパー",
  "Everybody",
  "ゆにばーす",
  "納言"
);

$correct3 = "のぶゆき";

if (isset($_POST["a1"])) {
  $answer1 = $_POST["a1"];
  if ($answer1 == $correct1) {
    $result1 = "正解！";
  } else {
    $result1 = "不正解";
  }
}

if (isset($_POST["a2"])) {
  $answer2 = $_POST["a2"];
  if ($answer2 == $correct2) {
    $result2 = "正解！";
  } else {
    $result2 = "不正解";
  }
}

if (isset($_POST["a3"])) {
  $answer3 = $_POST["a3"];
  if ($answer3 == $correct3) {
    $result3 = "正解！";
  } else {
    $result3 = "不正解";
  }
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
    <h1>お笑いクイズ</h1>
    <div class="questions">
      <form action="index.php" method="post">
        <div class="question">
          <p>Q1. M-1グランプリ2019で第2位となったコンビは？</p>
          <?php foreach ($options_q1 as $option): ?>
            <input type="radio" name="a1" value="<?php echo $option ?>"><?php echo $option ?>
          <?php endforeach ?>
          <p class="result"><?php echo $result1 ?></p>
        </div>
        <div class="question">
          <p>Q2. 次のお笑いコンビのうち、男女コンビを全て選択せよ</p>
          <?php foreach ($options_q2 as $option): ?>
            <input type="checkbox" name="a2[]" value="<?php echo $option ?>"><?php echo $option ?>
          <?php endforeach ?>
          <p class="result"><?php echo $result2 ?></p>
        </div>
        <div class="question">
          <p>Q3. 次のお笑い芸人に共通する下の名前（本名）をひらがなで答えよ</p>
          <ul>
            <li>千鳥 ノブ</li>
            <li>ナイツ 塙</li>
            <li>ナイツ 土屋</li>
          </ul>
          <input type="text" name="a3" placeholder="Q3の回答を入力">
          <p class="result"><?php echo $result3 ?></p>
        </div>
        <br>
        <input type="submit" value="送信">
      </form>
    </div>
  </div>
</body>
</html>