<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Signup for a FEC-Discuss account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="partials\_handlesignup.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="signupname" class="form-control" id="signupname" aria-describedby="nameHelp" placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="signupemail" class="form-control" id="signupemail" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" name="contact" class="form-control" id="contact" aria-describedby="contactHelp" placeholder="+8801234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Userame</label>
                        <input type="text" name="signupusername" class="form-control" id="signupusername" aria-describedby="nameHelp" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="singuppassword" class="form-control" id="singuppassword" aria-describedby="passwordHelp" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="singupcpassword" class="form-control" id="singupcpassword" aria-describedby="cpasswordHelp" placeholder="Enter the same password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>