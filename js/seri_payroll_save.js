$(document).ready(function() {
    //event listener for SAVE button
    $('#save_btn').click(function(e) {
        e.preventDefault();
        var employee_number = $('#employee_no').val();
        var pay_date = $('#paydate').val();
        var basic_rate_hour = $('#basuc_rate_hour').val();
        var basic_num_hours_cutoff= $('#basic_num_hours_cutoff').val();
        var basic_income_cutoff = $('#basic_income_cutoff').val();
        var hono_rate_hour = $('#hono_rate_hour').val();
        var hono_num_hours_cutoff = $('#hono_num_hours_cutoff').val();
        var hono_income_cutoff = $('#hono_incom_cutoff').val();
        var other_rate_hour = $('#other_rate_hour').val();
        var other_num_hours_cutoff = $('#other_num_hours_cutoff').val();
        var other_income_cutoff = $('#other_income_cutoff').val();
        var gross_income = $('#gross_income').val();
        var net_income = $('#net_income').val();
        var sss_contri = $('#sss_contri').val();
        var pagibig_contri = $('#pagibig_contri').val();
        var philH_contri = $('#philH_contri').val();
        var tax_contri = $('#tax_contri').val();
        var sss_loan = $('#sss_loan').val();
        var pagibig_loan = $('#pagibig_loan').val();
        var fs_deposit = $('#fs_deposit').val();
        var fs_loan = $('#fs_loan').val();
        var salary_loan = $('#salary_loan').val();
        var other_loans = $('#other_loans').val();
        var total_deduction = $('#total_deduct').val();

        var data_string = 'employee_no=' + employee_number;
        data_string += '&paydate=' + pay_date;
        data_string += '&basic_rate_hour' + basic_rate_hour;
        data_string += '&basic_num_hours_cutoff' + basic_num_hours_cutoff;
        data_string += '&basic_income_cutoff' + basic_income_cutoff;
        data_string += '&hono_rate_hour' + hono_rate_hour;
        data_string += '&hono_num_hours_cutoff' + hono_num_hours_cutoff;
        data_string += '&hono_income_cutoff' + hono_income_cutoff;
        data_string += '&other_rate_hour' + other_rate_hour;
        data_string += '&other_num_hours_cutoff' + other_num_hours_cutoff;
        data_string += '&other_income_cutoff' + other_income_cutoff;
        data_string += '&gross_income' + gross_income;
        data_string += '&net_income' + net_income;
        data_string += '&sss_contri' + sss_contri;
        data_string += '&pagibig_contri' + pagibig_contri;
        data_string += '&philH_contri' + philH_contri;
        data_string += '&tax_contri' + tax_contri;
        data_string += '&sss_loan' + sss_loan;
        data_string += '&pagibig_loan' + pagibig_loan;
        data_string += '&fs_deposit' + fs_deposit;
        data_string += '&fs_loan' + fs_loan;
        data_string += '&salary_loan' + salary_loan;
        data_string += '&other_loans' + other_loans;
        data_string += '&total_deduct' + total_deduction;
        $.ajax({
            type: 'POST',
            url: 'process/seri_payroll_save.php',
            data: data_string,
            dataType: 'json',
            success: function(result) {
                if(result.ok){
                    alert('Data successfully added!')
                        window.location.href = "http://localhost/tating_web_development/temp/payroll_page.php";
                }
            }
        })
    });
})