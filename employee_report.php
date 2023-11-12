<?php
    include 'process/db_connection.php';
    $conn = OpenCon();
    $sql = "SELECT * FROM `personal_infotbl`;";
    $result = $conn->query($sql);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $item_name = $_POST['search'];
        $sql = "SELECT * FROM `personal_infotbl` WHERE employee_no = '$item_name' OR id = '$item_name' OR ;";
        $result = $conn->query($sql);
        if (!$item_name) {
            $sql = "SELECT * FROM `personal_infotbl`;";
            $result = $conn->query($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | Employee Report</title>
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
                            <a class="nav-link" href="#">POS Sales Report</a>
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
                    <!--  AAAAAAAA -->
                    <div class="flex-grow-1">
                        <div class="px-5">
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
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">ID</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Employee No.</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">First Name</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Middle Name</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Last Name</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">address_line1</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">address_line2</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Birthdate</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Civil Status</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Contact No.</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Country</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Department</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Designation</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Email Address</span>
                                                </th>
                                                <th class="py-6 ps-6">
                                                    <span class="me-1 btn p-0 d-flex align-items-center text-secondary pe-none">Employee Status</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result) {
                                                while ($item = $result->fetch_assoc()) {
                                                    echo "
                                            <tr class='clickable-row' data-href='employee_registration_save.php?id={$item['id']}'>
                                                <td class='py-6 ps-6'>$item[id]</td>
                                                <td class='py-6 ps-6'>$item[employee_no]</td>
                                                <td class='py-6 ps-6'>$item[fname]</td>
                                                <td class='py-6 ps-6'>$item[mname]</td>
                                                <td class='py-6 ps-6'>$item[lname]</td>
                                                <td class='py-6 ps-6'>$item[address_line1]</td>
                                                <td class='py-6 ps-6'>$item[address_line2]</td>
                                                <td class='py-6 ps-6'>$item[birth_date]</td>
                                                <td class='py-6 ps-6'>$item[civil_status]</td>
                                                <td class='py-6 ps-6'>$item[contact_no]</td>
                                                <td class='py-6 ps-6'>$item[country]</td>
                                                <td class='py-6 ps-6'>$item[department]</td>
                                                <td class='py-6 ps-6'>$item[designation]</td>
                                                <td class='py-6 ps-6'>$item[email_address]</td>
                                                <td class='py-6 ps-6'>$item[employee_status]</td>
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
</html>
