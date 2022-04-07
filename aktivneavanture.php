<?php
session_start();

$connect = mysqli_connect('localhost','root','','nalozi');
$id=$_SESSION['id'];
$query="SELECT * FROM avanture ORDER BY id DESC ";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Avanture.rs Aktivne Avanture</title>
        <?php include 'css.html';?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form">
</br>
 <h1>Aktivne avanture</h1>
</br>
<div class="container" style="width:700px" align="center">
    <div class="table-responsive" id="tabela">
        <table class="table table-bordered">
            <tr>
                <th><a class="column_sort" id="id" data-order="desc" href="#">ID</a></th>
                <th><a class="column_sort" id="first_name" data-order="desc" href="#">Organizator</a></th>
                <th><a class="column_sort" id="lokacija" data-order="desc" href="#">Lokacija</a></th>
                <th><a class="column_sort" id="datum" data-order="desc" href="#">Datum</a></th>
                <th><a class="column_sort" id="min" data-order="desc" href="#">Min</a></th>
                <th><a class="column_sort" id="max" data-order="desc" href="#">Max</a></th>
                <th><a class="column_sort" id="opis" data-order="desc" href="#">Opis</a></th>
                <th><a class="column_sort" id="datum_postavljanja" data-order="desc" href="#">Vreme objave</a></th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["first_name"];?></td>
                <td><?php echo $row["lokacija"];?></td>
                <td><?php echo $row["datum"];?></td>
                <td><?php echo $row["min"];?></td>
                <td><?php echo $row["max"];?></td>
                <td><?php echo $row["opis"];?></td>
                <td><?php echo $row["datum_postavljanja"];?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<a href="main.php"><button class="button-28">Dodajte jos avantura</button></a>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $(document).on('click','.column_sort', function(){
            var column_name = $(this).attr("id");
            var order = $(this).data("order");
            var arrow = '';
            if(order == 'desc'){
                arrow='&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
            }
            else{
                arrow='&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
            }


            $.ajax({
                url:"raspored.php",
                method:"POST",
                data:{column_name:column_name, order:order},
                success:function(data)
                {
                    $('tabela').html(data);
                    $('#'+column_name+'').append(arrow);
                }
            })
        })
    });
</script>