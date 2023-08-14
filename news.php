<!DOCTYPE html>
<html lang="en">

<head>
    <title>Soccer </title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    body {
        overflow-x: hidden;
    }
    </style>
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
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 mx-auto text-center">
                        <h1 class="text-white">News</h1>
                        <p>Stay updated with the latest soccer news, where thrilling victories, player achievements, and game-changing moments unfold.</p>
                    </div>
                </div>
            </div>
        </div>



       




  
    <script>

       
// var url = 'https://newsapi.org/v2/everything?q=football&apiKey=4707ccada6ac4342888507cc4227efd1';
//       var req = new Request(url);
//       fetch(req).then(res => res.json()).then(data => {
//         // debugger
//         var alldata = data.articles;
//         console.log(alldata)
        // for (var index = 1; index < alldata /*alldata.length*/ ; index++) {
        //     element = alldata[index];
        //     console.log(element);
        //     // console.log(element['title']);
        //     // console.log(element['urlToImage']);
        //     document.getElementById('test').innerHTML +=
        //         "<div class='col-lg-4 mb-4'><div class='custom-media d-block' ><div class='img mb-4'><a href='./articles/newsrelated.php?index=" +
        //         index + "'><img src='" + element['image'] + "' alt='Image' class='img-fluid'></a>" +
        //         "<div class='text'><span class='meta'>" + element['published_at'] +
        //         "</span> <h3 class='mb-4'><a href='./articles/newsrelated.php?index=" + index + "'>" + element[
        //             'title'] +
        //         "</a></h3> <p><a href='./articles/newsrelated.php?index=" + index +
        //         "'>Read more</a></p></div></div>";


        // }
    // });

fetch('./news.json')
.then(res => res.json())
.then(data =>{
    // console.log(data);
    for (let index = 0; index < data.length; index++) {
         element = data[index];
        //  console.log(element);
         document.getElementById('test').innerHTML +=
                "<div class='col-lg-4 mb-4'><div class='custom-media d-block' ><div class='img mb-4'><a href='./articles/newsrelated.php?index=" +
                index + "'><img src='" + element['image'] + "' alt='Image' class='img-fluid'></a>" +
                "<div class='text'><span class='meta'>" + element['published_at'] +
                "</span> <h3 class='mb-4'><a href='./articles/newsrelated.php?index=" + index + "'>" + element[
                    'title'] +
                "</a></h3> <p><a href='./articles/newsrelated.php?index=" + index +
                "'>Read more</a></p></div></div>";
        
    }
});

 

    </script>


    <div class="container site-section">
        <div class="row">
            <div class="col-6 title-section">
                <h2 class="heading">Latest News</h2>
            </div>
        </div>

        <div class="row" id="test">


        </div>
    </div>
    </div>



    <!-- <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="custom-pagination">
                <a href="#">1</a>
                <span>2</span>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
            </div>
        </div>
    </div>
    </div>
    </div> -->

    <?php include('footer.php')?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"7f3e12882ae93e2f","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>