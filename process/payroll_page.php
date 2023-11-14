<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Jen's | Payroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/jonas_payroll_save.js"></script>
    <link rel="stylesheet" href="css/admin.css?v.3">
</head>
<body>
    <div class="container border bg-white">
        <h1 class="d-flex justify-content-center m-2" style="font-size:40px;"> Doctor Jen's Choice Payroll</h1>
        <!-- form -->
        <form class="row" method="post">
            <div class="col">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <h1 class="fs-5 mx-4">Employee Basic Info:</h1>
                    <div class="card mb-3 mx-4" style="width: 14rem;">
                        <img src="uploads/profile.jpg" class="card-img-top" alt="..." height="190">
                        <input type="file" class="p-1">
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <ul class="">
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6"> Employee Number: </div>
                                <div class="col-md-6">
                                    <input type="text" id="employee_no" name="employee_no" class="form-control mb-1" style="height:2rem;" value="<?php echo $employee_no ?>">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Department: </div>
                                <div class="col-md-6">
                                    <input type="text" id="department" name="department" class="form-control mb-1" style="height:2rem;" value="<?php echo $department ?>" disabled>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6"></div>
                                <div class="col-md-5"><button type="button" id="search_button" class="btn btn-danger w-100">Search Employee</button></div>
                            </div>
                        </li>
                        <h1 class="fs-5">Basic Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Rate / Hour: </div>
                                <div class="col-md-6">
                                    <input type="text" id="basic_rate_hour" name="basic_rate_hour" value="<?php echo $basic_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">No. of Hours / Cut Off: </div>
                                <div class="col-md-6">
                                    <input type="text" id="basic_num_hours_cutoff" name="basic_num_hours_cutoff" value="<?php echo $basic_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Income / Cut Off: </div>
                                <div class="col-md-6">
                                    <input type="text" id="basic_income_cutoff" name="basic_income_cutoff" value="<?php echo $basic_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Honorarium Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Rate / Hour: </div>
                                <div class="col-md-6">
                                    <input type="text" id="hono_rate_hour" name="hono_rate_hour" value="<?php echo $hono_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">No. of Hours/ Cut off </div>
                                <div class="col-md-6">
                                    <input type="text" id="hono_num_hours_cutoff" name="hono_num_hours_cutoff" value="<?php echo $hono_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Income / Cut Off: </div>
                                <div class="col-md-6">
                                    <input type="text" id="hono_income_cutoff" name="hono_income_cutoff" value="<?php echo $hono_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Other Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Rate / Hour: </div>
                                <div class="col-md-6">
                                    <input type="text" id="other_rate_hour" name="other_rate_hour" value="<?php echo $other_rate_hour; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">No. of Hours / Cut off: </div>
                                <div class="col-md-6">
                                    <input type="text" id="other_num_hours_cutoff" name="other_num_hours_cutoff" value="<?php echo $other_num_hours_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Income / Cut Off: </div>
                                <div class="col-md-6">
                                    <input type="text" id="other_income_cutoff" name="other_income_cutoff" value="<?php echo $other_income_cutoff; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <h1 class="fs-5">Summary Income:</h1>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Gross Income: </div>
                                <div class="col-md-6">
                                    <input type="text" id="gross_income" name="gross_income" value="<?php echo $gross_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="row align-items-center">
                                <div class="col-md-6">Net Income: </div>
                                <div class="col-md-6">
                                    <input type="text" id="net_income" name="net_income" value="<?php echo $net_income; ?>" class="form-control mb-1" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
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
                                        <div class="col-md-6">First Name: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="firstname" name="firstname" class="form-control mb-1 w-75" value="<?php echo $firstname ?>" style="height:2rem;">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Middle Name: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="mname" name="mname" class="form-control mb-1 w-75" value="<?php echo $mname ?>" style="height:2rem;">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Surname: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="surname" name="surname" class="form-control mb-1 w-75" value="<?php echo $surname ?>" style="height:2rem;">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            Civil Status:
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="civil_status" name="civil_status" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $civil_status ?>">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Designation: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="designation" name="designation" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $designation ?>">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Qualified Dependents: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="qualified_dependents" name="qualified_dependents" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $qualified_dependents ?>">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Paydate: </div>
                                        <div class="col-md-6">
                                            <input type="date" id="paydate" name="paydate" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $paydate ?>">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Employee Status: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="emp_status" name="emp_status" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $emp_status ?>">
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Regular Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">SSS Contribution: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="sss_contri" name="sss_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $sss_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">PhilHealth Contribution: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="philH_contri" name="philH_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $philH_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Pagibig Contribution: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="pagibig_contri" name="pagibig_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $pagibig_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Income Tax Contribution: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="tax_contri" name="tax_contri" class="form-control mb-1 w-75" style="height:2rem;" value="<?php echo $tax_contri ?>" aria-label="Amount (to the nearest dollar)" disabled>
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Other Deduction:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">SSS Loan: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="sss_loan" name="sss_loan" value="<?php echo $sss_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Pagibig Loan: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="pagibig_loan" name="pagibig_loan" value="<?php echo $pagibig_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Faculty Saving Deposit: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="fs_deposit" name="fs_deposit" value="<?php echo $fs_deposit; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Faculty Saving Loan: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="fs_loan" name="fs_loan" value="<?php echo $fs_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Salary Loan: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="salary_loan" name="salary_loan" value="<?php echo $salary_loan; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6"> Other Loans: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="other_loans" name="other_loans" value="<?php echo $other_loans; ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                </li>
                                <h1 class="fs-5">Deduction Summary:</h1>
                                <li class="list-group-item border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">Total Deductions: </div>
                                        <div class="col-md-6">
                                            <input type="text" id="total_deduct" name="total_deduct" value="<?php echo $total_deduct ?>" class="form-control mb-1 w-75" style="height:2rem;" aria-label="Amount (to the nearest dollar)" disabled>
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
                                            <button type="submit" name='save' id='save' class="btn btn-warning  w-100 " style="white-space: nowrap; font-size:0.9rem;">Save</button>
                                        </div>
                                        <div class="col-3">
                                            <button type='submit' name='print_payslip' class="btn btn-info  w-100 " style="white-space: nowrap; font-size:0.9rem;">Print Payslip</button>
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
                </div>
            </div>
        </form>
    </div>
</body>
</html>