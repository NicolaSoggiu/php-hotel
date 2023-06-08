<?php function filter_condition($hotel, $parking, $min_rating)
{
    $condition_parking = true;
    if ($parking) {
        $condition_parking = $hotel["parking"];
    }
    $condition_rating = true;
    if ($min_rating) {
        $condition_rating = $hotel["vote"] >= $min_rating;
    }
    return $condition_parking && $condition_rating;
}

function print_row($hotel)
{ ?>
    <tr style="cursor:pointer">
        <th scope="row"><?= $hotel['name'] ?></th>
        <td><?= $hotel['description'] ?></td>
        <td><i class="bi <?= $hotel['parking'] ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger' ?>"></i>
        </td>
        <td><?= $hotel['vote'] ?></td>
        <td><?= $hotel['distance_to_center'] ?></td>
    </tr> <?php
        }


        $parking = isset($_GET["parking"]);
        $min_rating = $_GET["rating"] ?? "";

        $arr_filtered = array_filter($hotels, fn ($hotel) => filter_condition($hotel, $parking, $min_rating));
