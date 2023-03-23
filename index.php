<?php
require 'config.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-----------KIT fontawsesome ---------------------->
    <script src="https://kit.fontawesome.com/2ff52a64bf.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg">
        <div class="container px-4 px-lg-5">
            <img src="pic/logo2.png" alt="" style="width : 9%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="btn btn-outline-dark mt-auto"onclick="getProfile()" href="profile.php"><i class="fa-solid fa-user">profile</i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header>
        <div>
            <img class="img" src="pic/photo2.jpg" alt="" style="width: 100%;">

        </div>
    </header><br>
    <!-- Section-->
    <!---filtre--->
    <?php
  if(isset($_POST['recherche'])){
     $con = mysqli_connect('localhost', 'root', '', 'biblio');
     $search = $_POST['search'];
     $etat = $_POST['etat'];
     $type = $_POST['type'];
     $result ="";

     if($search!=""){
        $query="SELECT * FROM `ouvrages` WHERE titre = '$search'";
        $result= mysqli_query($con,$query);

     }
     elseif($type!=""){
        $query="SELECT * FROM `ouvrages` WHERE `type` = '$type'";
        $result= mysqli_query($con,$query);
     }
     elseif($search!="" && $type!=""){
        $query="SELECT * FROM `ouvrages` WHERE titre = $search and 'type' = $type ";
        $result= mysqli_query($con,$query);
        }
     while($row=mysqli_fetch_assoc($result)){ 
        echo'
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <div class="col mb-5">
                    <div class="card h-100 ">
                        <!-- Product image-->
                        <img class="card-img-top" src="'.$row['image_cover'].'" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> '.$row['titre'].'</h5>
                                <h6  class="fw-bolder">'.$row['etat'].'</h6>
                                <h6  class="fw-bolder">'.$row['type'].'</h6>
                                <h6  class="fw-bolder">'.$row['date_achat'].'</h6>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Reserver</a></div>
                        </div>
                    </div>
                </div>
    </section>';}}
        ?>
        <?php
         if(isset($_POST['recherche'])){
            $con = mysqli_connect('localhost', 'root', '', 'biblio');
            $search = $_POST['search'];
            $etat = $_POST['etat'];
            $type = $_POST['type'];
            $result ="";
            if($etat!=""){
                $query="SELECT * FROM `ouvrages` WHERE etat = '$etat'";
                $result= mysqli_query($con,$query);
             }
             elseif($search!="" && $type!=""){
                $query="SELECT * FROM `ouvrages` WHERE titre = $search and 'type' = $type ";
                $result= mysqli_query($con,$query);
               }
             while($row=mysqli_fetch_assoc($result)){ 
                echo'
                <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                            <div class="card h-100 ">
                                <!-- Product image-->
                                <img class="card-img-top" src="'.$row['image_cover'].'" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"> '.$row['titre'].'</h5>
                                        <h6  class="fw-bolder">'.$row['etat'].'</h6>
                                        <h6  class="fw-bolder">'.$row['type'].'</h6>
                                        <h6  class="fw-bolder">'.$row['date_achat'].'</h6>
        
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Reserver</a></div>
                                </div>
                            </div>
                        </div>
            </section>';}}
        ?>
    <br>
    <div class="top-nav-right">
        <form class="form-inline" action="#" method="post" style="display: flex;">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="search" placeholder="Search" style="width:10vw;">
            </div>
            <div class="form-group mx-sm-3 mb-3">
                <select class="form-select" aria-label="Default select example" name="etat">
                    <option selected name="etat">Etat</option>
                    <option value="neuf" name="neuf">neuf</option>
                    <option value="occasion" name="occasion">occasion</option>
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-3">
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>Type</option>
                    <option value="Livre" name="livre">livre</option>
                    <option value="Roman" name="roman">Roman</option>
                    <option value="DVD" name="dvd">dvd</option>
                    <option value="mémoire de recherche" name="memoire">mémoire de recherche</option>
                </select>
            </div>
            <button type="submit" name="recherche" class="btn btn-primary mb-2"
                style="background-color: #DFF3FC;border:1px solid #000;color:#000;margin-top:-1%;"
                id="btn">SEARCH</button>
        </form>
    </div>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                    $result = mysqli_query($conn, 'SELECT * FROM `ouvrages`');
                    $row = mysqli_fetch_assoc($result);
                    while ($row = mysqli_fetch_assoc($result))
                    echo'
                    <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="'.$row['image_cover'].'" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> '.$row['titre'].'</h5>
                                <h6  class="fw-bolder">'.$row['etat'].'</h6>
                                <h6  class="fw-bolder">'.$row['type'].'</h6>
                                <h6  class="fw-bolder">'.$row['date_achat'].'</h6>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Reserver</a></div>
                        </div>
                    </div>
                </div>'?>


    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Public Library</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>