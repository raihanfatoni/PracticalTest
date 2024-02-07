
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    
    <title>Dashboard</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" id="Navbar">
      <div class="container">
        <div class="logo">
          <img src="../image/kopiheader.png" alt="">
          <a class="navbar-brand" href="#">Coffe Valley</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=<?= base_url("Bean/index"); ?>>Catalogue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=<?= base_url("Distributor/index"); ?>>Distributors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=<?= base_url("PolygonKecamatan/analisisLuas"); ?>>Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" href=<?= base_url("login/logout"); ?>>Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <Header class="jumbotron-fluid" id="Header">
      <div class="container">
        <div class="row">
          <div class="col-6 contain">
            <h4>Taste The Love in Every Cup From The Best Coffe Beans In Town!</h4>
            <P>At Coffe Valley, we believe that coffee is more than just a beverage; it's an experience. Step into our cozy haven where the rich aroma of freshly ground beans welcomes you, and every cup is crafted with passion and precision.Our skilled baristas are artists in their own right, meticulously preparing each cup to perfection. Whether you're a devoted espresso enthusiast, a latte lover, or in the mood for a velvety cappuccino, we've got a brew that suits every palate. Every sip is a journey, and we invite you to savor the moments with us.Discover a diverse menu that goes beyond your regular cup of joe. From our signature blends to exotic single-origin options, we source the finest beans globally to bring you a coffee experience that transcends boundaries. Feeling adventurous? Dive into our specialty drinks, each one a masterpiece that tells a unique story..</P>
            <button class="nav-link btn" onclick="window.location.href='<?= base_url("PolygonKecamatan/analisisLuas"); ?>'">Cari Data Tanah Wakaf</button>
          </div>
          <div class="col-5 offset-1">
            <img src="../image/kopiheader.png" alt="">
          </div>
        </div>
      </div>
    </Header>
    <!-- End Header -->

    <!-- End Service -->

    
    <!-- Footer -->
    <footer class="jumbotron-fluid" id="Footer">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="about">
              <div class="logo">
                <img src="../image/logo.png" alt="" style="width: 200px; height: 100px;">
                <a class="navbar-brand" href="#">Coffee Valley - Center 3rd Floor Cambridge MA 02140 </a>
              </div>
              <p>Februrary 07, 2024</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>