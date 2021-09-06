<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SingaBanga Info</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">


    <!-- ////////////////// Validate ////////////////// -->
    <script language="javascript">
        function isNumberKey(evt) //Number
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            console.log(charCode);
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        function isUppercaseKey(evt) //Uppercase
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            console.log(charCode);
            if (charCode > 31 && (charCode < 65 || charCode > 90))
                return false;

            return true;
        }

        function isLowercaseKey(evt) //Lowercase
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            console.log(charCode);
            if (charCode > 31 && (charCode < 97 || charCode > 122))
                return false;

            return true;
        }

        function isAlphabetKey(evt) //Alphabet + spc
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            console.log(charCode);
            if (charCode > 32 && (charCode < 97 || charCode > 122))
                return false;

            return true;
        }
    </script>

    <!-- ////////////////// End Validate ////////////////// -->
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../images/logo.png" width="40" height="40">
                <span class="ml-2">Desa Singabangsa</span>
            </a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=beranda">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="index.php?page=profil"> - Profil Desa</a>
                            <a class="dropdown-item" href="index.php?page=profil_pemerintah"> - Profil Pemerintahan Desa</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=agenda">
                            Agenda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=galeri">
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=panduan">
                            Panduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=contact">
                            Fastilitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=contact">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>