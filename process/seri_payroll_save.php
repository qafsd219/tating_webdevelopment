<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    //getting data from input textboxes for employee income
    $employee_number = $_POST['employee_no'];
    $basic_rate_hour = $_POST['basic_rate_hour'];
    $basic_num_hours_cutoff = $_POST['basic_num_hours_cutoff'];
    $basic_income_cutoff = $_POST['basic_income_cutoff'];
    $hono_rate_hour = $_POST['hono_rate_hour'];
    $hono_num_hours_cutoff = $_POST['hono_num_hours_cutoff'];
    $hono_income_cutoff = $_POST['hono_income_cutoff'];
    $other_rate_hour = $_POST['other_rate_hour'];
    $other_num_hours_cutoff = $_POST['other_num_hours_cutoff'];
    $other_income_cutoff = $_POST['other_income_cutoff'];
    $gross_income = $_POST['gross_income'];
    $net_income = $_POST['net_income'];
    //getting data from employee personal information
    $pay_date = $_POST['paydate'];
    //getting data from input textboxed for employee deduction
    $sss_contri = $_POST['sss_contri'];
    $pagibig_contri = $_POST['pagibig_contri'];
    $philH_contri = $_POST['philH_contri'];
    $tax_contri = $_POST['tax_contri'];
    $sss_loan = $_POST['sss_loan'];
    $pagibig_loan = $_POST['pagibig_loan'];
    $fs_deposit = $_POST['fs_deposit'];
    $fs_loan = $_POST['fs_loan'];
    $salary_loan = $_POST['salary_loan'];
    $other_loans = $_POST['other_loans'];
    $total_deduction = $_POST['total_deduct'];
    //add db_connections codes
    include 'db_connection.php';
    $conn = OpenCon();
    //save employee record to database
    $sql1 = "INSERT INTO incometbl (employee_no, income_date, 
                basic_rate_hours, basic_num_hrs, basic_income,
                hono_rate_hour, hono_num_hrs, hono_income,
                other_rate_hours, other_num_hrs, other_income,
                gross_income, net_income)
            VALUES ('$employee_number', '$pay_date',
                '$basic_rate_hour', '$basic_num_hours_cutoff', '$basic_income_cutoff',
                '$hono_rate_hour', '$hono_num_hours_cutoff', '$hono_income_cutoff',
                '$other_rate_hour', '$other_num_hours_cutoff', '$other_income_cutoff',
                '$gross_income', '$net_income')";
    if ($conn->query(sql1) === TRUE){
        //echo '<script> alert ("New record created succesfully")</script>';
        //echo '<script> window.location.href="http://localhost/lpu_web_development/my_web/employee_registration_save.php"</script>'
    } else {
        //echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
    $sql2 = "INSERT INTO deductiontbl (employee_no. deduction_date, sss_contri, philHealth_contri,
                pagibig_contri, income_tax_contri, sss_loan
                pagibig_loan, faculty_savings_deposit,
                faculty_savings_loan, salary_loan, other_loans,
                total_deduction)
            VALUES ('$employee_number', '$pay_date', '$sss_contri', '$philH_contri', '$pagibig_contri', '$tax_contri'
                '$sss_loan', '$pagibig_loan', '$fs_deposit', '$fs_loan', '$salary_loan', '$other_loans', '$total_deduction')";
    if ($conn->query(sql1) === TRUE){
        //echo '<script> alert ("New record created succesfully")</script>';
        //echo '<script> window.location.href="http://localhost/lpu_web_development/my_web/employee_registration_save.php"</script>'
    } else {
        //echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
    // close database connection
    $conn->close();
    // return results
    echo json_encode([
        'ok' => 1
    ]);
}
?>