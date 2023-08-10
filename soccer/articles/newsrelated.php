<?php
include('../connection.php');
$news_id = $_GET['index'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AMC scraps plan to make the best movie theater seats more expensive</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/style.css">
  <script>
     var url = 'https://newsapi.org/v2/everything?q=football&apiKey=4707ccada6ac4342888507cc4227efd1';
      var req = new Request(url);
      fetch(req).then(res => res.json()).then(data => {
        // debugger
        var alldata = data.articles;
        element = alldata['<?php echo $news_id ?>'];
        console.log(element)
        var abc = element['publishedAt'];
        document.getElementById("date").innerText = abc.slice(0,10);
        document.getElementById("time").innerText = abc.slice(11,19);
        document.getElementById("author").innerText = element['author'];
        document.getElementById("title").innerText = element['title'];
        document.getElementById("pic").src = element['urlToImage'];
        document.getElementById("content").innerText = element['content'];
        document.getElementById("description").innerText = element['description'];

      })
  </script>
</head>

<body>

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4" role="banner">
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html">
              <img src="./images/logo.png" alt="Logo" >
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="../index.php" class="nav-link">Home</a></li>
                <li><a href="../matches.php" class="nav-link">Matches</a></li>
                <li><a href="../players.php" class="nav-link">Players</a></li>
                <li><a href="../news.php" class="nav-link">News</a></li>
                <li><a href="../contact.php" class="nav-link">Contact</a></li>
              </ul>
            </nav>
            <a href="#"
              class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>
    </header>

    <div class="hero overlay" style="background-image: url('../images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">Soccer Latest News</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae
              pariatur.</p>
            <div id="date-countdown"></div>
            <p>
              <a href="#" class="btn btn-primary py-3 px-4 mr-3">View Latest News</a>
              <a href="#" class="more light"></a>
            </p>
          </div>
        </div>
      </div>
    </div>



    <div class="container mb-5">

      <div class="container">
        <h6 class=" mt-5 mb-3" id="time" ></h6>
        <div class="vtimeline-content">
          <img src="" alt="" class="img-fluid mb-5" id="pic">
          <a href="#">
            <h3 id="title" ></h3>
          </a>
          <ul class="post-meta list-inline">
            <li class="list-inline-item">
              <i class="fa fa-user-circle-o"></i><p id="author"></p>
            </li>
            <li class="list-inline-item">
              <i class="fa fa-calendar-o"></i><p id="date" ></p>
            </li>
          
          </ul>
          <p id="description">
           
          </p>
          <p id="content">
           
          </p>
        </div>
      </div>


    </div>




    <?php include('../footer.html') ?>

  </div>






</body>

</html>