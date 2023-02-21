<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>计算食品保质日期</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="productionDate">生产日期：</label>
        <input type="date" id="productionDate" name="productionDate"><br><br>
        <label for="shelfLife">保质期：</label>
        <input type="number" id="shelfLife" name="shelfLife">
        <select id="shelfLifeUnit" name="shelfLifeUnit">
            <option value="days">天</option>
            <option value="months">月</option>
            <option value="years">年</option>
        </select><br><br>
        <input type="submit" value="计算保质期截止日期">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productionDate = $_POST['productionDate']; // 生产日期
        $shelfLife = $_POST['shelfLife']; // 保质期
        $shelfLifeUnit = $_POST['shelfLifeUnit']; // 保质期单位

        // 调用函数计算保质期截止日期
        $expiryDate = calculateExpiryDate($productionDate, $shelfLife, $shelfLifeUnit);

        // 输出结果
        echo "<br><br>生产日期：" . $productionDate . "<br>";
        echo "保质期：" . $shelfLife . " " . $shelfLifeUnit . "<br>";
        echo "保质期截止日期：" . $expiryDate;
    }

    function calculateExpiryDate($productionDate, $shelfLife, $shelfLifeUnit) {
        switch ($shelfLifeUnit) {
            case 'days':
                $expiryDate = date('Y-m-d', strtotime($productionDate . ' + ' . $shelfLife . ' days'));
                break;
            case 'months':
                $expiryDate = date('Y-m-d', strtotime($productionDate . ' + ' . $shelfLife . ' months'));
                break;
            case 'years':
                $expiryDate = date('Y-m-d', strtotime($productionDate . ' + ' . $shelfLife . ' years'));
                break;
            default:
                $expiryDate = 'Invalid shelf life unit';
                break;
        }
        return $expiryDate;
    }
    ?>
</body>
	<div>
		</a>&nbsp;<a title="Copyright" target="_blank" href="https://qmq.moe/"><img src="https://img.shields.io/badge/Copyright%20%C2%A9%202023--2023-%E9%B8%AD%E9%B8%AD-red"></a>
	</div>
</html>
