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

    <!-- category container starts here  -->
    <?php
    if(isset($_GET['catid'])){
        $sid = $_GET['catid'];
    }
    else{
        $sid ='1';
    }
    
    $sql = "SELECT * FROM `categories` WHERE id =$sid";
    $result = mysqli_query($conn,$sql);
    $noResult = true;
       while($row = mysqli_fetch_assoc($result)){
        $catname = $row['name'];
        $desc = $row["desc"];
        
    }
     ?>

    <?php
    $show_alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $th_title = $_POST['title'];
        $th_desc = $_POST['description'];

        $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES (NULL, '$th_title', '$th_desc', '0', '$sid', CURRENT_TIMESTAMP());";
        $result = mysqli_query($conn,$sql);
        $show_alert = true;
    if($show_alert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong>Your Question submitted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong>'.mysqli_connect_error($conn).'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    }
    ?>

    <!-- jumbotron goes here  -->

    <div class="container my-4">
        <div class="p-4 rounded-3 bg-dark bg-opacity-75">
            <h1 class="display-4 text-white">Welcome to <?php echo "{$catname}"; ?> Forums</h1>
            <p class="lead text-white"><?php echo "$desc"; ?></p>
            <hr class="my-2">
            <h4 class="m-0 text-light">Forum rules</h4>
            <p class="text-white">
                1. Respect Others: Avoid hate speech and disrespectful behavior.<br>
                2. Stay On Topic: Post relevant content and avoid spam.<br>
                3. Follow Mods: Adhere to moderator instructions for a positive environment.<br></p>
            <?php if($sid == '1'){echo '<a class="btn btn-outline-info btn-lg" href="https://www.python.org/doc/" role="button">Learn more</a>';} ?>
        </div>
    </div>

    <div class="text-white container p-4 rounded-3 bg-dark bg-opacity-75">

        <!-- Adding question option  -->
        <form action="<?php echo $_SERVER['REQUEST_URI'];  ?>" method="post">
            <div class="form-group">
                <label for="name">Problem Title</label>
                <input type="text" name="title" class="form-control" id="name" aria-describedby="nameHelp"
                    placeholder="What kind of problem you're facing?" required>
            </div>

            <div class="form-group">
                <label for="name">Problem Description</label>
                <input type="decription" name="description" class="form-control" id="description"
                    aria-describedby="descriptionHelp" placeholder="Elaborate Your Concern" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Post</button>
        </form>
    </div>

    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <hr class="m-0">

        <!-- PHP scripts goes here  -->

        <?php
            $tid = $_GET['catid'];
            
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id =$tid";
            $result = mysqli_query($conn,$sql);
            
               while($row = mysqli_fetch_assoc($result)){
                   $t_id = $row["thread_id"];
                $t_title= $row["thread_title"];
                $t_desc = $row["thread_desc"];
                $noResult = false;

                echo ' <div class="d-flex m-3">
                <div class="flex-shrink-0">
                    <img src="images/user.png" width="40px" height="40px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="m-0"><a class="text-decoration-none" href="thread.php?threadid='.$t_id.'">'.$t_title.'</a></h6>
                    '.$t_desc.'
                </div>
            </div>';
            }
            if($noResult){
                echo '<div class="p-2 rounded-3 bg-dark bg-opacity-75 mt-4">
                <h4 class="display-4 text-white text-center">No questions availabe</h4>
                <hr class="my-2">
                
                <p class="text-white text-center">Be the first one to ask!</p>
                </div>';
            }
        ?>


    </div>

    <!-- Footer starts  -->
    <?php require_once 'partials/_footer.php'; ?>
    <!-- Footer ends -->

</body>

</html>