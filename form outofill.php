$(document).ready(function () {
 
    $("#btnSubmit").click(function (event) {
 
        //stop submit the form, we will post it manually.
        event.preventDefault();
 
        // Get form
        var form = $('#fileUploadForm')[0];
 
       // Create an FormData object 
        var data = new FormData(form);
 
       // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");
 
       // disabled the submit button
        $("#btnSubmit").prop("disabled", true);
 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/upload.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function (data) {
 
                $("#output").text(data);
                console.log("SUCCESS : ", data);
                $("#btnSubmit").prop("disabled", false);
 
            },
            error: function (e) {
 
                $("#output").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);
 
            }
        });
 
    });
 
});