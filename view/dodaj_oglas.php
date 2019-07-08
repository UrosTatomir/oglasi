<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dodaj Oglas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
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

<body style="background:linear-gradient(to top,#50453D,white) no-repeat fixed center;">
    <?php
    require_once '../model/DAO.php';
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    ?>
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="../view/routes.php?page=showindex" style="font-family: cursive, sans-serif; font-size:18px; color: #FDE600;">
            OGLASI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form action="routes.php" class="form-inline my-2 my-lg-0">
                <span class="text-white"><?php
                                            if (!empty($_SESSION['user'])) {
                                                echo "Korisnik : " . $_SESSION['user']['name'];
                                            } ?>&nbsp;&nbsp;</span>

                <input class="btn btn-sm btn-outline-warning my-2 my-sm-0" type="submit" name="page" value="Odjavi se">
            </form>

        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="container mt-5 mb-5 p-4   text-dark col-5">
            <h4>Popunite sva polja u formi</h4>
            <?php
            $dao = new DAO();
            $gradovi = $dao->getAllGradovi();
            $kategorije = $dao->getAllKategorije();
            $msg = isset($msg) ? $msg : "";
            $errors = isset($errors) ? $errors : array();
            //provera da li postoji niz sa greskama
            ?>
            <form enctype="multipart/form-data" action="routes.php" method="post">
                <div class="form-group">
                    <input type="text" name="naziv" placeholder="Naziv oglasa">
                    <br>
                    <span class="alert-danger">
                        <?php if (array_key_exists('naziv', $errors)) {
                            echo $errors['naziv'];
                        }
                        ?>
                    </span>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Odaberite kategoriju</label>
                            <select class="form-control " name="kategorija">
                                <option value=""></option>
                                <?php
                                foreach ($kategorije as $k) {
                                    echo "<option value='$k[kategorija]'>$k[kategorija]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Odaberite grad</label>
                            <select class="form-control" name="mesto">
                                <option value=""></option>
                                <?php
                                foreach ($gradovi as $m) {
                                    echo "<option value='$m[mesto]'>$m[mesto]</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <textarea type="text" name="opis" placeholder="opis oglasa" rows="5" cols="68"></textarea>
                    <br>
                    <span class="alert-danger">
                        <?php if (array_key_exists('opis', $errors)) {
                            echo $errors['opis'];
                        }
                        ?>
                    </span>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="cena" placeholder="Cena">
                            <br>
                            <span class="alert-danger">
                                <?php if (array_key_exists('cena', $errors)) {
                                    echo $errors['cena'];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="col">
                            <input type="text" name="telefon" placeholder="kontakt telefon">
                            <br>
                            <span class="alert-danger">
                                <?php if (array_key_exists('telefon', $errors)) {
                                    echo $errors['telefon'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Odaberite sliku</label>
                            <br>
                            <input type="file" name="upload_img">
                            <!-- <input type="submit" value="Upload Image" name="submit"> -->
                            <br>
                            <span class="alert-danger">
                                <?php if (array_key_exists('upload_img', $errors)) {
                                    echo $errors['upload_img'];
                                } ?>
                            </span>
                        </div>
                        <div class="col">
                            <br>
                            <button class="btn btn-success" type="submit" name="page" value="dodaj oglas">Dodaj oglas</button>
                        </div>
                    </div>
                </div>
                <!--end form-group-->
            </form>

            <?php
            if (!empty($msg)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php } ?>
            <br>
            <form action="routes.php" method="get">
                <button class="btn btn-primary btn-lg" type="submit" name="page" value="showindex"> &#127968;</button>
            </form>
        </div>
        <!--end container-->
    </div>
    <!--end container-fluid-->
    <footer class=" bg-dark fixed-bottom">
        <div class="container text-center">

            <p><a class="text-white" href="#">Copyright by PHP DEVLOPERS 2019</a></p>

        </div>
    </footer>
</body>

</html>