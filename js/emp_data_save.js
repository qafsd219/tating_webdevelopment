$(document).ready(function () {
    $("#save").click(function (e) {
      e.preventDefault();
  
      var formData = {};
      $(".form-control").each(function () {
        var fieldName = $(this).attr("id");
        var fieldValue = $(this).val();
        formData[fieldName] = fieldValue;
      });
      console.log(formData)
  
      $.ajax({
        type: "POST",
        url: "process/emp_data_save.php",
        data: formData,
        dataType: "json",
        success: function (result) {
          if (result.ok) {
            alert("Data successfully added!");
          }
        },
      });
    });
    $("#uploadfile").change(function(e){
        var formData = new FormData($("#pic-upload")[0])
        $.ajax({
            type:"POST",
            url:'process/upload_pic.php',
            data :formData,
            contentType:false,
            processData:false,
            dataType:'json',
            success: function(result){
                if(result.ok){
                    $('#pic-box').html('')
                    $('#pic-box').append("<img src='" + result.temp_path + "' style='width:100%;height:100%'/>")
                    $('#picpath').val(result.temp_path)
                }else{
                    alert('Error occured')
                }
            }
        })
    })
  });
  
  
    
  