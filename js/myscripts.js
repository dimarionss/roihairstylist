$(function() {
    $("#submit").click(function() {
        // получаем то, что написал пользователь
        var name    = $("#name").val();
        var message = $("#message").val();
        // Формируем строку запроса
        var data            = 'name='+ name +'&amp;message='+ message;

        // ajax вызов
        $.ajax({
            type: "POST",
        url: "shout.php",
        data: data,
        success: function(html){ // после получения результата
            $("#shout").slideToggle(500, function(){
                $(this).html(html).slideToggle(500);
                $("#message").val("");
            });
        }
    });
        return false;
    });
});
function refresh_shoutbox() {
    var data = 'refresh=1';

    $.ajax({
        type: "POST",
        url: "shout.php",
        data: data,
        success: function(html){
            $("#shout").html(html);
        }
    });
}