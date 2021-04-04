<?php
$correct_msg = "<span class='correct'>○ 正解</span>";
$wrong_msg = "<span class='wrong'>× 不正解</span>";

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
    $result1 = $correct_msg;
  } else {
    $result1 = $wrong_msg;
  }
  $print_answer1 = " （あなたの回答: {$answer1}）";
} 

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

if (isset($_POST["a3"])) {
  $answer3 = $_POST["a3"];
  if ($answer3 == $correct3) {
    $print_answer3 = " （あなたの回答: {$answer3}）";
    $result3 = $correct_msg;
  } elseif ($answer3 != "" && $answer3 != $correct3) {
    $print_answer3 = " （あなたの回答: {$answer3}）";
    $result3 = $wrong_msg;
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