<?php
$link = mysqli_connect("localhost", 'root', '','ticketing');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>놀이공원 티켓 구매</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <div class="input-wrap">
    <form action="ticketing.php" method="POST">
        <a><b>고객성명 </b><input type="text" name="username"></a><a style="float:right"><input type="submit" name="submit" value="합계"></a><br><br>
            <table width="100%" height="25%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>구분</th>
                        <th colspan="2">어린이</th>
                        <th colspan="2">어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7,000</td>
                        <td>
                            <select name="enter_child">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>10,000</td>
                        <td>
                            <select name="enter_adult">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12,000</td>
                        <td>
                            <select name="BIG3_child">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>16,000</td>
                        <td>
                            <select name="BIG3_adult">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>입장+놀이3</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21,000</td>
                        <td>
                            <select name="free_child">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>26,000</td>
                        <td>
                            <select name="free_adult">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70,000</td>
                        <td>
                            <select name="year_child">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>90,000</td>
                        <td>
                            <select name="year_adult">
                                <?php for ($i = 0; $i <= 100; $i++) echo "<option value='$i'>{$i}명</option>"; ?>
                            </select>
                        </td>
                        <td>입장+놀이자유</td>
                    </tr>
                </tbody>
            </table>
       </form>
        <?php
            if (isset($_POST["submit"])) {
                $name = $_POST["username"];
                $enter_child = $_POST["enter_child"];
                $enter_adult = $_POST["enter_adult"];
                $BIG3_child = $_POST["BIG3_child"];
                $BIG3_adult = $_POST["BIG3_adult"];
                $free_child = $_POST["free_child"];
                $free_adult = $_POST["free_adult"];
                $year_child = $_POST["year_child"];
                $year_adult = $_POST["year_adult"];

                $childTicket = $enter_child * 7000 + $BIG3_child * 12000 + $free_child * 21000 + $year_child * 70000;
                $adultTicket = $enter_adult * 10000 + $BIG3_adult * 16000 + $free_adult * 26000 + $year_adult * 90000;
                $total = $childTicket + $adultTicket;

                date_default_timezone_set('Asia/Seoul');
                $date = date("Y년 m월 d일 H:i:s");
                echo "{$date}<br>";
                echo "{$name} 고객님 감사합니다.<br>";

                if ($enter_child > 0) echo "어린이 입장권 {$enter_child}매<br>";
                if ($enter_adult > 0) echo "어른 입장권 {$enter_adult}매<br>";
                if ($BIG3_child > 0) echo "어린이 BIG3 {$BIG3_child}매<br>";
                if ($BIG3_adult > 0) echo "어른 BIG3 {$BIG3_adult}매<br>";
                if ($free_child > 0) echo "어린이 자유이용권 {$free_child}매<br>";
                if ($free_adult > 0) echo "어른 자유이용권 {$free_adult}매<br>";
                if ($year_child > 0) echo "어린이 연간이용권 {$year_child}매<br>";
                if ($year_adult > 0) echo "어른 연간이용권 {$year_adult}매<br>";

                echo "합계: {$total}원 입니다.";

                $sql = "INSERT INTO scores (username, enter_child, enter_adult, BIG3_child, BIG3_adult, free_child, free_adult, year_child, year_adult)
                VALUES ('$name', '$enter_child', '$enter_adult', '$BIG3_child', '$BIG3_adult', '$free_child', '$free_adult', '$year_child', '$year_adult')";
                mysqli_query($link, $sql);
                }
            ?>
    </div>
    </div>
</body>
</html>

<!--
create database ticketing;
use ticketing;
CREATE TABLE scores (
    username        CHAR(32) NOT NULL,
    enter_child     INT,
    enter_adult     INT,
    BIG3_child      INT,
    BIG3_adult      INT,
    free_child      INT,
    free_adult      INT,
    year_child      INT,
    year_adult      INT
) CHARACTER SET utf8;
describe scores;
-->