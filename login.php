<!DOCTYPE html>
<html>
<head>
    <title>Doctor Jen's | Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background-image: url('uploads/background1.jpg');">
    </br>
    <div class="login-container">
        <img src="uploads/login.jpg" width="200" height="200">
        <h2>Login Page</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="action-links">
                Not yet a member? <a href="#">Sign Up</a> |
                <a href="#">Forgot Password</a>
            </div>

            <button type="submit" class="login_btn">Log In</button>
        </form>
    </div>
    <script>
    // Get a reference to the form
    const form = document.querySelector('form');

    // Add an event listener for the form submission
    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        // Login success
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Check user and password
        if (username === 'user' && password === 'user') {
            // Redirect to the desired URL after a successful login
            window.location.href ="admin.php"; // Replace with your desired URL
        } else {
            // Log in error
            alert('Login failed. Please check your username and password.');
        }
    });
    </script>
</body>
</html>