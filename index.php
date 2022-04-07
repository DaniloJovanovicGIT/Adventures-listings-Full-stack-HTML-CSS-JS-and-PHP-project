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
        if(isset($_POST['login'])){
            $object1->login();
        }
        elseif (isset($_POST['register'])) {
            $object1->register();
        }
        elseif (isset($_POST['subscribe'])) {
            $object1->subscribe();
        }
        elseif (isset($_POST['unsubscribe'])) {
            $object1->unsubscribe();
        }
    }
?>
<body>
    <div class="form">
        <ul class="tab-group">
            <li class="tab"><a href="#signup">Registruj se</a></li>
            <li class="tab active"><a href="#login">Pronađi avanture</a></li>
        </ul>
        <p>Zdravo dobrodosili na sajt Avanture.rs, ovde mozete objaviti vase planove za odlazak na planinu, jezero, reku ili more</p>
</br>
        <p>Ukoliko zelite da idete sa vecim drustvom i upoznate nove avantursite pogledajte vec aktivne polaske na avanture</p>
</br>
<div class="tab-content">
    <div id="login">
        <h1>Dobrodošli, avanture vas čekaju!</h1>
    <form action="index.php" method="post" autocomplete="off">
            <div class="field-wrap">
                <label>Email adresa<span class="req">*</span>
                </label>
            <input type="email" required autocomplete="off" name="email">
            </div>
        <div class="field-wrap">
            <label>
                Šifra<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password">
        </div>
        <button class="button-28" name="login">Prijavi se</button>
    </form>
    <div id="signup">
    <h1>Registruj se za 5 sekundi.</h1>
    <form action="index.php" method="post" autocomplete="off">
    <div class="field-wrap">
                <label>
                    Ime<span class="req">*</span>
                </label>
            <input type="text" required autocomplete="off" name="firstname">
            </div>
        <div class="field-wrap">
            <label>
                Prezime<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="lastname">
        </div>
        <div class="field-wrap">
                <label>Email adresa<span class="req">*</span>
                </label>
            <input type="email" required autocomplete="off" name="email">
            </div>
        <div class="field-wrap">
            <label>
                Izaberite šifru<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password">
        </div>
    <button type="submit" class="button-28" name="register">Registruj se</button>
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




