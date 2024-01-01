$(document).ready(function () {
  $("#save").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-check-input").each(function () {
      if ($(this).is(":checked")) {
        formData["discount_option"] = $(this).val();
      }
    });

    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    const currentURL = window.location.pathname;
    const segments = currentURL
      .split("/")
      .filter((segment) => segment.trim() !== "");
    const lastSegment = segments[segments.length - 1];

    formData['item_type'] = lastSegment.replace('.php', '');; 
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "process/jonas_pos_save.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully added!");
        }
      },
    });
  });
  $("#update").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-check-input").each(function () {
      if ($(this).is(":checked")) {
        formData["discount_option"] = $(this).val();
      }
    });

    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    const currentURL = window.location.pathname;
    const segments = currentURL
      .split("/")
      .filter((segment) => segment.trim() !== "");
    const lastSegment = segments[segments.length - 1];

    formData['item_type'] = lastSegment.replace('.php', '');; 

    $.ajax({
      type: "POST",
      url: "process/jonas_pos_update.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully updated!");
        }
      },
    });
  });
});
