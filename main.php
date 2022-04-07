<?php
require 'backend.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Avanture.rs</title>
        <?php include 'css.html';?>
</head>
<?php

    $object1 = new UserInterface();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
       
       if (isset($_POST['podeli'])) {
            $object1->podeli();
        }
    
    }
?>
<body>
    <div class="form">
        <ul class="tab-group">
            <li class="tab"><a href="mojeavanture.php">Moje avanture</a></li>
            <li class="tab active"><a href="aktivneavanture.php">Aktivne avanture</a></li>
        </ul>
        <p>Podelite vase avanture sa celim svetom ili potrazite ljude koji su voljni da vas povedu u novu avanturu.</p>
</br>
        <p>Klikom na Moje avanture imate uvid u avanture koje ste postavili, dok na tabu Aktivne avanture mozete videti sve aktivne avanture</p>
</br>
<div class="tab-content">
    <div id="podeli">
    <h1>Podeli avanturu</h1>
    <form action="main.php" method="post" autocomplete="off">
    <div class="field-wrap">
                <label>
                    Lokacija
                </label>
            <input type="text" required autocomplete="off" name="lokacija">
    </div>
    <div class="field-wrap">
                <label>
                    Datum
                </label>
            <input type="date" required autocomplete="off" name="datum">
    </div>
    <div class="field-wrap">
                <label>
                    Minimalan broj avanturista
                </label>
            <input type="text" required autocomplete="off" name="min">
    </div>
    <div class="field-wrap">
                <label>
                    Maksimalan broj avanturista
                </label>
            <input type="text" required autocomplete="off" name="max">
    </div>
    <div class="field-wrap">
                <label>
                    Opis
                </label>
            <input type="text" required autocomplete="off" name="opis">
    </div>
     
    <button type="submit" class="button-28" name="podeli">Podeli avanturu!</button>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/index.js">
</body>
</html>




