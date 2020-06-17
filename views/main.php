<!doctype html>
<html>
   <head>
       <title>Twitter</title>
       <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       <link href="../public/css/style.css" rel="stylesheet">
   </head>
   <body>
      <main class="container-bg">
          <!-- <header class="text-center">
              <h1>Twitter</h1> -->

          <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="#"><i class="fa fa-twitter"></i> Twitter</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item my-auto active">
                          <a class="nav-link" href="?page=home"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                      </li>

                      <?php
                      if ($isLoggedIn){ ?>
                          <li class="nav-item my-auto">
                              <a class="nav-link" href="?page=profile"><i class="fa fa-user"> Profile</i></a>
                          </li>
                          <li class="nav-item my-auto">
                              <a class="nav-link" href="?page=messages"><i class="fa fa-envelope"> Messages</i></a>
                          </li>
                          <li class="nav-item my-auto">
                              <a class="nav-link" href="?page=logout"><i class="fa fa-power-off"> Logout</i></a>
                          </li>
                      <?php }else{ ?>
                          <li class="nav-item">
                              <a class="nav-link" href="?page=register">Register</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="?page=login">Login</a>
                          </li>
                      <?php }
                      ?>

                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Search</button>
                  </form>
              </div>
          </nav>
          </header>

      </main>
      <section id="content" class="container-bg">
          <?php
          include ROOT."/views/$page.php";
          ?>
      </section>
      <footer>
          <div class="container-lg">
              <div class="row">
                  <div class="col-sm-12 col-md-6">
                      <ul class="footer-links">
                          <div class="nav-item">
                              <a class="nav-link" href="#">About us</a>
                          </div>
                          <div class="nav-item">
                              <a class="nav-link" href="#">Legal</a>
                          </div>

                      </ul>
                  </div>
              </div>
              <hr>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-sm-6 col-xs-12">
                      <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved
                          <a href="#"></a>.
                      </p>
                  </div>
              </div>
          </div>

      </footer>
   </body>
</html>