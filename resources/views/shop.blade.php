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

    $controller = new ItemController;

    // echo $controller->getByCollege($id);
    ?>

    <form action="/college/{{$id}}" method="GET">
        <input type="text" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>

    <div class="row">
        <?php
        foreach ($controller->getByCollege($id) as $item) {
            if (isset($_GET['search'])) {
                if (str_contains(strtolower($item['name']), strtolower($_GET['search']))) {

        ?>
                    <div class="card mx-2" style="width: 18rem;">
                        <div class="text-center">
                            <img src="../{{$item['image_path']}}" class="card-img-top" style="width: 150px; height: 150px" alt="Image not found">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$item['name']}}</h5>
                            <h6 class="card-title">Item Price: ₱{{$item['price']}}</h6>
                            <h6 class="card-title">Items Left: {{$item['quantity']}}</h6>
                            <h6 class="card-title">Items Sold: {{$item['items_sold'] == 0 ? 0 : $item['items_sold']}}</h6>
                            <a href=<?php echo $id . "/" . $item['id'] ?> class="btn btn-primary">Buy Now!</a>
                        </div>
                    </div>

                <?php
                }
            } else {

                ?>
                <div class="card mx-2" style="width: 18rem;">
                    <div class="text-center">
                        <img src="../{{$item['image_path']}}" class="card-img-top" style="width: 150px; height: 150px" alt="Image not found">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$item['name']}}</h5>
                        <h6 class="card-title">Item Price: ₱{{$item['price']}}</h6>
                        <h6 class="card-title">Items Left: {{$item['quantity']}}</h6>
                        <h6 class="card-title">Items Sold: {{$item['items_sold'] == 0 ? 0 : $item['items_sold']}}</h6>
                        <a href=<?php echo $id . "/" . $item['id'] ?> class="btn btn-primary">Buy Now!</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>