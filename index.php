<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Triangle Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container text-center mt-5 p-5">
    <h1>ตรวจสอบสามเหลี่ยม</h1>
    
    <form action="" method="post" class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label for="side1"><h5>ด้านที่ 1 :</h5></label>
                <input type="number" step="0.01" name="side1" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>

            <div class="col-md-4">
                <label for="side2"><h5>ด้านที่ 2 :</h5></label>
                <input type="number" step="0.01" name="side2" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>

            <div class="col-md-4">
                <label for="side3"><h5>ด้านที่ 3 :</h5></label>
                <input type="number" step="0.01" name="side3" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>
        </div>

        <div class="mt-5">
            <input type="submit" value="ตรวจสอบ" class="btn btn-primary">
        </div>
    </form>

    <?php
    // ฟังก์ชันเพื่อตรวจสอบประเภทของสามเหลี่ยม
    function checkTriangleType($side1, $side2, $side3) {
        // ตรวจสอบด้านที่ไม่ถูกต้อง
        if ($side1 <= 0 || $side2 <= 0 || $side3 <= 0) {
            return "ด้านต้องมีค่ามากกว่า 0";
        }

        // ตรวจสอบทฤษฎีความเท่ากันของสามเหลี่ยม
        if ($side1 + $side2 <= $side3 || $side2 + $side3 <= $side1 || $side1 + $side3 <= $side2) {
            return "Not a Triagle";
        }

        // ตรวจสอบสามเหลี่ยมมุมฉากโดยใช้ทฤษฎีพีทาโกรัส
        $sides = [$side1, $side2, $side3];
        sort($sides);

        if ($sides[0]**2 + $sides[1]**2 == $sides[2]**2) {
            return "right triangle";
        }

        // ตรวจสอบประเภทของสามเหลี่ยม
        if ($side1 == $side2 && $side2 == $side3) {
            return "equilateral triangle";
        } elseif ($side1 == $side2 || $side2 == $side3 || $side1 == $side3) {
            return "isosceles triangle";
        } else {
            return "Scalene triangles";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับค่าด้านของสามเหลี่ยมจากฟอร์ม
        $side1 = $_POST["side1"];
        $side2 = $_POST["side2"];
        $side3 = $_POST["side3"];

        // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
        $result = checkTriangleType($side1, $side2, $side3);
        echo "<h3 class='mt-5'>ประเภทของสามเหลี่ยม : $result</h3>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
