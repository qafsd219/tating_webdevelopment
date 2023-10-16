<?php require_once('../process/payroll_process.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | Payroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3 bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin.css?v.3">
</head>
<body>
    <script src="../js/seri_payroll_save.js?v.1"></script>
    <div class="container border bg-white">
        <h1 class="d-flex justify-content-center m-2" style="font-size:30px;"> Doctor Jen's Choice Payroll</h1>
        <form class="row" method="post">
            <div class="col">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <h1 class="fs-5 mx-4">Employee Basic Info:</h1>
                    <div class="card mb-3 mx-4" style="width: 14rem;">
                        <img src="../uploads/profile.jpg" class="card-img-top" alt="..." height="190">
                        <input type="file" class="p-1">
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <ul class="">
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6"> 
                                    Employee Number: 
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="employee_no" class="form-control mb-1" style="height:2rem;" id="employee_number" value="<?php echo $employee_no; ?>">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Department:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="department" class="form-control mb-1" style="height:2rem;" id="department" value="<?php echo $department; ?>" disabled>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Search Employee:
                                </div>
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-danger w-100">Search Employee</button>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Basic Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Rate / Hour:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="basic_rate_hour" value="<?php echo $basic_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    No. of Hours / Cut Off:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="basic_num_hours_cutoff" value="<?php echo $basic_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Income / Cut Off:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="basic_income_cutoff" value="<?php echo $basic_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Honorarium Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Rate / Hour:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="hono_rate_hour" value="<?php echo $hono_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    No. of Hours/ Cut off
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="hono_num_hours_cutoff" value="<?php echo $hono_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Income / Cut Off:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="hono_income_cutoff" value="<?php echo $hono_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Other Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Rate / Hour:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="other_rate_hour" value="<?php echo $other_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    No. of Hours/ Cut off
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="other_num_hours_cutoff" value="<?php echo $other_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Income / Cut Off:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="other_income_cutoff" value="<?php echo $other_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Summary Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Gross Income:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="gross_income" value="<?php echo $gross_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    Net Income:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="net_income" value="<?php echo $net_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
                    <div class="col">
                        <div class="col d-flex mt-4">
                            <ul class="">
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Firstname:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="firstname" class="form-control mb-1 w-75" value="<?php echo $firstname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Middle Name:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="mname" class="form-control mb-1 w-75" value="<?php echo $mname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Surname:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="surname" class="form-control mb-1 w-75" value="<?php echo $surname ?>" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Civil Status:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="civil_status" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $civil_status ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Designation:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="designation" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $designation ?>" disabled aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Qualified Dependents
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="qualified_dependents" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $qualified_dependents ?>" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Paydate:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="paydate" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $paydate ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Employee Status:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="emp_status" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $emp_status ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Regular Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            SSS Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="sss_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $sss_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            PhilHealth Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="philH_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $philH_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Pagibig Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="pagibig_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $pagibig_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Income Tax Contribution:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="tax_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $tax_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Other Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            SSS Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="sss_loan" value="<?php echo $sss_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Pagibig Loan
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="pagibig_loan" value="<?php echo $pagibig_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Faculty Saving Deposit:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="fs_deposit" value="<?php echo $fs_deposit; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Faculty Saving Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="fs_loan" value="<?php echo $fs_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Salary Loan:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="salary_loan" value="<?php echo $salary_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Other Loans:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="other_loans" value="<?php echo $other_loans; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Deduction Summary:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Total Deductions:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="total_deduct" value="<?php echo $total_deduct ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row row-cols-3 align-items-center gap-2 mt-3 g-0 pe-4">
                                        <div class="col-4">
                                            <button type="submit" name="calculate_gross_income" class="btn btn-primary w-100" style="white-space: nowrap; font-size:0.9rem;">Calculate Gross Income</button>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" name="calculate_net_income" class="btn btn-primary  w-100" style="white-space: nowrap; font-size:0.9rem;">Calculate Net Income</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" name="new" class="btn btn-warning w-100" style="white-space: nowrap; font-size:0.9rem;">New</button>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" name="save" class="btn btn-info  w-100 " style="white-space: nowrap; font-size:0.9rem;">Save</button>
                                            <!-- <a target="_blank" href="/process/preview.php" name="print_preview" class="btn btn-info w-100" style="white-space: nowrap; font-size:0.9rem;">Preview Payslip</a> -->
                                        </div>
                                        <div class="col-3">
                                            <a target="_blank" href="/process/print_preview.php" class="btn btn-info  w-100 " style="white-space: nowrap; font-size:0.9rem;">Print Payslip</a>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" name="cancel" class="btn btn-danger  w-100" style="white-space: nowrap; font-size:0.9rem;">Cancel</button>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" name="close" class="btn btn-dark " style="white-space: nowrap; font-size:0.9rem; width:90%;">Close</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Preview Payslip</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container w-75">
                        <div class="row bg-white">
                            <div class="col-md-12 my-4">
                                <div class="text-center lh-1 mb-2">
                                    <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip</span>
                                </div>
                                <div class="d-flex justify-content-end"> <span>Department: <?php echo $department ?></span> </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP No</span> <small class="ms-3"><?php echo $employee_no ?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3"><?php echo $firstname . " " . $mname . " " . $surname ?></small> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Civil Status</span> <small class="ms-3"><?php echo $civil_status ?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Designation</span> <small class="ms-3"><?php echo $designation ?></small> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Qualified dependent</span> <small class="ms-3"><?php echo $qualified_dependents ?></small> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div> <span class="fw-bolder">Paydate</span> <small class="ms-3"><?php echo $paydate ?></small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="mt-4 table table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <tr>
                                                <th scope="row">Basic Income:</th>
                                                <td><?php echo $_SESSION['basic_income_cutoff']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Honorarium Income:</th>
                                                <td><?php echo $_SESSION['hono_income_cutoff']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Other Income:</th>
                                                <td><?php echo $_SESSION['other_income_cutoff']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SSS Contribution:</th>
                                                <td><?php echo $_SESSION['sss_contri']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">PhilHealth Contribution:</th>
                                                <td><?php echo $_SESSION['philH_contri']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pagibig Contribution:</th>
                                                <td><?php echo $_SESSION['pagibig_contri']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tax Contribution:</th>
                                                <td><?php echo $_SESSION['tax_contri']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total Deduction:</th>
                                                <td><?php echo $_SESSION['total_deduct']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : <?php echo $_SESSION['net_income']; ?></span> </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : <?php echo $_SESSION['gross_income']; ?></span> </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For <?php echo $firstname; ?></span> <span class="mt-4">Authorised Signatory</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>-->
    <script src="../js/seri_payroll_save.js?v.1"></script>
</body>
</html>