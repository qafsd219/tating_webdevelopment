<?php
include 'process/db_connection.php';
include 'process/session_check.php';
$conn = OpenCon();
$sql = "SELECT * FROM user_accounttbl JOIN personal_infotbl ON user_accounttbl.employee_no = personal_infotbl.employee_no WHERE user_accounttbl.username = '' OR user_accounttbl.password = '' OR user_accounttbl.confirm_password = ''";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item_name = $_POST['search'];
    if (!$item_name) {
        $sql = "SELECT * FROM user_accounttbl JOIN personal_infotbl ON user_accounttbl.employee_no = personal_infotbl.employee_no;";
        $result = $conn->query($sql);
    } else {
        $sql = "SELECT * FROM user_accounttbl JOIN personal_infotbl ON user_accounttbl.employee_no = personal_infotbl.employee_no WHERE user_accounttbl.employee_no = $item_name;";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <!-- Page content goes here -->
                <h1>Doctor Jen's Choice Enterprise</h1>
                <div id="page-content">
                    <div class="flex-grow-1">
                        <div class="px-10">
                            <h1 class="d-flex justify-content-center m-2" style="font-size:30px;">Employee Report</h1>
                            <div class="row justify-content-end">
                                <form action="" method="post" class="input-group mb-3 mt-3" style="height: 2rem; width:250px">
                                    <input type="text" class="form-control" aria-describedby="button-addon2" placeholder="Search" name='search'>
                                    <button class="btn btn-outline-secondary" type="submit" id="search_button"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24" class="">
                                            <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <section>
                                <div class="table-responsive">
                                    <table class="table table-borderless bg-white rounded small table-hover">
                                        <thead class="border-bottom">
                                            <tr>
                                                <th class="py-6 ps-6">Employee Number</th>
                                                <th class="py-6 ps-6">Name</th>
                                                <th class="py-6 ps-6">Username</th>
                                                <th class="py-6 ps-6">User Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if ($result) {
                                                while ($item = $result->fetch_assoc()) {
                                                    echo "
                                            <tr class='clickable-row border' style='cursor: pointer' data-href='user.php?id={$item['employee_no']}'>
                                                <td class='py-6 ps-6 border'>$item[employee_no]</td>
                                                <td class='py-6 ps-6 border'>$item[fname] $item[mname] $item[lname]</td>
                                                <td class='py-6 ps-6 border'>$item[username]</td>
                                                <td class='py-6 ps-6 border'>$item[privilege]</td>
                                            </tr>
                                            ";
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href")
        })
    })
</script>
</html>