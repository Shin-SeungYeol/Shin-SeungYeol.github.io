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
    <form action="ticket.php" method="POST">
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
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>10,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>16,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>입장+놀이3</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>26,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>90,000</td>
                        <td><select>
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                        </select></td>
                        <td>입장+놀이자유</td>
                    </tr>
                </tbody>
            </table>
       </form>
       <?php echo date("Y년 m월 d일 시간: H:i:s"); ?>
    </div>
    <?php
        if (isset($_POST["submit"])) {
            $name = $_POST["username"];
            $childrenTicket = $_POST["childrenTicket"] * 7000;
            $adultTicket = $_POST["adultTicket"] * 10000;
            $total = $childrenTicket + $adultTicket;

            $date = date("Y년 m월 d일 시간: H:i:s");

            echo "<div style='border:1px solid #ccc; padding:10px;'>";
            echo "<b>{$date}</b><br>";
            echo "<b>{$name} 고객님 감사합니다.</b><br>";
            echo "합계: {$total}원 입니다.";
            echo "</div>";
        }
        ?>
</body>
</html>
<!--
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>놀이공원 티켓 구매</title>
    <style>
        .input-wrap { width: 960px; margin: 0 auto; }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table { border: 1px solid #000; margin: 0 auto; }
        td, th { border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="input-wrap">
        <h1>놀이공원 티켓 구매</h1>
        <form action="" method="POST">
            <b>고객성명: </b><input type="text" name="customerName" required>
            <input type="submit" name="submit" value="합계">
            <br><br>
            <table width="100%">
                <thead>
                    <tr>
                        <th>NO</th><th>구분</th><th colspan="2">어린이</th><th colspan="2">어른</th><th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td><td>입장권</td><td>7,000</td>
                        <td><select name="childrenTicket">
                            <option value="0">0명</option><option value="1">1명</option><option value="2">2명</option>
                        </select></td>
                        <td>10,000</td>
                        <td><select name="adultTicket">
                            <option value="0">0명</option><option value="1">1명</option><option value="2">2명</option>
                        </select></td>
                        <td>입장</td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br>

        <?php
        if (isset($_POST["submit"])) {
            $name = $_POST["customerName"];
            $childrenTicket = $_POST["childrenTicket"] * 7000;
            $adultTicket = $_POST["adultTicket"] * 10000;
            $total = $childrenTicket + $adultTicket;

            $date = date("Y년 m월 d일 시간: H:i:s");

            echo "<div style='border:1px solid #ccc; padding:10px;'>";
            echo "<b>{$date}</b><br>";
            echo "<b>{$name} 고객님 감사합니다.</b><br>";
            echo "합계: {$total}원 입니다.";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
-->