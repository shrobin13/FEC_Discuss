<?php require_once '_dbconnect.php'; ?>
<?php session_start(); ?>
<!-- navbar starts  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">FEC-Discuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                          // Fetch categories from the database
                          $sql = "SELECT * FROM `categories`;";
                          $result = mysqli_query($conn, $sql);
                          // Loop through each category and create dropdown items
                          while ($row = mysqli_fetch_assoc($result)) {
                              $category_id = $row['id'];
                              $category_name = $row['name'];
                              echo '<li><a class="dropdown-item" href="threadlists.php?catid=' . $category_id . '">' . $category_name . '</a></li>';
                          }
                        ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <form class="d-flex my-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="d-flex ms-lg-3">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<a href="logout.php" class="btn btn-outline-success me-2">Logout</a>';
                    echo '<span class="navbar-text">Welcome, ' . $_SESSION['username'] . '</span>';
                } else {
                    echo '<button class="btn btn-outline-success me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</button>';
                    echo '<button class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#signupModal">Signup</button>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<!-- navbar ends  -->
<!-- script for modal  -->
<?php include 'partials/_loginmodal.php'; ?>
<?php include 'partials/_signupmodal.php'; ?>

<!-- Alert section -->
<div class="container my-4">
    <?php
    if (isset($_GET["signupsuccess"])) {
        if ($_GET["signupsuccess"] == "true") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account has been created successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            $error = isset($_GET["error"]) ? $_GET["error"] : "Signup failed. Please try again.";
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . htmlspecialchars($error) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }

    if (isset($_GET["loginsuccess"])) {
        if ($_GET["loginsuccess"] == "true") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You have logged in successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            $error = isset($_GET["error"]) ? $_GET["error"] : "Login failed. Please try again.";
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . htmlspecialchars($error) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
    ?>
</div>

<!-- Include Bootstrap JS (make sure this is included in your project) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb4xL0Tb3mFdFfZxL5lx4eWf1kSnhz8GNmZhVf1W4XuxfIr0V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cu2dPEFGoQkxntMtEJCFaUlaGZABcSAWnIM0R01LlVLD8amfy8eg+lphhYhzWNA9" crossorigin="anonymous"></script>
