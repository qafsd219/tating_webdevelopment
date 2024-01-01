$(document).ready(function () {
  // SAVE
  $("#save").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });
    console.log(formData);

    $.ajax({
      type: "POST",
      url: "process/emp_data_save.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          var frm = document.getElementById(
            "form_employee_registration_save"
          );
          frm.reset();
          document.getElementById('pic-img').src = "uploads/profile.jpg";
          alert("Data successfully added!");
        }
      },
    });
  });
  // UPDATE
  $("#update").click(function (e) {
    e.preventDefault();
    console.log(123);

    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    $.ajax({
      type: "POST",
      url: "process/emp_data_update.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully updated!");
        }
      },
    });
  });
  // DELETE
  $("#delete").click(function (e) {
    e.preventDefault();
    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    $.ajax({
      type: "POST",
      url: "process/emp_data_delete.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully deleted!");
          window.location.href = "employee_report.php";
        }
      },
    });
  });
  // FILE UPLOAD 
  $("#uploadfile").change(function (e) {
    var formData = new FormData($("#pic-upload")[0]);

    $.ajax({
      type: "POST",
      url: "process/upload_pic.php",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          document.getElementById('pic-img').src = result.temp_path
          $("#picpath").val(result.temp_path);
        } else {
          alert("Error occured");
        }
      },
    });
  });
  // CANCEL
  $("#cancelbtn").click(function (e) {
    e.preventDefault();
    window.location.href = "admin.php";
  });
});
