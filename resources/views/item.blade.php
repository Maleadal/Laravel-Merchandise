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

    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $controller = new ItemController;
    $item = $controller->show($itemId);
    $_SESSION['item'] = $item;
    ?>

    <div class="row justify-content-center">
        <div class="card m-3" style="width: 18rem;">
            <div class="text-center">
                <img src="../../{{$item['image_path']}}" class="card-img-top" style="width: 150px; height: 150px" alt="Image not found">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$item['name']}}</h5>
                <h6 class="card-title">Item Price: ₱{{$item['price']}}</h6>
                <h6 class="card-title">Items Left: {{$item['quantity']}}</h6>
                <h6 class="card-title">Items Sold: {{$item['items_sold'] == 0 ? 0 : $item['items_sold']}}</h6>
            </div>
        </div>
    </div>

    <div class="container-sm">
        <h4>Please input your details below: </h4>
        <form action="/receipt" method="GET">
            <div class="form-group">
                <label for="code">Student Code: </label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Student Code" required>
            </div>
            <div class="form-group">

                <label for="name">Student Name: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Student Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




</body>

</html>