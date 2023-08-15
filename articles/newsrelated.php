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
  <!-- <script>
     var url = 'https://newsapi.org/v2/everything?q=football&apiKey=4707ccada6ac4342888507cc4227efd1';
      var req = new Request(url);
      fetch(req).then(res => res.json()).then(data => {
        // debugger
        var alldata = data.articles;
        element = alldata[''];
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
  </script> -->
    <script>

       

fetch('../news.json')
.then(res => res.json())
.then(data => {
    // console.log(data);
         element = data['<?php echo $news_id ?>'];
         console.log(element);
         var abc = element['published_at'];
        document.getElementById("date").innerText = abc.slice(0,10);
        document.getElementById("time").innerText = abc.slice(11,19);
        document.getElementById("author").innerText = element['author'];
        document.getElementById("title").innerText = element['title'];
        document.getElementById("pic").src = element['image'];
        document.getElementById("content").innerText = element['content'];
        document.getElementById("description").innerText = element['description'];
        
   
});

 

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
        <?php include('navbar.php') ?>
       

    <div class="hero overlay" style="background-image: url('../images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">Soccer Latest News</h1>
            <p>Stay updated with the latest soccer news, where thrilling victories, player achievements, and game-changing moments unfold.</p>
            <div id="date-countdown"></div>
            <p>
              <a href="../news.php" class="btn btn-primary py-3 px-4 mr-3">View Latest News</a>
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




    <?php include('footer.php') ?>

  </div>






</body>

</html>