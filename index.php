<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票管理系統 - 首頁</title>
  <?php include 'include/link.php'; ?>
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrap{
    width: 500px;
    margin-right: 50px;

    }

    .item1{
    width: 500px;
    margin: 0 auto;
}
    input[type="reset"] {
      margin: 0 20%;
    }

    .container2 {
      width: 300px;
      height: 300px;
    }

    .container2 a {
      display: inline-block;
      width: 300px;
      height: 300px;
      background: #ff0000;
      border-radius: 50%;
      line-height: 300px;
      text-align: center;
      text-decoration: none;
      box-shadow: 0 0 20px lightskyblue;
      font-size: 24px;
      color: antiquewhite;
    }
    .item3{
      text-align: center;
      margin:20px;
    }
    .item3 a{
      text-decoration: none;
      color: #fff;
    }
    .note{
      padding-left:40px;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="wrap">
      <form action="checklogin.php" method="post">
        <div class="item1">
          <h1>登入帳號</h1>
          <label for="">帳號</label>
          <input type="text" name="acc" id="acc">
          <label for="">密碼</label>
          <input type="password" name="pw" id="pw">
        </div>
        <div class="item2">
          <input type="reset" value="重填">
          <input type="submit" value="送出">
        </div>
        <div class="item3">
          <a href="reg.php">註冊帳號</a>
          <span> | </span>
          <a href="">忘記密碼</a>
        </div>
      </form>

      <div class="note">
        <p>登入帳號即可享有個人專屬發票管理頁面！</p>
        <p>您可以：</p>
        <p>1.紀錄所有發票資訊</p>
        <p>2.查詢及編輯您所有紀錄過的發票</p>
        <p>3.一鍵快速對獎</p>
      </div>
    </div>

    <div class="container2">
      <a href="">不登入，進行快速對獎去！</a>
    </div>
  </div>
</body>

</html>