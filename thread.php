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
    <?php require_once 'partials/_header.php'; ?>

    <!-- connecting to database  -->
    <?php require_once 'partials/_dbconnect.php'; ?>


    <!-- Query container section  -->

    <div class="container">


        <!-- PHP scripts goes here  -->

        <?php
        if (isset($_GET['threadid'])) {
            $tid = $_GET['threadid'];
        } else {
            $tid = '1';
        }

        $sql = "SELECT * FROM `threads` WHERE thread_id =$tid";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {

            $t_id = $row["thread_id"];
            $t_title = $row["thread_title"];
            $t_desc = $row["thread_desc"];


            // <-- jumbotron goes here  -->

            echo '<div class="container my-4">
                        <div class="p-4 rounded-3 bg-dark bg-opacity-75">
                            <h1 class="display-4 text-white">' . $t_title . '</h1>
                            <p class="lead text-white">' . $t_desc . '</p>
                            <hr class="my-2">
                            <h4 class="m-0 text-light">Forum rules</h4>
                            <p class="text-white">
                                1. Respect Others: Avoid hate speech and disrespectful behavior.<br>
                                2. Stay On Topic: Post relevant content and avoid spam.<br>
                                3. Follow Mods: Adhere to moderator instructions for a positive environment.<br>
                                privacy.</p>
                           
                        </div>
                    </div>';
        }
        ?>


        <!-- Adding Comment option  -->
        <div class="text-white container p-4 rounded-3 bg-dark bg-opacity-75">
            <form action="<?php echo $_SERVER['REQUEST_URI'];  ?>" method="post">

                <div class="form-group">
                    <label for="name">Add Comment</label>
                    <input type="text" name="description" class="form-control" rows="3" id="description"
                        aria-describedby="descriptionHelp" placeholder="Type your comment" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Post</button>
            </form>
        </div>


       <div class="container">
                <!-- script to add comment  -->
        <?php
        $show_alert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST")
        {
            
            $comment = htmlspecialchars($_POST['description']) ;

            $sql = "INSERT INTO `comments` (`cm_id`, `cm_content`, `thread_id`, `cm_time`, `cmnt_by`) VALUES (NULL, '$comment', '$t_id', CURRENT_TIMESTAMP(), 'null');";
            $result = mysqli_query($conn,$sql);
            $show_alert = true;
            if($show_alert)
            {
                echo '<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                <strong>Successfully submitted.</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Cannot post your comment</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    ?>
        <!-- Discussion  -->

        <h1 class="py-2">Discussion</h1>
        <hr class="m-0">


    </div>
    <!-- script to fetch the comments  -->
    <?php
    $tid = $_GET['threadid'];

    $sql = "SELECT * FROM `comments` WHERE thread_id =$t_id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $t_id = $row["thread_id"];
        $content = $row["cm_content"];
        $cmid = $row["cm_id"];
        $noResult = false;

        echo ' <div class="d-flex m-3">
                <div class="flex-shrink-0">
                    <img src="images/user.png" width="40px" height="40px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                   <P>' . $content . '</p>
                </div>
            </div>';
    }
    if ($noResult) {
        echo '<div class="p-2 rounded-3 bg-dark bg-opacity-75 mt-4">
            <h4 class="display-4 text-white text-center">No answers availabe</h4>
            <hr class="my-2">
            
            <p class="text-white text-center">Be the first one to reply!</p>
            </div>';
    }
   
    ?>
       </div>
        
    <!-- Footer starts  -->
    <?php require_once 'partials/_footer.php'; ?>
    <!-- Footer ends -->

</body>

</html>