<?php
function empty_inputbox()
{
    $employee_no = "";
    $employee_no = "";
    $department = "";
    $firstname = "";
    $mname = "";
    $surname = "";
    $civil_status = "";
    $designation = "";
    $qualified_dependents = "";
    $paydate = "";
    $emp_status = "";
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
}
//decleration of variables with fix data value for employee info
$employee_no = "67890";
$department = "COECSA";
$firstname = "Jonas";
$mname = "Austin";
$surname = "Tating";
$civil_status = "Single";
$designation = "Student";
$qualified_dependents = "S";
$paydate = "October 9 2023";
$emp_status = "Job Order";
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
//declaration of variables that will the results of the given formula
$basic_income_cutoff = "";
$hono_income_cutoff = "";
$other_income_cutoff = "";
$gross_income = "";
$net_income = "";
$total_deduct = "";
session_start();
//getting input from textbox and place it inside the variable by calling the name of the inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        function calculateSSSContribution($grossIncome)
                        {
                            // Define the SSS contribution table as an array
                            $sssTable = [
                                0 => 180,
                                4250 => 202.50,
                                4750 => 225.00,
                                5250 => 247.00,
                                5750 => 270.00,
                                6250 => 292.50,
                                6750 => 315.00,
                                7250 => 337.50,
                                7750 => 360.00,
                                8250 => 382.50,
                                8750 => 405.00,
                                9250 => 427.50,
                                9750 => 450.00,
                                10250 => 472.50,
                                10750 => 495.00,
                                11250 => 517.50,
                                11750 => 540.00,
                                12250 => 562.50,
                                12750 => 585.00,
                                13250 => 607.50,
                                13750 => 630.00,
                                14250 => 652.50,
                                14750 => 675.00,
                                15250 => 697.50,
                                15750 => 720.00,
                                16250 => 742.50,
                                16750 => 765.00,
                                17250 => 787.50,
                                17750 => 810.00,
                                18250 => 832.50,
                                18750 => 855.00,
                                19250 => 877.50,
                                19750 => 900.00,
                                20250 => 922.50,
                                20750 => 945.00,
                                21250 => 967.50,
                                21750 => 990.00,
                                22250 => 1012.50,
                                22750 => 1035.00,
                                23250 => 1057.50,
                                23750 => 1080.00,
                                24250 => 1102.50,
                                24750 => 1125.00,
                                25250 => 1147.50,
                                25750 => 1170.00,
                                26250 => 1192.50,
                                26750 => 1215.00,
                                27250 => 1237.50,
                                27750 => 1260.00,
                                28250 => 1282.50,
                                28750 => 1305.00,
                                29250 => 1327.50,
                            ];
                            // Find the appropriate contribution based on gross income
                            foreach ($sssTable as $incomeLimit => $contribution) {
                                if ($grossIncome <= $incomeLimit) {
                                    return $contribution;
                                }
                            }
                            // If no match found, return a default value
                            return 1350.00; // Default contribution
                        }
                        function calculatePhilHealthContribution($grossIncome)
                        {
                            // Define the PhilHealth contribution table as an array
                            $philHealthTable = [
                                0 => 450.00,
                                10000.01 => 0.045,
                                90000.00 => 4050.00
                            ];

                            // Find the appropriate contribution based on gross income
                            foreach ($philHealthTable as $incomeLimit => $contribution) {
                                if ($grossIncome <= $incomeLimit) {
                                    return $contribution;
                                }
                            }

                            // If no match found, return a default value
                            return 4050.00; // Default contribution
                        }
                        //tax computation
                        //example ( net income - from the table data) * .25 + tax from table base from net income range
                        function calculateTaxContribution($qualified_dependents, $gross_income)
                        {
                            switch (strtolower($qualified_dependents)) {
                                case "z":
                                    return calculateTaxForZeroExemption($gross_income);
                                case "s":
                                case "me":
                                    return calculateTaxForSingleOrMarriedWithOneQualifiedDependent($gross_income);
                                case "me1":
                                case "s1":
                                    return calculateTaxForSingleOrMarriedWithQualifiedDependents(0, $gross_income);
                                case "me2":
                                case "s2":
                                    return calculateTaxForSingleOrMarriedWithQualifiedDependents(1, $gross_income);
                                case "me3":
                                case "s3":
                                    return calculateTaxForSingleOrMarriedWithQualifiedDependents(2, $gross_income);
                                case "me4":
                                case "s4":
                                    return calculateTaxForSingleOrMarriedWithQualifiedDependents(3, $gross_income);
                                default:
                                    return 0;
                            }
                        }
                        function calculateTaxForZeroExemption($gross_income)
                        {
                            if ($gross_income <= 833 && $gross_income >= 0) {
                                return (($gross_income - 0) * 0.05) + 0;
                            } else if ($gross_income >= 834 && $gross_income <= 2500) {
                                return (($gross_income - 833) * 0.10) + 41.67;
                            } else if ($gross_income >= 2501 && $gross_income <= 5833) {
                                return (($gross_income - 2500) * 0.15) + 208.33;
                            } else if ($gross_income >= 5834 && $gross_income <= 11667) {
                                return (($gross_income - 5833) * 0.20) + 708.33;
                            } else if ($gross_income >= 11668 && $gross_income <= 20833) {
                                return (($gross_income - 11667) * 0.25) + 1875;
                            } else if ($gross_income >= 20834 && $gross_income <= 41667) {
                                return (($gross_income - 20834) * 0.30) + 4166.67;
                            } else {
                                return (($gross_income - 41667) * 0.32) + 10416.67;
                            }
                        }
                        function calculateTaxForSingleOrMarriedWithOneQualifiedDependent($gross_income)
                        {
                            if ($gross_income <= 0 && $gross_income <= 10417) {
                                return $gross_income * 0;
                            } else if ($gross_income > 10417 && $gross_income <= 16666) {
                                return $gross_income * 0.20;
                            } else if ($gross_income >= 16667 && $gross_income <= 33332) {
                                return $gross_income * 0.25;
                            } else if ($gross_income >= 33333 && $gross_income <= 83332) {
                                return $gross_income * 0.30;
                            } else if ($gross_income >= 83333 && $gross_income <= 333332) {
                                return $gross_income * 0.32;
                            } else if ($gross_income >= 333333) {
                                return $gross_income * 0.32;
                            }
                            return 0;
                        }
                        function calculateTaxForSingleOrMarriedWithQualifiedDependents($dependentsCount, $gross_income)
                        {
                            $exemptions = [6250, 8333, 10417, 12500];
                            $taxRates = [0.05, 0.10, 0.15, 0.20, 0.25, 0.30, 0.32];

                            if ($gross_income <= $exemptions[$dependentsCount] && $gross_income >= 0) {
                                return ($gross_income - 0) * $taxRates[$dependentsCount];
                            } else if ($gross_income >= $exemptions[$dependentsCount] + 1 && $gross_income <= ($exemptions[$dependentsCount] + 833)) {
                                return (($gross_income - $exemptions[$dependentsCount]) * $taxRates[$dependentsCount - 1]) + 0;
                            } else if ($gross_income >= ($exemptions[$dependentsCount] + 834) && $gross_income <= ($exemptions[$dependentsCount] + 2083)) {
                                return (($gross_income - ($exemptions[$dependentsCount] + 833)) * $taxRates[$dependentsCount - 1]) + 41.67;
                            } else if ($gross_income >= ($exemptions[$dependentsCount] + 2084) && $gross_income <= ($exemptions[$dependentsCount] + 3750)) {
                                return (($gross_income - ($exemptions[$dependentsCount] + 2083)) * $taxRates[$dependentsCount - 1]) + 208.33;
                            } else if ($gross_income >= ($exemptions[$dependentsCount] + 3751) && $gross_income <= ($exemptions[$dependentsCount] + 6250)) {
                                return (($gross_income - ($exemptions[$dependentsCount] + 3750)) * $taxRates[$dependentsCount - 1]) + 708.33;
                            } else if ($gross_income >= ($exemptions[$dependentsCount] + 6251) && $gross_income <= ($exemptions[$dependentsCount] + 12083)) {
                                return (($gross_income - ($exemptions[$dependentsCount] + 6250)) * $taxRates[$dependentsCount - 1]) + 1875;
                            } else if ($gross_income >= ($exemptions[$dependentsCount] + 12084) && $gross_income <= ($exemptions[$dependentsCount] + 22083)) {
                                return (($gross_income - ($exemptions[$dependentsCount] + 12083)) * $taxRates[$dependentsCount - 1]) + 4166.67;
                            } else {
                                return (($gross_income - ($exemptions[$dependentsCount] + 22083)) * $taxRates[$dependentsCount - 1]) + 10416.67;
                            }
                        }
                        $tax_contri = calculateTaxContribution($qualified_dependents, $gross_income);
                        echo "Tax Contribution: $tax_contri";
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

                        $basic_income_cutoff = $basic_rate_hour * $basic_num_hours_cutoff;
                        $hono_income_cutoff = $hono_rate_hour * $hono_num_hours_cutoff;
                        $other_income_cutoff = $other_rate_hour * $other_num_hours_cutoff;
                        $gross_income = $basic_income_cutoff + $hono_income_cutoff + $other_income_cutoff;
                        //sss contribution
                        if ($gross_income >= 0 && $gross_income <= 4250) {
                            $sss_contri = 180;
                        } else if ($gross_income >= 4250 && $gross_income <= 4749.99) {
                            $sss_contri = 202.50;
                        } else if ($gross_income >= 4750 && $gross_income <= 5249.99) {
                            $sss_contri = 225.00;
                        } else if ($gross_income >= 5250 && $gross_income <= 5749.99) {
                            $sss_contri = 247.00;
                        } else if ($gross_income >= 5750 && $gross_income <= 6249.99) {
                            $sss_contri = 270.00;
                        } else if ($gross_income >= 6250 && $gross_income <= 6749.99) {
                            $sss_contri = 292.50;
                        } else if ($gross_income >= 6750 && $gross_income <= 7249.99) {
                            $sss_contri = 315.00;
                        } else if ($gross_income >= 7250 && $gross_income <= 7749.99) {
                            $sss_contri = 337.50;
                        } else if ($gross_income >= 7750 && $gross_income <= 8249.99) {
                            $sss_contri = 360.00;
                        } else if ($gross_income >= 8250 && $gross_income <= 8749.99) {
                            $sss_contri = 382.50;
                        } else if ($gross_income >= 8750 && $gross_income <= 9249.99) {
                            $sss_contri = 405.00;
                        } else if ($gross_income >= 9250 && $gross_income <= 9749.99) {
                            $sss_contri = 427.50;
                        } else if ($gross_income >= 9750 && $gross_income <= 10249.99) {
                            $sss_contri = 450.00;
                        } else if ($gross_income >= 10250 && $gross_income <= 10749.99) {
                            $sss_contri = 472.50;
                        } else if ($gross_income >= 10750 && $gross_income <= 11249.99) {
                            $sss_contri = 495.00;
                        } else if ($gross_income >= 11250 && $gross_income <= 11749.99) {
                            $sss_contri = 517.50;
                        } else if ($gross_income >= 11750 && $gross_income <= 12249.99) {
                            $sss_contri = 540.00;
                        } else if ($gross_income >= 12250 && $gross_income <= 12749.99) {
                            $sss_contri = 562.50;
                        } else if ($gross_income >= 12750 && $gross_income <= 13249.99) {
                            $sss_contri = 585.00;
                        } else if ($gross_income >= 13250 && $gross_income <= 13749.99) {
                            $sss_contri = 607.50;
                        } else if ($gross_income >= 13750 && $gross_income <= 14249.99) {
                            $sss_contri = 630.00;
                        } else if ($gross_income >= 14250 && $gross_income <= 14749.99) {
                            $sss_contri = 652.50;
                        } else if ($gross_income >= 14750 && $gross_income <= 15249.99) {
                            $sss_contri = 675.00;
                        } else if ($gross_income >= 15250 && $gross_income <= 15749.99) {
                            $sss_contri = 697.50;
                        } else if ($gross_income >= 15750 && $gross_income <= 16249.99) {
                            $sss_contri = 720.00;
                        } else if ($gross_income >= 16250 && $gross_income <= 16749.99) {
                            $sss_contri = 742.50;
                        } else if ($gross_income >= 16750 && $gross_income <= 17249.99) {
                            $sss_contri = 765.00;
                        } else if ($gross_income >= 17250 && $gross_income <= 17749.99) {
                            $sss_contri = 787.50;
                        } else if ($gross_income >= 17750 && $gross_income <= 18249.99) {
                            $sss_contri = 810.00;
                        } else if ($gross_income >= 18250 && $gross_income <= 18749.99) {
                            $sss_contri = 832.50;
                        } else if ($gross_income >= 18750 && $gross_income <= 19249.99) {
                            $sss_contri = 855.00;
                        } else if ($gross_income >= 19250 && $gross_income <= 19749.99) {
                            $sss_contri = 877.50;
                        } else if ($gross_income >= 19750 && $gross_income <= 20249.99) {
                            $sss_contri = 900.00;
                        } else if ($gross_income >= 20250 && $gross_income <= 20749.99) {
                            $sss_contri = 922.50;
                        } else if ($gross_income >= 20750 && $gross_income <= 21249.99) {
                            $sss_contri = 945.00;
                        } else if ($gross_income >= 21250 && $gross_income <= 21749.99) {
                            $sss_contri = 967.50;
                        } else if ($gross_income >= 21750 && $gross_income <= 22249.99) {
                            $sss_contri = 990.00;
                        } else if ($gross_income >= 22250 && $gross_income <= 22749.99) {
                            $sss_contri = 1012.50;
                        } else if ($gross_income >= 22750 && $gross_income <= 23249.99) {
                            $sss_contri = 1035.00;
                        } else if ($gross_income >= 23250 && $gross_income <= 23749.99) {
                            $sss_contri = 1057.50;
                        } else if ($gross_income >= 23750 && $gross_income <= 24249.99) {
                            $sss_contri = 1080.00;
                        } else if ($gross_income >= 24250 && $gross_income <= 24749.99) {
                            $sss_contri = 1102.50;
                        } else if ($gross_income >= 24750 && $gross_income <= 25249.99) {
                            $sss_contri = 1125.00;
                        } else if ($gross_income >= 25250 && $gross_income <= 25749.99) {
                            $sss_contri = 1147.50;
                        } else if ($gross_income >= 25750 && $gross_income <= 26249.99) {
                            $sss_contri = 1170.00;
                        } else if ($gross_income >= 26250 && $gross_income <= 26749.99) {
                            $sss_contri = 1192.50;
                        } else if ($gross_income >= 26750 && $gross_income <= 27249.99) {
                            $sss_contri = 1215.00;
                        } else if ($gross_income >= 27250 && $gross_income <= 27749.99) {
                            $sss_contri = 1237.50;
                        } else if ($gross_income >= 27750 && $gross_income <= 28249.99) {
                            $sss_contri = 1260.00;
                        } else if ($gross_income >= 28250 && $gross_income <= 28749.99) {
                            $sss_contri = 1282.50;
                        } else if ($gross_income >= 28750 && $gross_income <= 29249.99) {
                            $sss_contri = 1305.00;
                        } else if ($gross_income >= 29250 && $gross_income <= 29749.99) {
                            $sss_contri = 1327.50;
                        } else {
                            $sss_contri = 1350.00;
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
                        //example ( net income - from the table data) * .25 + tax from table base fromnet income range
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
                        $total_deduct = $sss_contri + $philH_contri + $pagibig_contri + $tax_contri + $sss_loan + $pagibig_loan + $fs_deposit + $fs_loan + $salary_loan + $other_loans;
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
        empty_inputbox();
    } else if (isset($_POST["print_preview"])) {
        // to press Print Payslip button
    } else if (isset($_POST["print_payslip"])) {
        // to press Cancel button
    } else if (isset($_POST["cancel"])) {
        empty_inputbox();
        // to press Close button
    } else if (isset($_POST["close"])) {
        header('Location: '. '/admin_page.php');
    }
}