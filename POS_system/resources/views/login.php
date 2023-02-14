    <body>
    
    

        <form class="w-50" method="POST" action="/authenticate">

            <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                <div class='alert alert-danger mb-3' role='alert'>
                    <?= $_SESSION['error'] ?>
                </div>
            <?php
                $_SESSION['error'] = null;
            endif; ?>
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Login Page</h3>
            <p>Sign in with your username and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="admin-username">Your username</label>
            <input type="text" placeholder="Enter Username" name="username" required id="admin-username">

            <br><br>

            <!-- Password -->
            <label for="admin-password">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" required id="admin-password">

            <br>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Login</button>

            <!-- Sign up link -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>        
        </div>

    </form>
    
</body>
</html>
