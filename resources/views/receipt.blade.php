<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <?php

    use App\Http\Controllers\ItemController;
    use App\Http\Controllers\CollegeController;
    use App\Http\Controllers\ReservationController;
    use Illuminate\Support\Carbon;

    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $controller = new ItemController;
    $collegeController = new CollegeController;
    $item = $_SESSION['item'];

    $college = $collegeController->show($item['department_id']);
    $studentName = $_GET['name'];
    $studentCode = $_GET['code'];

    $reserve = new ReservationController;
    $reserve->create($studentCode, $item);
    $controller->edit($item['id']);
    ?>
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
            <div class="text-center">
                <img src="../../{{$item['image_path']}}" class="card-img-top" style="width: 150px; height: 150px" alt="Image not found">
            </div>
            <h5 class="card-title">Receipt</h5>
            <h6 class="card-subtitle mb-2 text-muted">Present this receipt to the Office of the College of {{$college}}</h6>
            <p class="card-text">Item Name: {{$item['name']}}</p>
            <p class="card-text">Item Price: {{$item['price']}}</p>
            <p class="card-text">Student Code: {{strtoupper($studentCode)}}</p>
            <p class="card-text">Student Name: {{$studentName}}</p>
            <p class="card-text">Claim Date: {{Carbon::now()->addDays(7)}}</p>
        </div>
    </div>

</body>

</html>