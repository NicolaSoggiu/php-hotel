<?php
$hotels = [

    [
        'name'                 => 'Hotel Belvedere',
        'description'          => 'Hotel Belvedere Description',
        'parking'              => true,
        'vote'                 => 4,
        'distance_to_center'   => 10.4
    ],
    [
        'name'                 => 'Hotel Futuro',
        'description'          => 'Hotel Futuro Description',
        'parking'              => true,
        'vote'                 => 2,
        'distance_to_center'   => 2
    ],
    [
        'name'                 => 'Hotel Rivamare',
        'description'          => 'Hotel Rivamare Description',
        'parking'              => false,
        'vote'                 => 1,
        'distance_to_center'   => 1
    ],
    [
        'name'                 => 'Hotel Bellavista',
        'description'          => 'Hotel Bellavista Descrizione',
        'parking'              => false,
        'vote'                 => 5,
        'distance_to_center'   => 5.5
    ],
    [
        'name'                 => 'Hotel Milano',
        'description'          => 'Hotel Milano Description',
        'parking'              => true,
        'vote'                 => 2,
        'distance_to_center'   => 50
    ],
];

$parking = isset($_GET["parking"]);

$arr_filtered = $hotels;

if ($parking) {
    $arr_filtered = [];

    foreach ($hotels as $hotel) {
        if ($hotel["parking"]) {
            $arr_filtered[] = $hotel;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"
        defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body class="bg-info">
    <div class="container mt-5">
        <h1 class="pb-3 text-center">HOTEL LIST : </h1>
        <form action="" class="d-flex mb-3 align-items-center justify-content-center" style="gap:2rem" method="get">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="parking" name="parking">
                <label class="form-check-label" for="parking">
                    Only with parking
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="/php-hotel/?selected_parking=&selected_vote=Select" type="reset"
                class="btn btn-secondary">Reset</a>
            <label for="vote">Vote</label>
            <select class="form-select w-25 align-items-center" aria-label="Default select example"
                name="selected_vote">
                <option class="selected" selected>Select </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </form>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking space</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance from the center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arr_filtered as $hotel) { ?>
                <tr style="cursor:pointer">
                    <th scope="row"><?= $hotel['name'] ?></th>
                    <td><?= $hotel['description'] ?></td>
                    <td><i
                            class="bi <?= $hotel['parking'] ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger' ?>"></i>
                    </td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>