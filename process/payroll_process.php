<?php

//decleration of variables with fix data value for employee info
$employee_no = "";
$department = "DOE";
$firstname = "Jonas Austin";
$mname = "Jamir";
$surname = "Tating";
$civil_status = "Single";
$designation = "Student";
$qualified_dependents = "S";
$paydate = "";
$emp_status = "Active";
//decleration of variables where inputs are stored
$basic_rate_hour = "";
$basic_num_hours_cutoff = "";
$hono_rate_hour = "";
$hono_num_hours_cutoff = "";
$other_rate_hour = "";
$other_num_hours_cutoff = "";
$sss_contri = 0.00;
$philH_contri = 0.00;
$pagibig_contri = 100.00;
$tax_contri = 0.00;
$sss_loan = "";
$pagibig_loan = "";
$fs_deposit = "";
$fs_loan = "";
$salary_loan = "";
$other_loans = "";

//declarion of variables that will the results of the given formula
$basic_income_cutoff = "";
$hono_income_cutoff = "";
$other_income_cutoff = "";
$gross_income = "";
$net_income = "";
$total_deduct = "";

session_start();
//getting input from textbox and place it inside the variable by calling the name of the inputs
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['id'])) {
    // to press Calculate Gross Income button
    if (isset($_POST["calculate_gross_income"])) {
        $basic_rate_hour = $_POST["basic_rate_hour"];
        $basic_num_hours_cutoff = $_POST["basic_num_hours_cutoff"];
        $hono_rate_hour = $_POST["hono_rate_hour"];
        $hono_num_hours_cutoff = $_POST["hono_num_hours_cutoff"];
        $other_rate_hour = $_POST["other_rate_hour"];
        $other_num_hours_cutoff = $_POST["other_num_hours_cutoff"];
        $sss_loan = $_POST["sss_loan"];
        $pagibig_loan = $_POST["pagibig_loan"];
        $fs_deposit = $_POST["fs_deposit"];
        $fs_loan = $_POST["fs_loan"];
        $salary_loan = $_POST["salary_loan"];
        $other_loans = $_POST["other_loans"];
        $qualified_dependents = $_POST["qualified_dependents"];

        $basic_income_cutoff = $basic_rate_hour * $basic_num_hours_cutoff;
        $hono_income_cutoff = $hono_rate_hour * $hono_num_hours_cutoff;
        $other_income_cutoff = $other_rate_hour * $other_num_hours_cutoff;
        $gross_income = $basic_income_cutoff + $hono_income_cutoff + $other_income_cutoff;

        //sss contribution
        $sss_contri = 1178.70;
        $philH_contri = 437.50;
        for ($i = 1000; $i <= 15250; $i += 500) {
            if ($gross_income >= $i && $gross_income <= $i + 499.99) {
                $sss_contri = ($i / 250) * 36.80 + 737.70;
                break;
            }
        }
        //philhealth contribution based from the given PhilHealth Table
        for ($i = 0; $i <= 35000; $i += 1000) {
            if ($gross_income <= $i + 999.99) {
                $philH_contri = ($i / 1000) * 12.50 + 100;
                break;
            }
        }

        //tax computation
        //example ( net income - from the table data) * .25 + tax from table base from net income range
        switch (strtolower($qualified_dependents)) {

                //for zero exemption
            case "z":
                if ($gross_income <= 833 && $gross_income >= 0) {
                    $tax_contri = ((($gross_income - 0) * .05) + 0);
                } else if ($gross_income >= 834 && $gross_income <= 2500) {
                    $tax_contri = ((($gross_income - 833) * .10) + 41.67);
                } else if ($gross_income >= 2501 && $gross_income <= 5833) {
                    $tax_contri = ((($gross_income - 2500) * .15) + 208.33);
                } else if ($gross_income >= 5834 && $gross_income <= 11667) {
                    $tax_contri = ((($gross_income - 5833) * .20) + 708.33);
                } else if ($gross_income >= 11668 && $gross_income <= 20833) {
                    $tax_contri = ((($gross_income - 11667) * .25) + 1875);
                } else if ($gross_income >= 20834 && $gross_income <= 41667) {
                    $tax_contri = ((($gross_income - 20834) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 41667) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with one qualified dependents
            case "s":
            case "me":
                if ($gross_income <= 50 && $gross_income >= 0) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 4167 && $gross_income <= 5000) {
                    $tax_contri = ((($gross_income - 0) * .05) + 0);
                } else if ($gross_income >= 5001 && $gross_income <= 6667) {
                    $tax_contri = ((($gross_income - 5000) * .10) + 41.67);
                } else if ($gross_income >= 6668 && $gross_income <= 10000) {
                    $tax_contri = ((($gross_income - 6667) * .15) + 208.33);
                } else if ($gross_income >= 10001 && $gross_income <= 15833) {
                    $tax_contri = ((($gross_income - 10000) * .20) + 708.33);
                } else if ($gross_income >= 15834 && $gross_income <= 25000) {
                    $tax_contri = ((($gross_income - 15833) * .25) + 1875);
                } else if ($gross_income >= 25001 && $gross_income <= 45833) {
                    $tax_contri = ((($gross_income - 25000) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 45833) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me1":
            case "s1":
                if ($gross_income <= 75 && $gross_income >= 6250) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 6251 && $gross_income <= 7083) {
                    $tax_contri = ((($gross_income - 6250) * .05) + 0);
                } else if ($gross_income >= 7084 && $gross_income <= 8750) {
                    $tax_contri = ((($gross_income - 7083) * .10) + 41.67);
                } else if ($gross_income >= 8751 && $gross_income <= 12083) {
                    $tax_contri = ((($gross_income - 8750) * .15) + 208.33);
                } else if ($gross_income >= 12084 && $gross_income <= 17917) {
                    $tax_contri = ((($gross_income - 12083) * .20) + 708.33);
                } else if ($gross_income >= 17918 && $gross_income <= 27083) {
                    $tax_contri = ((($gross_income - 17917) * .25) + 1875);
                } else if ($gross_income >= 27084 && $gross_income <= 47917) {
                    $tax_contri = ((($gross_income - 27083) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 47917) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me2":
            case "s2":
                if ($gross_income <= 100 && $gross_income >= 8333) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 8334 && $gross_income <= 9167) {
                    $tax_contri = ((($gross_income - 8333) * .05) + 0);
                } else if ($gross_income >= 9168 && $gross_income <= 10833) {
                    $tax_contri = ((($gross_income - 9167) * .10) + 41.67);
                } else if ($gross_income >= 10834 && $gross_income <= 14167) {
                    $tax_contri = ((($gross_income - 10833) * .15) + 208.33);
                } else if ($gross_income >= 14168 && $gross_income <= 20000) {
                    $tax_contri = ((($gross_income - 14167) * .20) + 708.33);
                } else if ($gross_income >= 20001 && $gross_income <= 29167) {
                    $tax_contri = ((($gross_income - 20000) * .25) + 1875);
                } else if ($gross_income >= 29168 && $gross_income <= 50000) {
                    $tax_contri = ((($gross_income - 29167) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 50000) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me3":
            case "s3":
                if ($gross_income <= 125 && $gross_income >= 10417) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 10418 && $gross_income <= 11250) {
                    $tax_contri = ((($gross_income - 10417) * .05) + 0);
                } else if ($gross_income >= 11251 && $gross_income <= 12917) {
                    $tax_contri = ((($gross_income - 11250) * .10) + 41.67);
                } else if ($gross_income >= 12918 && $gross_income <= 16250) {
                    $tax_contri = ((($gross_income - 12917) * .15) + 208.33);
                } else if ($gross_income >= 16251 && $gross_income <= 22083) {
                    $tax_contri = ((($gross_income - 16250) * .20) + 708.33);
                } else if ($gross_income >= 22084 && $gross_income <= 31250) {
                    $tax_contri = ((($gross_income - 22084) * .25) + 1875);
                } else if ($gross_income >= 31251 && $gross_income <= 52083) {
                    $tax_contri = ((($gross_income - 31250) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 52083) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me4":
            case "s4":
                if ($gross_income <= 150 && $gross_income >= 12500) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 12501 && $gross_income <= 13333) {
                    $tax_contri = ((($gross_income - 12500) * .05) + 0);
                } else if ($gross_income >= 13334 && $gross_income <= 15000) {
                    $tax_contri = ((($gross_income - 13333) * .10) + 41.67);
                } else if ($gross_income >= 15001 && $gross_income <= 18333) {
                    $tax_contri = ((($gross_income - 15001) * .15) + 208.33);
                } else if ($gross_income >= 18334 && $gross_income <= 24167) {
                    $tax_contri = ((($gross_income - 18333) * .20) + 708.33);
                } else if ($gross_income >= 24168 && $gross_income <= 33333) {
                    $tax_contri = ((($gross_income - 24167) * .25) + 1875);
                } else if ($gross_income >= 33334 && $gross_income <= 54167) {
                    $tax_contri = ((($gross_income - 33333) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 54167) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

            default:
                $tax_contri = 0;
        }

        // to press Calculate Net Income button
    } else if (isset($_POST["calculate_net_income"])) {
        $basic_rate_hour = $_POST["basic_rate_hour"];
        $basic_num_hours_cutoff = $_POST["basic_num_hours_cutoff"];
        $hono_rate_hour = $_POST["hono_rate_hour"];
        $hono_num_hours_cutoff = $_POST["hono_num_hours_cutoff"];
        $other_rate_hour = $_POST["other_rate_hour"];
        $other_num_hours_cutoff = $_POST["other_num_hours_cutoff"];
        $sss_loan = $_POST["sss_loan"];
        $pagibig_loan = $_POST["pagibig_loan"];
        $fs_deposit = $_POST["fs_deposit"];
        $fs_loan = $_POST["fs_loan"];
        $salary_loan = $_POST["salary_loan"];
        $other_loans = $_POST["other_loans"];
        $qualified_dependents = $_POST["qualified_dependents"];
        $employee_no = $_POST['employee_no'];

        $basic_income_cutoff = $basic_rate_hour * $basic_num_hours_cutoff;
        $hono_income_cutoff = $hono_rate_hour * $hono_num_hours_cutoff;
        $other_income_cutoff = $other_rate_hour * $other_num_hours_cutoff;
        $gross_income = $basic_income_cutoff + $hono_income_cutoff + $other_income_cutoff;


        //sss contribution
        $step = 22.5;
        $sss_contri = 180;
        $start = 4250;
        $end = 4749.99;
        for ($i = $start; $i < 29749.99; $i += 500) {
            if ($gross_income >= $start && $gross_income <= $end) {
                $sss_contri += $step;
                break;
            }
            $step += 22.5;
            $start += 500;
            $end += 500;
        }

        //philhealth contribution based from the given PhilHealth Table
        if ($gross_income <= 10000.00 && $gross_income >= 0) {
            $philH_contri = 450.00;
        } else if ($gross_income >= 10000.01 && $gross_income <= 89999.99) {
            $philH_contri = $gross_income * 0.045;
        } else {
            $philH_contri = 4050.00;
        }

        //tax computation
        //example ( net income - from the table data) * .25 + tax from table base from
        switch (strtolower($qualified_dependents)) {

                //for zero exemption
            case "z":
                if ($gross_income <= 833 && $gross_income >= 0) {
                    $tax_contri = ((($gross_income - 0) * .05) + 0);
                } else if ($gross_income >= 834 && $gross_income <= 2500) {
                    $tax_contri = ((($gross_income - 833) * .10) + 41.67);
                } else if ($gross_income >= 2501 && $gross_income <= 5833) {
                    $tax_contri = ((($gross_income - 2500) * .15) + 208.33);
                } else if ($gross_income >= 5834 && $gross_income <= 11667) {
                    $tax_contri = ((($gross_income - 5833) * .20) + 708.33);
                } else if ($gross_income >= 11668 && $gross_income <= 20833) {
                    $tax_contri = ((($gross_income - 11667) * .25) + 1875);
                } else if ($gross_income >= 20834 && $gross_income <= 41667) {
                    $tax_contri = ((($gross_income - 20834) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 41667) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with one qualified dependents
            case "s":
            case "me":
                if ($gross_income <= 0 && $gross_income <= 10417) {
                    $tax_contri = $gross_income * 0;
                } else if ($gross_income > 10417 && $gross_income <= 16666) {
                    $tax_contri = $gross_income * 0.20;
                } else if ($gross_income >= 16667 && $gross_income <= 33332) {
                    $tax_contri = $gross_income * 0.25;
                } else if ($gross_income >= 33333 && $gross_income <= 83332) {
                    $tax_contri = $gross_income * 0.30;
                } else if ($gross_income >= 83333 && $gross_income <= 333332) {
                    $tax_contri = $gross_income * 0.32;
                } else if ($gross_income >= 333333) {
                    $tax_contri = $gross_income * 0.32;
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me1":
            case "s1":
                if ($gross_income <= 75 && $gross_income >= 6250) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 6251 && $gross_income <= 7083) {
                    $tax_contri = ((($gross_income - 6250) * .05) + 0);
                } else if ($gross_income >= 7084 && $gross_income <= 8750) {
                    $tax_contri = ((($gross_income - 7083) * .10) + 41.67);
                } else if ($gross_income >= 8751 && $gross_income <= 12083) {
                    $tax_contri = ((($gross_income - 8750) * .15) + 208.33);
                } else if ($gross_income >= 12084 && $gross_income <= 17917) {
                    $tax_contri = ((($gross_income - 12083) * .20) + 708.33);
                } else if ($gross_income >= 17918 && $gross_income <= 27083) {
                    $tax_contri = ((($gross_income - 17917) * .25) + 1875);
                } else if ($gross_income >= 27084 && $gross_income <= 47917) {
                    $tax_contri = ((($gross_income - 27083) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 47917) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me2":
            case "s2":
                if ($gross_income <= 100 && $gross_income >= 8333) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 8334 && $gross_income <= 9167) {
                    $tax_contri = ((($gross_income - 8333) * .05) + 0);
                } else if ($gross_income >= 9168 && $gross_income <= 10833) {
                    $tax_contri = ((($gross_income - 9167) * .10) + 41.67);
                } else if ($gross_income >= 10834 && $gross_income <= 14167) {
                    $tax_contri = ((($gross_income - 10833) * .15) + 208.33);
                } else if ($gross_income >= 14168 && $gross_income <= 20000) {
                    $tax_contri = ((($gross_income - 14167) * .20) + 708.33);
                } else if ($gross_income >= 20001 && $gross_income <= 29167) {
                    $tax_contri = ((($gross_income - 20000) * .25) + 1875);
                } else if ($gross_income >= 29168 && $gross_income <= 50000) {
                    $tax_contri = ((($gross_income - 29167) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 50000) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me3":
            case "s3":
                if ($gross_income <= 125 && $gross_income >= 10417) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 10418 && $gross_income <= 11250) {
                    $tax_contri = ((($gross_income - 10417) * .05) + 0);
                } else if ($gross_income >= 11251 && $gross_income <= 12917) {
                    $tax_contri = ((($gross_income - 11250) * .10) + 41.67);
                } else if ($gross_income >= 12918 && $gross_income <= 16250) {
                    $tax_contri = ((($gross_income - 12917) * .15) + 208.33);
                } else if ($gross_income >= 16251 && $gross_income <= 22083) {
                    $tax_contri = ((($gross_income - 16250) * .20) + 708.33);
                } else if ($gross_income >= 22084 && $gross_income <= 31250) {
                    $tax_contri = ((($gross_income - 22084) * .25) + 1875);
                } else if ($gross_income >= 31251 && $gross_income <= 52083) {
                    $tax_contri = ((($gross_income - 31250) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 52083) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

                //for single or married with qualified dependents
            case "me4":
            case "s4":
                if ($gross_income <= 150 && $gross_income >= 12500) {
                    $tax_contri = (($gross_income - 0) + 0);
                } else if ($gross_income >= 12501 && $gross_income <= 13333) {
                    $tax_contri = ((($gross_income - 12500) * .05) + 0);
                } else if ($gross_income >= 13334 && $gross_income <= 15000) {
                    $tax_contri = ((($gross_income - 13333) * .10) + 41.67);
                } else if ($gross_income >= 15001 && $gross_income <= 18333) {
                    $tax_contri = ((($gross_income - 15001) * .15) + 208.33);
                } else if ($gross_income >= 18334 && $gross_income <= 24167) {
                    $tax_contri = ((($gross_income - 18333) * .20) + 708.33);
                } else if ($gross_income >= 24168 && $gross_income <= 33333) {
                    $tax_contri = ((($gross_income - 24167) * .25) + 1875);
                } else if ($gross_income >= 33334 && $gross_income <= 54167) {
                    $tax_contri = ((($gross_income - 33333) * .30) + 4166.67);
                } else {
                    $tax_contri = ((($gross_income - 54167) * .32) + 10416.67);
                }
                //$tax_contri=100;
                break;

            default:
                $tax_contri = 0;
        }
        $total_deduct = $sss_contri + $philH_contri + $pagibig_contri + $tax_contri +
            $sss_loan
            + $pagibig_loan + $fs_deposit + $fs_loan + $salary_loan + $other_loans;
        $net_income = $gross_income - $total_deduct;

        $_SESSION['basic_income_cutoff'] = $basic_income_cutoff;
        $_SESSION['hono_income_cutoff'] = $hono_income_cutoff;
        $_SESSION['other_income_cutoff'] = $other_income_cutoff;
        $_SESSION['sss_contri'] = $sss_contri;
        $_SESSION['philH_contri'] = $philH_contri;
        $_SESSION['pagibig_contri'] = $pagibig_contri;
        $_SESSION['tax_contri'] = $tax_contri;
        $_SESSION['total_deduct'] = $total_deduct;
        $_SESSION['gross_income'] = $gross_income;
        $_SESSION['net_income'] = $net_income;


        // to press NEW button
    } else if (isset($_POST["new"])) {
        header("Refresh:0; url=payroll_page.php");
    } else if (isset($_POST["close"])) {
        header("Refresh:0; url=admin.php");
    }
}
