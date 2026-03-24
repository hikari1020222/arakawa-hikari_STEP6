
// 未入力チェック（送信前）

document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    const changeColorBtn = document.getElementById("changeColorBtn");
    const footer = document.querySelector("footer");

    // 背景色変更用の配列
    const colors = ["blue", "red", "yellow", "gray"];
    let currentIndex = 0;

    // フォーム送信時の処理

    form.addEventListener("submit", function (e) {

        // 各入力項目の取得
        const name = document.getElementById("name").value;
        const companyName = document.getElementById("companyName").value;
        const email = document.getElementById("email").value;
        const age = document.getElementById("age").value;
        const message = document.getElementById("message").value;

        // ② 未入力チェック（空欄がある場合）

        if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
            alert("必須項目が未入力です。入力内容をご確認ください。");
            e.preventDefault(); // 送信キャンセル
            return;
        }

        // ③ 確認ダイアログ（すべて入力済み）

        const confirmMessage =
            "下記の内容を本当に送信しますか？\n\n" +
            "お名前 ➜ " + name + "\n" +
            "会社名 ➜ " + companyName + "\n" +
            "メールアドレス ➜ " + email + "\n" +
            "年齢 ➜ " + age + "\n" +
            "お問い合わせ内容 ➜ " + message;

        const result = confirm(confirmMessage);

        if (!result) {
            e.preventDefault(); // キャンセル時は送信しない
        }
    });

    // ④ 背景色変更ボタン

    changeColorBtn.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % colors.length;
        footer.style.backgroundColor = colors[currentIndex];
    });

});