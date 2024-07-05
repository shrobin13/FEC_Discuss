<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login to FEC-Discuss</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="partials/_handlelogin.php" method="post">
                    <div class="form-group">
                        <label for="name">username</label>
                        <input type="text" name="loginusername" class="form-control" id="loginusername"
                            aria-describedby="nameHelp" placeholder="Enter username" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="loginpassword" class="form-control" id="loginpassword"
                            aria-describedby="passwordHelp" placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Login</button>
                </form>

            </div>

        </div>
    </div>
</div>