<?php
// confirm.php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}
// contact.php から送られてきた値を受け取る
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$companyName = htmlspecialchars($_POST['companyName'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// 入力されていない項目があればエラーを表示（簡易バリデーション）
$errors = [];
if ($name === '')    $errors[] = 'お名前を入力してください。';
if ($companyName === '')    $errors[] = '会社名を入力してください。';
if ($email === '')   $errors[] = 'メールアドレスを入力してください。';
if ($age === '')    $errors[] = '年齢を入力してください。';
if ($message === '')   $errors[] = 'お問い合わせ内容を入力してください。';


// HTML特殊文字をエスケープする関数
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム・確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h2>お問い合わせフォーム・確認画面</h2>
</header>

<!-- sidebar -->
<aside>
    <ul>
        <li><a href="#">トップページ</a></li>
        <li><a href="#">人気投稿</a></li>
        <li><a href="#">エンジニアおすすめ商品</a></li>
        <li><a href="#">エンジニアおすすめ記事</a></li>
        <li><a href="#">投稿ページ</a></li>
    </ul>
</aside>

<main>
    <form action="send.php" method="post">
        <table border="3">
            <tr>
                <th>お名前</th>
                <td><?php echo $name; ?></td>
            </tr>

            <tr>
                <th>会社名</th>
                <td><?php echo $companyName; ?></td>
            </tr>

            <tr>
                <th>メールアドレス</th>
                <td><?php echo $email; ?></td>
            </tr>

            <tr>
                <th>年齢</th>
                <td><?php echo $age; ?></td>
            </tr>

            <tr>
                <th>お問い合わせ内容</th>
                <td><?php echo nl2br($message); ?></td>
            </tr>
        </table>

        <!-- send.php に値を渡す hidden -->
        <form action="send.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="companyName" value="<?php echo $companyName; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="age" value="<?php echo $age; ?>">
        <input type="hidden" name="message" value="<?php echo $message; ?>">

        <div class="btn-area">
            <input type="submit" value="送信">
            <br>
            <input type="button" value="戻る" onclick="history.back()">
        </div>
    </form>
</main>

</body>
</html>