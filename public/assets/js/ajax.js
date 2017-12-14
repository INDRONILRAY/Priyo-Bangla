/**
 * Created by INDRO on 1/29/2017.
 */
$(document).ready(function () {
    $('#username').blur(function () {
        var username = $(this).val();
        $.ajax({
            url:"ajaxcheck/checkusername.php",
            method:"POST",
            data:{username:username},
            dataType:"text",
                success:function(data){
                $('#userstatus').html(data);
        }
        });
    });
});
