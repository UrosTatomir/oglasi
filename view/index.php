<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Oglasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</head>
<!--background:linear-gradient(to top,gray,white) no-repeat fixed center;-->

<body style="background:linear-gradient(to top,#FFFFF,white)no-repeat fixed center;">
    <?php
    session_start();
    $oglasi_filter = isset($_SESSION['oglasi']) ? $_SESSION['oglasi'] : array();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    $errors = isset($errors) ? $errors : array();
    $msg = isset($msg) ? $msg : "";

    ?>
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark ">
        <a class="navbar-brand" href="../view/routes.php?page=showindex" style="font-family: cursive, sans-serif; font-size:18px; color: #FDE600;">
            OGLASI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php if (empty($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="routes.php?page=showlogin">Prijavi se<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="routes.php?page=showregister">Registracija<span class="sr-only">(current)</span></a>
                    </li>
                <?php } ?>

                <li class="nav-item active">
                    <a class="nav-link" href="routes.php?page=show dodaj oglas">Dodaj oglas<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            &nbsp; &nbsp;
            <form action="routes.php" class="form-inline my-2 my-lg-0">
                <span class="text-white"><?php
                                            if (!empty($_SESSION['user'])) {
                                                echo "Korisnik : " . $_SESSION['user']['name'];
                                            } ?>&nbsp;&nbsp;</span>
                <?php if (isset($user)) { ?>
                    <input class="btn btn-sm btn-outline-warning my-2 my-sm-0" type="submit" name="page" value="Odjavi se">
                <?php } ?>
            </form>
        </div>
    </nav>
    <?php require_once '../model/DAO.php';
    $dao = new DAO();
    $gradovi = $dao->getAllGradovi();
    $kategorije = $dao->getAllKategorije();
    $oglasi = $dao->getAllOglasi();
    
    ?>
    <div class="container-fluid">
        <div class="container  col-10 mt-5 mb-5 p-3">
            <h3><a class="text-dark" href="routes.php?page=showindex">Oglasi</a></h3>

            <form action="routes.php">
                <div class="row col-8">
                    <div class="col-sm">
                        <label>Odaberite grad</label>
                        <select class="form-control" name="mesto">
                            <option value=""></option>
                            <?php
                            foreach ($gradovi as $m) {
                                echo "<option value='$m[mesto]'>$m[mesto]</option>";
                            }
                            ?>
                        </select>
                        <span class="alert-danger">
                            <?php if (array_key_exists('mesto', $errors)) {
                                echo $errors['mesto'];
                            } ?>
                        </span>
                    </div>
                    <div class="col-sm">
                        <label>Odaberite kategoriju</label>
                        <select class="form-control " name="kategorija">
                            <option value=""></option>
                            <?php
                            foreach ($kategorije as $k) {
                                echo "<option value='$k[kategorija]'>$k[kategorija]</option>";
                            }
                            ?>
                        </select>
                        <span class="alert-danger">
                            <?php if (array_key_exists('kategorija', $errors)) {
                                echo $errors['kategorija'];
                            } ?>
                        </span>

                    </div>
                    <div class="col-sm">
                        <label>Odaberite cenu</label>
                        <input type="number" name="cena" class="form-control" placeholder=" max: cena">
                        <span class="alert-danger">
                            <?php if (array_key_exists('cena', $errors)) {
                                echo $errors['cena'];
                            } ?>
                        </span>
                    </div>
                    <div class="col-2">
                        <hr class="invisible">
                        <button type="submit" class="btn btn-success" name="page" value="odaberi">Odaberi</button>
                    </div>
                </div>
            </form>
            <br>
            <?php
            if (!empty($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo "<span class='bg-success text-light'>$msg</span>";
            }
            ?>
            <table class="table table-muted  text-center">
                <thead>
                    <tr>
                        <th>
                            </td>
                            <!-- <th>Naziv</th> -->
                        <th>Naziv i Opis</td>
                        <th>Cena</td>
                        <th>Mesto</td>
                        <th>Kontakt telefon</td>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                        <?php
                        if (isset($_SESSION['oglasi']) && isset($oglasi_filter)) {

                            foreach ($oglasi_filter as $filter) { ?>
                                <tr>
                                    <th><img src="../images/<?php echo $filter['slika']; ?>" width="150" height="150" /></th>
                                    <td><?php echo '<h4>' . $filter['naziv'] . '</h4><br>' . $filter['opis']; ?></td>
                                    <th><?php echo $filter['cena']; ?></th>
                                    <th><?php echo $filter['mesto']; ?></th>
                                    <th><?php echo $filter['telefon']; ?><br><br><small>Objavljen :<?php echo $filter['vreme_oglasa']; ?></small> &#8364;<br><br><a class="btn btn-info btn-sm" href="routes.php?page=details&id_oglasa=<?php echo $filter['id_oglasa']; ?>">More details</a></th>
                                    <?php if (!empty($_SESSION['user']) && !empty($user['admin'] == 1)) {  ?>
                                        <th>
                                            <a class="text-right" href="routes.php?page=delete&id_oglasa=<?php echo $filter['id_oglasa']; ?>"><i class="fa fa-times" style="font-size:35px;color:red"></i></a>
                                        </th>
                                    <?php } ?>
                                </tr>
                            <?php   }
                    } else {
                        foreach ($oglasi as $value) {
                            ?>
                                <tr>
                                    <th><img src="../images/<?php echo $value['slika']; ?>" width="170" height="150" /></th>
                                    <td><?php echo '<h4>' . $value['naziv'] . '</h4><br>' . $value['opis']; ?></td>
                                    <th><?php echo $value['cena']; ?></th>
                                    <th><?php echo $value['mesto']; ?></th>
                                    <th><?php echo $value['telefon']; ?><br><br><small>Objavljen :<?php echo $value['vreme_oglasa']; ?></small> &#8364;<br><br><a class="btn btn-info btn-sm" href="routes.php?page=details&id_oglasa=<?php echo $value['id_oglasa']; ?>">More details</a></th>
                                    <?php if (!empty($_SESSION['user']) && !empty($user['admin'] == 1)) {  ?>
                                        <th>
                                            <a class="text-right" href="routes.php?page=delete&id_oglasa=<?php echo $value['id_oglasa']; ?>"><i class="fa fa-times" style="font-size:35px;color:red"></i></a>
                                        </th>
                                    <?php } ?>
                                </tr>
                            <?php }
                    } ?>
                    </div>
                </tbody>
            </table>

        </div>
    </div>
    <footer class=" bg-dark fixed-bottom">
        <div class="container text-center">

            <p><a class="text-white" href="#">Copyright by PHP DEVLOPERS 2019</a></p>

        </div>
    </footer>
</body>

</html>