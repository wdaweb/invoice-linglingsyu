<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票對獎系統- 註冊帳號</title>
    <?php include 'include/link.php'; ?>

    <style>
    body{
        background-color:#000;
        color: #fff; 
    }
     .item3{
        margin-top:20px;
     }
    
    </style>
</head>

<body>

    <div class="container">
        <form action="adduser.php" method="POST" class="form">
            <div class="item1">
                <h1>註冊帳號</h1>
                <label for="acc">帳號</label>
                <input type="text" name="acc" id="acc">
                <label for="pw">密碼</label>
                <input type="password" name="pw" id="pw">
                <label for="name">暱稱</label>
                <input type="text" name="name" id="name">
                <label for="email">信箱</label>
                <input type="email" name="email" id="email">
                <label for="bir">生日</label>
                <input type="date" name="bir" id="bir">
            </div>
            <div class="item2">
                <input type="reset" value="重寫">
                <input type="submit" value="註冊">
            </div>
            <div class="item3">
            <p>備註：</p>
            <p>1.資料不得為空</p>
            <p>2.信箱及生日作為重設密碼用，請填寫正確資料</p>
            <p>3.除了帳號，其他資料皆可登入後修改</p>
            </div>
        </form>
    </div>

</body>

</html>