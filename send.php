<?php
// send.php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

// confirm.php から送られてきた値を受け取る（必要なら使う）
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$companyName = htmlspecialchars($_POST['companyName'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// メール内容を作成
$to = "your-email@example.com"; // 送信先メールアドレス
$subject = "お問い合わせが届きました";
$body = "以下の内容でお問い合わせがありました。\n\n" .
        "【名前】\n{$name}\n\n" .
        "【会社名】\n{$companyName}\n\n" .
        "【メールアドレス】\n{$email}\n\n" .
        "【年齢】\n{$age}\n\n" .
        "【お問い合わせ内容】\n{$message}\n";

$headers = "From: {$email}";

// メール送信処理
$sendResult = mb_send_mail($to, $subject, $body, $headers);

// 結果画面の表示
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム - 送信完了画面</title>
</head>
<body>
    <h1>お問い合わせフォーム - 送信完了画面</h1>

    <?php if ($sendResult): ?>
        <p>お問い合わせが送信されました。ありがとうございます！</p>
    <?php else: ?>
        <p>メール送信中にエラーが発生しました。お手数ですが再度お試しください。</p>
    <?php endif; ?>

    <p><a href="contact.php">お問い合わせフォームに戻る</a></p>
</body>
</html>