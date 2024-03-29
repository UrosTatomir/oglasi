<!DOCTYPE <!DOCTYPE html>
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
<body style="background-color:#FFFFF0;">
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="../view/routes.php?page=showindex" style="font-family: cursive, sans-serif; font-size:18px; color: #FDE600;">
            OGLASI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <!-- <a class="nav-link" href="">Register<span class="sr-only">(current)</span></a> -->
                </li>

            </ul>
            <!-- <input class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="page" value="Izloguj se"> -->
            </form>

        </div>
    </nav>
    <?php
    $errors = isset($errors) ? $errors : array();
    $msg = isset($msg) ? $msg : "";
    ?>
    <div class="container-fluid">
        <div class="container mt-5 p-5">
            <div class="container mt-5 col-4 text-center">
                <h4>Prijava</h4>
                <form action="routes.php" method="post">
                    <input class="form-control" type="text" name="username" placeholder="username">
                    <br>
                    <input class="form-control" type="password" name="password" placeholder=" password">
                    <br>
                    <input class="btn btn-primary" type="submit" name="page" value="Prijavi se">
                </form>
                &nbsp;
                <!-- skracenica za razmak ili <br>-->
                <h5>Niste registrovani </h5>
                <h5>Molimo vas - <a class="text-right" href="routes.php?page=showregister">REGISTRUJTE SE</a></h5>
                <?php
                if (!empty($msg)) {   //sve sto saljemo includom $msg ide ovako
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>

                <?php if (!empty($_GET['msg'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['msg']; ?>
                    </div>
                <?php
            } ?>
            </div>

        </div>
        <?php if (isset($register) && $register == 1) { ?>
            <div class="container col-4 mb-5 p-5 text-center bg-dark text-white">
                <h4>Registracija</h4>
                <form action="routes.php" method="post">
                    <input class="form-control" type="text" name="name" placeholder="Unesite Ime">
                    <span class="alert-danger">
                        <?php if (array_key_exists('name', $errors)) {
                            echo $errors['name'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="text" name="surname" placeholder="Unesite Prezime">
                    <span class="alert-danger">
                        <?php if (array_key_exists('surname', $errors)) {
                            echo $errors['surname'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="text" name="phone" placeholder="Unesite vas broj telefona">
                    <span class="alert-danger">
                        <?php if (array_key_exists('phone', $errors)) {
                            echo $errors['phone'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="text" name="email" placeholder="Unesite email">
                    <span class="alert-danger">
                        <?php if (array_key_exists('email', $errors)) {
                            echo $errors['email'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="text" name="username" placeholder="Unesite username">
                    <span class="alert-danger">
                        <?php if (array_key_exists('username', $errors)) {
                            echo $errors['username'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="password" name="password" placeholder="Unesite password">
                    <span class="alert-danger">
                        <?php if (array_key_exists('password', $errors)) {
                            echo $errors['password'];
                        } ?>
                    </span>
                    <br>
                    <input class="form-control" type="password" name="confirmpassword" placeholder="Potvrdite  password">
                    <span class="alert-danger">
                        <?php if (array_key_exists('confirmpassword', $errors)) {
                            echo $errors['confirmpassword'];
                        } ?>
                    </span>
                    <br>
                    <input class="btn btn-warning" type="submit" name="page" value="Registracija">
                </form>
                <?php
                // echo "<span class=alert-warning>$msg</span>";
                if (!empty($msg)) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg;  ?>
                    </div>
                <?php
            } ?>
                <!--super fora zapamtiti-->
            </div>
        <?php } ?>
    </div>
    <!--end container-fluid-->
    <footer class=" bg-dark fixed-bottom">
        <div class="container text-center">

            <p><a class="text-white" href="#">Copyright by PHP DEVLOPERS 2019</a></p>

        </div>
    </footer>
</body>

</html>