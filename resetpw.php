<?php 

/* 資料庫有資料> 出現重設密碼視窗

沒有資料> 導回forget.html重新輸入 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票對獎系統- 重設密碼</title>
</head>
<body>

<form action="?">
    <label for="pw">請輸入新密碼/label>
    <input type="password" name="pw" id="pw">
    <label for="pw2">確認新密碼</label>
    <input type="password" name="pw2" id="pw2">
    <input type="submit" value="重置" id="submit">
    <input type="reset" value="清除重填">
</form>

<?php 

//* 變更密碼成功  連結至登入頁面

//* 失敗重新設定密碼


?>

</body>
</html>