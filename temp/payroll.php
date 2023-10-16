<!DOCTYPE html>
<html>
<head>
    <title>Doctor Jen's | Employee Payroll</title>
    <link rel="stylesheet" type="text/css" href="css/payroll.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2>Employee Basic Info:</h2>
            <form action="" method="post">
                <div class="pic">
                    <img src="uploads/profile.jpg" width="200px" height="200px">
                </div>
                <div class="form-group">
                    <label for="employee_number">Employee Number:</label>
                    <input type="text" id="employee_number" name="employee_number" required>
                </div>
                <div class="form-group">
                    <label for="search-button">Search Employee:</label>
                    <button type="submit" class="search-btn">Search</button>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" readonly>
                </div>
                <h2>Basic Income:</h2>
                    <div class="form-group">
                        <label for="rate_per_hour">Rate / Hour:</label>
                        <input type="text" id="rate_per_hour" name="rate_per_hour" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hours_per_cutoff">No. of Hours / Cut Off:</label>
                        <input type="text" id="hours_per_cutoff" name="hours_per_cutoff" readonly>
                    </div>
                    <div class="form-group">
                        <label for="income_per_cutoff">Income / Cut Off:</label>
                        <input type="text" id="income_per_cutoff" name="income_per_cutoff" readonly>
                    </div>
                <h2>Honorarium Income:</h2>
                    <div class="form-group">
                        <label for="rate_per_hour">Rate / Hour:</label>
                        <input type="text" id="rate_per_hour" name="rate_per_hour" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hours_per_cutoff">No. of Hours / Cut Off:</label>
                        <input type="text" id="hours_per_cutoff" name="hours_per_cutoff" readonly>
                    </div>
                    <div class="form-group">
                        <label for="income_per_cutoff">Income / Cut Off:</label>
                        <input type="text" id="income_per_cutoff" name="income_per_cutoff" readonly>
                    </div>
                    <h2>Other Income:</h2>
                    <div class="form-group">
                        <label for="rate_per_hour">Rate / Hour:</label>
                        <input type="text" id="rate_per_hour" name="rate_per_hour" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hours_per_cutoff">No. of Hours / Cut Off:</label>
                        <input type="text" id="hours_per_cutoff" name="hours_per_cutoff" readonly>
                    </div>
                    <div class="form-group">
                        <label for="income_per_cutoff">Income / Cut Off:</label>
                        <input type="text" id="income_per_cutoff" name="income_per_cutoff" readonly>
                    </div>
                <h2>Summary Income:</h2>
                    <div class="form-group">
                        <label for="gross_incom">Gross Income:</label>
                        <input type="text" id="gross_income" name="gross_income" readonly>
                    </div>
                    <div class="form-group">
                        <label for="net_income">Net Income:</label>
                        <input type="text" id="net_income" name="net_income" readonly>
                    </div>
            </form>
        </div>
        <div class="right-column">
            <form action="" method="post">
                <br><br></br></br>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" readonly>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" readonly>
                </div>
                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" readonly>
                </div>
                <div class="form-group">
                    <label for="civil_status">Civil Status:</label>
                    <input type="text" id="civil_status" name="civil_status" readonly>
                </div>
                <div class="form-group">
                    <label for="qualified_dependents">Qualified Dependents:</label>
                    <input type="text" id="qualified_dependents" name="qualified_dependents" readonly>
                </div>
                <div class="form-group">
                    <label for="paydate">Paydate:</label>
                    <input type="text" id="paydate" name="paydate" readonly>
                </div>
                <div class="form-group">
                    <label for="employee_status">Employee Status:</label>
                    <input type="text" id="employee_status" name="employee_status" readonly>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" id="designation" name="designation" readonly>
                </div>
                <h2>Regular Deductions:</h2>
                    <div class="form-group">
                        <label for="sss_contribution">SSS Contribution:</label>
                        <input type="text" id="sss_contribution" name="sss_contribution" readonly>
                    </div>
                    <div class="form-group">
                        <label for="philhealth_contribution">Philhealth Contribution:</label>
                        <input type="text" id="philhealth_contribution" name="philhealth_contribution" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pagibig_contribution">Pag-IBIG Contribution:</label>
                        <input type="text" id="pagibig_contribution" name="pagibig_contribution" readonly>
                    </div>
                    <div class="form-group">
                        <label for="income_tax_contribution">Income Tax Contribution:</label>
                        <input type="text" id="income_tax_contribution" name="income_tax_contribution" readonly>
                    </div>
                <h2>Other Deductions:</h2>
                    <div class="form-group">
                        <label for="sss_loan">SSS Loan:</label>
                        <input type="text" id="sss_loan" name="sss_loan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pagibig_loan">Philhealth Contribution:</label>
                        <input type="text" id="pagibig_loan" name="pagibig_loan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="faculty_savings_deposit">Faculty Savings Deposit:</label>
                        <input type="text" id="faculty_savings_deposit" name="faculty_savings_deposit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="faculty_savings_loan">Faculty Savings Loan:</label>
                        <input type="text" id="faculty_savings_loan" name="faculty_savings_loan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="salary_loan">Salary Loan:</label>
                        <input type="text" id="salary_loan" name="salary_loan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="other_loan">Other Loan:</label>
                        <input type="text" id="other_loan" name="other_loan" readonly>
                    </div>
                <h2>Deduction Summary:</h2>
                    <div class="form-group">
                        <label for="total_deductions">Total Deductions:</label>
                        <input type="text" id="total_deductions" name="total_deductions" readonly>
                    </div>
            </form>
            <div>
                <button type="button" class="blue-btn">GROSS INCOME</button>
                <button type="button" class="blue-btn">NET INCOME</button>
                <button type="button" class="green-btn">SAVE</button>
                <button type="button" class="green-btn">UPDATE</button>
                <button type="button" class="new-btn">NEW</button>
            </div>
        </div>
    </div>
</body>
</html>
