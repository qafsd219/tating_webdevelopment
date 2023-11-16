<?php
    include 'process/db_connection.php';
    $conn = OpenCon();
    $sql = "SELECT * FROM `salestbl`;";
    $result = $conn->query($sql);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $item_name = $_POST['search'];
        $sql = "SELECT * FROM `salestbl` WHERE item_name = '$item_name' OR id = '$item_name';";
        $result = $conn->query($sql);
        if(!$item_name){
            $sql = "SELECT * FROM `salestbl`;";
            $result = $conn->query($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css?v.3">
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
                            <a class="nav-link" href="employee_registration_save.php">Employee Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employee_report.php">Employee Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="payroll.php">Payroll</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="payroll_report.php">Payroll Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pos.php">POS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pos_sales_report.php">POS Sales Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">User Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Page content goes here -->
                <h1>Doctor Jen's Choice Enterprise</h1>
                <div id="page-content">
                    <div class="px-10">
                        <h1 class="d-flex justify-content-center m-2" style="font-size:30px;">POS Sales Report</h1>
                        <div class="row justify-content-end">
                            <form action="" method="post" class="input-group mb-3 mt-3" style="height: 2rem; width:250px">
                                <input type="text" class="form-control" aria-describedby="button-addon2" placeholder="Search item name" name='search'>
                                <button class="btn btn-outline-secondary" type="submit" id="search_button"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24" class="">
                                        <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                                    </svg></button>
                            </form>
                        </div>
                        <section>
                            <table class="table table-borderless bg-white rounded small table-hover">
                                <thead class="border-bottom">
                                    <tr>
                                        <th class="py-6 ps-6">Product Name</th>
                                        <th class="py-6 ps-6">Quantity</th>
                                        <th class="py-6 ps-6">Product Price</th>
                                        <th class="py-6 ps-6">Discount Amount</th>
                                        <th class="py-6 ps-6">Discounted Amount</th>
                                        <th class="py-6 ps-6">Discount Option</th>
                                        <th class="py-6 ps-6">Cash Given</th>
                                        <th class="py-6 ps-6">Change</th>
                                        <th class="py-6 ps-6">Sale ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result) {
                                        while ($item = $result->fetch_assoc()) {
                                            echo "
                                            <tr>
                                                <td class='py-6 ps-6'>$item[item_name]</td>
                                                <td class='py-6 ps-6'>$item[quantity]</td>
                                                <td class='py-6 ps-6'>$item[price]</td>
                                                <td class='py-6 ps-6'>$item[discount_amount]</td>
                                                <td class='py-6 ps-6'>$item[discounted_amount]</td>
                                                <td class='py-6 ps-6'>$item[discount_option]</td>
                                                <td class='py-6 ps-6'>$item[cash_given]</td>
                                                <td class='py-6 ps-6'>$item[customer_change]</td>
                                                <th class='py-6 ps-6'>$item[id]</th>
                                            </tr>
                                            ";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
