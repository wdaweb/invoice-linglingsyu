<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票中獎號碼</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
            list-style: none;
        }
        body,html{
            height:100%;
            font-family:'Roboto', 'Noto Sans TC', sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            width: 600px;
        }
        input{
            width: 100px;
        }


    </style>
</head>

<body>
<form action="?">
    <div class="container">
        <h1>請輸入統一發票中獎號碼</h1>
        <p>可參考<a href="https://www.etax.nat.gov.tw/etw-main/web/ETW183W1/" target="_blank">財政部統一發票中獎號碼</a></p>
        <div class="year">
            年月份
            <select name="year" id="year">
                <?php
                $year = date("Y") - 1911;
                $ly = $year - 1;
                $ny = $year + 1;
                echo "<option value='$ly'>" . $ly . "</option>";
                echo "<option value='$year' selected>" . $year . "</option>";
                echo "<option value='$ny'>" . $ny . "</option>";
                ?>
            </select>
            <select name="period" id="period">
                <option value='1-2'>01-02月</option>
                <option value='3-4'>03-04月</option>
                <option value='5-6'>05-06月</option>
                <option value='7-8'>07-08月</option>
                <option value='9-10'>09-10月</option>
                <option value='11-12'>11-12月</option>
            </select>
        </div>
 
            <div class="item">
                <div class="numer">
                    <label for="special">特別獎
                        <input type="text" name="special" id="special">
                    </label></div>
                <div class="bonus">
                    同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元
                </div>
            </div>
            <div class="item">
                <div class="numer">
                    <label for="top">特獎
                        <input type="text" name="top" id="top">
                    </label></div>
                <div class="bonus">
                同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元
                </div>
            </div>
            <div class="item">
                <div class="numer">
                    <label for="first_prize1">頭獎
                        <input type="text" name="first_prize1" id="first_prize1">
                        <input type="text" name="first_prize2" id="first_prize2">
                        <input type="text" name="first_prize3" id="first_prize3">
                    </label></div>
                <div class="bonus">
                同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元
                </div>
            </div>
            <div class="item">
                <div class="numer">二獎</div>
                <div class="bonus">
                同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元
                </div>
            </div>
            <div class="item">
                <div class="numer">三獎</div>
                <div class="bonus">
                同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元
                </div>
            </div>
            <div class="item">
                <div class="numer">四獎</div>
                <div class="bonus">
                同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元
                </div>
            </div>
            <div class="item">
                <div class="numer">五獎</div>
                <div class="bonus">
                同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元
                </div>
            </div>
            <div class="item">
                <div class="numer">六獎</div>
                <div class="bonus">
                同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元
                </div>
            </div>
            <div class="item">
                <div class="numer">
                    <label for="addprize">增開六獎
                        <input type="text" name="addprize" id="addprize">
                    </label></div>
            </div>
            <div class="item">
                <input type="submit" value="送出">
                <input type="reset" value="重填">
            </div>

    </div>


</form>
</body>

</html>