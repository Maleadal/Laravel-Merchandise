<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php $title = isset($_GET['page']) ? $_GET['page'] : "Home";
            echo $title ?></title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    {{View::make('header')}}
    <br><br>
    <div class="mt-4 pt-10 text-center text-white">
        <h2>
            Colleges
        </h2>
    </div>

    <div class="row px-3 mx-4">
        <?php

        use App\Http\Controllers\CollegeController;
        use App\Http\Controllers\ItemController;

        $college = new CollegeController;
        $items = new ItemController;
        foreach ($college->index() as $colleges) {
            echo "" .
                "<a class='btn btn-primary' href='/college/" . $colleges['id'] . "'>" .
                $colleges['name'] .
                "</a>";
        }
        ?>
    </div>

    <div class="text-center text-white">
        <h2>Hot Products</h2>
    </div>
    <?php
    $jsonItems = $items->index();
    ?>
    <div class="container">

        <div>
            <table class="table table-striped table-dark table-hover">
                <tr class="text-center">
                    <th scope="col">Image</th>
                    <th scope="col">College</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Sold</th>
                </tr>

                <?php

                foreach ($jsonItems as $item) {
                ?>
                    <tr>
                        <td class="text-center"><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}"><img src="{{$item['image_path']}}" style="width:15%"></a></td>
                        <td><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}">{{$item['department_id']}}</a></td>
                        <td><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}">{{$item['name']}}</a></td>
                        <td><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}">{{$item['price']}}</a></td>
                        <td><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}">{{$item['quantity']}}</a></td>
                        <td><a href="{{'/college/' . $item['department_id'] . '/' . $item['id']}}">{{$item['item_sold']}}</a></td>
                    </tr>


                <?php
                }

                ?>

            </table>
        </div>
    </div>

</body>

<style>
    body {
        background-image: url("assets/background.png");
    }

    td a,
    div a {
        display: block;
    }
</style>

</html>