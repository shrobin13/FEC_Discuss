<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to FEC-Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Navbar starts here  -->
    <?php require_once'partials/_header.php'; ?>

    <!-- connecting to database  -->
    <?php require_once 'partials/_dbconnect.php';?>

    <!-- carousal starts  -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/2400/800?Dark" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/2400/800?Dark" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/2400/800?grayscale" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- carousal ends -->

    <div class="container my-3">
        <div class="bg-dark text-light py-2">
            <h3 class="text-center" style="font-family: 'Roboto', sans-serif;">
                FEC-Discuss - Categories
            </h3>
        </div>

        <div class="row mt-3">

            <!-- Fetch all the data for categories-->
            <?php 
     $sql = "SELECT * FROM `categories`;";

     $result = mysqli_query($conn,$sql);
    
     while($row = mysqli_fetch_assoc($result)){
      $id = $row['id'];
      $cat = $row['name'];
      $desc = $row["desc"];
      echo '<div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="https://picsum.photos/500/400/?'.$cat.',coding" class="card-img-top" alt="img">
        <div class="card-body">
          <h5 class="card-title"><a href="threadlists.php?catid='.$id.'" class="text-decoration-none"> '.$cat.'</a></h5>
          <p class="card-text">'.substr($desc,0,90).'...</p>
          <a href="threadlists.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
        </div>
      </div>
    </div> ';
     }     
     ?>
        </div>
    </div>

    <!-- Footer starts  -->
    <?php require_once 'partials/_footer.php'; ?>
    <!-- Footer ends -->

</body>

</html>