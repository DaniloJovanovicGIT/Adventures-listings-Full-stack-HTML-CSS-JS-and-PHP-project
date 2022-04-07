<?php
session_start();
$connect = mysqli_connect('localhost','root','','nalozi');
$id=$_SESSION['id'];
$output='';
$order = $_POST['order'];
if($order == 'desc'){
$order='asc';
}
else{
    $order == 'desc'}
$query="SELECT * FROM avanture WHERE user_id='$id' ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";
$result = mysqli_query($connect, $query);
$output .= '
<table class="table table-bordered">
            <tr>
                <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID avanture</a></th>
                <th><a class="column_sort" id="first_name" data-order="'.$order.'" href="#">Organizator</a></th>
                <th><a class="column_sort" id="lokacija" data-order="'.$order.'" href="#">Lokacija</a></th>
                <th><a class="column_sort" id="datum" data-order="'.$order.'" href="#">Datum</a></th>
                <th><a class="column_sort" id="min" data-order="'.$order.'" href="#">Min</a></th>
                <th><a class="column_sort" id="max" data-order="'.$order.'" href="#">Max</a></th>
                <th><a class="column_sort" id="opis" data-order="'.$order.'" href="#">Opis</a></th>
                <th><a class="column_sort" id="datum_postavljanja" data-order="'.$order.'" href="#">Vreme objave</a></th>
            </tr>';
          
            while($row = mysqli_fetch_array($result))
            {
            $output .='
            <tr>
                <td>' .  $row["id"]; . '</td>
                <td>' .  $row["first_name"]; . '</td>
                <td>' .  $row["lokacija"]; . '</td>
                <td>' .  $row["datum"]; . '</td>
                <td>' .  $row["min"]; . '</td>
                <td>' .  $row["max"]; . '</td>
                <td>' .  $row["opis"]; . '</td>
                <td>' .  $row["datum_postavljanja"]; . '</td>
            </tr>';
            }
        $output .= '</table>';
    echo $output;
    ?>



