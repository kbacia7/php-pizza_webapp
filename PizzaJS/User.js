function userAjaxAdd(data) //data - {title: "title", price: 3.95, "parent": 1}
{
    $.ajax({
        url: "PizzaCore/AJAX/User/user_create.php",
        type: "POST",
        data: data,
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
            else {
                //error handle?
               //callback(jsonRealData['object']);
            }
        }
    });
}


