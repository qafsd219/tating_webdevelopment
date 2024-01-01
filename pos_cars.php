<?php
    include 'process/jonas_pos_fill.php';
    include 'process/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
                                Cars
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
                <div class="row">
                    <script>
                        const cars = [
                            "Car 1",
                            "Car 2",
                            "Car 3",
                            "Car 4",
                            "Car 5",
                            "Car 6",
                            "Car 7",
                            "Car 8",
                            "Car 9",
                            "Car 10",
                            "Car 11",
                            "Car 12",
                            "Car 13",
                            "Car 14",
                            "Car 15",
                            "Car 16",
                            "Car 17",
                            "Car 18",
                            "Car 19",
                            "Car 20",
                        ];
                        const car_prices = [3200000, 500000, 9000000, 2000000, 4000000, 8000000, 12000000, 1000000, 1500000, 3620000, 1700000, 1700000, 12000000, 90000, 2519000, 2000000, 100000, 2186000, 14162625000, 5000000];
                        for (let i = 0; i < cars.length; i++) {
                            const carName = cars[i];
                            const price = car_prices[i];
                            document.write(`
                                <div class="col-md-3">
                                    <div>
                                        <img src='uploads/vrooom/${i + 1}.jpg' data-toggle="tooltip" data-placement="center" title="${carName}+" width="240px" height="150px" alt="${carName}">
                                        <div>
                                            <input type="checkbox" name="check_${i + 1}" id="check_${i + 1}" onclick="handleItems('${carName}', '${price}')" class="checkbox-group">
                                            <label for="check_${i + 1}">${carName}(<b>₱ ${price}</b>)</label>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                        Discount = 0;
                        totalQuantity = 0;
                        totalDiscount = 0;
                        totalDiscounted = 0;
                        // Get all checkboxes with the class "checkbox-group"
                        var checkboxes = document.querySelectorAll('.checkbox-group');
                        // Add an event listener to each checkbox
                        checkboxes.forEach(function(checkbox) {
                            checkbox.addEventListener('change', function() {
                                // Uncheck all other checkboxes in the group
                                checkboxes.forEach(function(otherCheckbox) {
                                    if (otherCheckbox !== checkbox) {
                                        otherCheckbox.checked = false;
                                    }
                                });
                            });
                        });
                    </script>
                </div>
                <div class="row">
                    <h2>Order Details</h2>
                    <!-- COLUMN 1 -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ItemName">Name of Item:</label>
                            <input type="text" class="form-control" id="ItemName" name="ItemName" style="background-color:#ccc" value='<?php echo $item_name ?>' readonly>
                        </div>
                        <div class="form-group">
                            <label for="Quantity">Quantity:</label>
                            <input type="number" class="form-control" id="Quantity" name="Quantity" min="1" value='<?php echo $quantity ?>' required>
                        </div>
                        <div class="form-group">
                            <label for="ItemPrice">Price:</label>
                            <input type="text" class="form-control" id="ItemPrice" name="ItemPrice" style="background-color:#ccc" value='<?php echo $Itemprice ?>'aria-label="Amount (to the nearest dollar)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Discount">Discount Amount:</label>
                            <input type="text" class="form-control" id="Discount" name="Discount" style="background-color:#ccc" value='<?php echo $discount_amount ?>'aria-label="Amount (to the nearest dollar)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Discounted">Discounted Amount:</label>
                            <input type="text" class="form-control" id="Discounted" name="Discounted" style="background-color:#ccc" value='<?php echo $discounted_amount ?>' aria-label="Amount (to the nearest dollar)"  readonly>
                        </div>
                    </div>
                    <!-- COLUMN 2 -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="totalQuantity">Total Quantity:</label>
                            <input type="text" class="form-control" id="totalQuantity" name="totalQuantity" style="background-color:#ccc" value='<?php echo $total_quantity ?>' aria-label="Amount (to the nearest dollar)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalDiscount">Total Discount Given:</label>
                            <input type="text" class="form-control" id="totalDiscount" name="totalDiscount" style="background-color:#ccc" value='<?php echo $total_discount_given ?>' aria-label="Amount (to the nearest dollar)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalDiscounted">Total Discounted Amount:</label>
                            <input type="text" class="form-control" id="totalDiscounted" name="totalDiscounted" style="background-color:#ccc" value='<?php echo $total_discounted_amount ?>' aria-label="Amount (to the nearest dollar)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Cash">Cash Given:</label>
                            <input type="text" class="form-control" id="Cash" name="Cash" value='<?php echo $cash_given ?>' aria-label="Amount (to the nearest dollar)" required>
                        </div>
                        <div class="form-group">
                            <label for="Change">Change:</label>
                            <input type="text" class="form-control" id="Change" name="Change" style="background-color:#ccc" value='<?php echo $customer_change ?>' aria-label="Amount (to the nearest dollar)" readonly>
                        <!--HIDDEN-->
                        </div>
                            <input type="text" class="form-control d-none" name='employee_no' value='<?php echo $user_employee_name ?>' aria-label="Amount (to the nearest dollar)" disabled id="employee_no">
                        </div>
                    <!-- DISCOUNT OPTIONS -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-horizontal gap-5">
                            <li class="" style="list-style-type: none;">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="senior" onclick="handleDiscounts(0.12)" value="senior discount">
                                <label class="form-check-label" for="flexRadioDefault1">Senior Citizen (12%)</label>
                            </li>
                            <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="discountCard" onclick="handleDiscounts(0.08)" value="discount card">
                                <label class="form-check-label" for="flexRadioDefault1">With Disc. Card (8%)</label>
                            </li>
                            <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="employee" onclick="handleDiscounts(0.1)" value="employee discount">
                                <label class="form-check-label" for="flexRadioDefault1">Employee Discount (10%)</label>
                            </li>
                            <li class="" style="list-style-type: none;"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="noDiscount" onclick="handleDiscounts(0)" value="no discount">
                                <label class="form-check-label" for="flexRadioDefault1">No Discount</label>
                            </li>
                        </ul>
                        <!-- FUNCTION BUTTONS -->
                        <div class="row row-cols-4 mb-2">
                            <div class="col">
                                <button type="button" class="btn btn-primary w-100" onclick="handleChange()">Calculate</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger w-100" onclick="handleNew()">New</button>
                            </div>
                            <div class="col3">
                                <button type="button" class="btn btn-warning w-100" id="save">Save</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-dark w-100">Update</button>
                            </div>
                        </div>
                        <!-- CALCULATOR -->
                        <div class="row row-cols-4 mb-2">
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '7'">7</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '8'">8</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '9'">9</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '-'">-</button>
                            </div>
                        </div>
                        <div class="row row-cols-4 mb-2">
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '4'">4</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '5'">5</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '6'">6</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '+'">+</button>
                            </div>
                        </div>
                        <div class="row row-cols-4 mb-2">
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '1'">1</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '2'">2</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '3'">3</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '*'">*</button>
                            </div>
                        </div>
                        <div class="row row-cols-4 mb-2">
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="handleCalculator()">Enter</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '0'">0</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '.'">.</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary w-100" onclick="document.getElementById('Cash').value += '*'">/</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script>
                totalQuantity = 0;
                totalDiscount = 0;
                totalDiscounted = 0;
            </script>
            <script src="js/calculator.js" defer></script>
            <script src="js/change.js" defer></script>
            <script src="js/new.js" defer></script>
            <script src="js/discounts.js" defer></script>
            <script src="js/items.js" defer></script>
            <script src="js/jonas_pos_save.js"></script>
        </div>
    </div>
</body>
</html>