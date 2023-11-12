<!DOCTYPE html>
<html>
<head>
    <title>User Account Page</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
    <div class="container">
        <div class="picture">
            <img src="uploads/profile.jpg" alt="User Image" width="80" height="80">
        </div>
        <h1>User Account Page</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="first_name" class="required">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name" class="optional">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name" class="required">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="username" class="required">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password" class="required">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="required">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="form-group">
                <label for="user_type" class="required">User Type:</label>
                <input type="text" id="user_type" name="user_type" required>
            </div>
            <div class="form-group">
                <label for="user_status" class="required">User Status:</label>
                <input type="text" id="user_status" name="user_status" required>
            </div>
            <div class="form-group">
                <label for="employee_number" class="required">Employee Number:</label>
                <input type="text" id="employee_number" name="employee_number" required>
            </div>

            <div class="form-group">
                <button type="submit" class="update-btn" name="update">Update</button>
                <button type="submit" class="delete-btn" name="delete">Delete</button>
                <button type="button" class="cancel-btn" name="cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
