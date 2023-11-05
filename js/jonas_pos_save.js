$(document).ready(function () {
    $("#save").click(function (e) {
      e.preventDefault();
  
      var formData = {};
      $(".form-check-input").each(function(){
        if($(this).is(":checked")){
          formData['discount_option'] =  $(this).val();
        }
      })
      $(".form-control").each(function () {
        var fieldName = $(this).attr("id");
        var fieldValue = $(this).val();
        formData[fieldName] = fieldValue;
      });

      console.log(formData)
      
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
  });
  
  
    
  