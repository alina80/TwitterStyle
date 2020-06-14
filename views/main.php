<!doctype html>
<html>
   <head>
       <title>Twitter</title>
       <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       <link href="../public/css/style.css" rel="stylesheet">
   </head>
   <body>
      <main class="container-bg bg-primary">
          <header class="text-center">
              <h1>Twitter</h1>
          </header>
      </main>
      <section id="content">
          <?php
          include ROOT."/views/$page.php";
          ?>
      </section>
      <footer class="container-bg text-center">
          TwitterStyle Project&copy;2020
      </footer>
   </body>
</html>