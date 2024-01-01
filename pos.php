<?php include 'process/session_check.php'; ?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <nav id="sidebar">
                <div class="position-sticky">
                    <h1 class="text-white fs-5 text-center my-5">Doctor Jen's</h1>
                    <ul class="nav flex-column text-start">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $user_privilege == 1 ? '' : 'd-none' ?>" href="employee_registration_save.php" >Employee Registration</a>
                        </li>
                        <li class="nav-item <?php echo $user_privilege == 1 ? '' : 'd-none' ?>">
                            <a class="nav-link" href="employee_report.php">Employee Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>" href="payroll.php">Payroll</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($user_privilege == 1 || $user_privilege == 2) ? '' : 'd-none' ?>" href="payroll_report.php">Payroll Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>" href="pos.php">POS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($user_privilege == 1 || $user_privilege == 3) ? '' : 'd-none' ?>" href="pos_sales_report.php">POS Sales Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($user_privilege == 1) ? '' : 'd-none' ?>" href="user_account_report.php">User Account Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- POS PAGE -->
                <h1>Doctor Jen's Choice Enterprise</h1>
                <div class="px-3">
                    <div class="btn-group d-flex justify-content-start align-items-center">
                        <div>
                            <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Select Product
                            </button>
                            <ul class="dropdown-menu" name="products" id="products">
                                <li><a class="dropdown-item" href="pos_cellphone.php">Cellphones</a></li>
                                <li><a class="dropdown-item" href="pos_cars.php">Cars</a></li>
                                <li><a class="dropdown-item" href="pos_chips.php">Chips</a></li>
                                <li><a class="dropdown-item" href="pos_mouse.php">Mice</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>