function XmlHttp()
{
    var xmlhttp;
    try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
    catch(e)
    {
        try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");} 
        catch (E) {xmlhttp = false;}
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined')
    {
        xmlhttp = new XMLHttpRequest();
    }
      return xmlhttp;
}

function ajax(param)
{
                if (window.XMLHttpRequest) req = new XmlHttp();
                method=(!param.method ? "POST" : param.method.toUpperCase());

                if(method=="GET")
                {
                               send=null;
                               param.url=param.url+"&ajax=true";
                }
                else
                {
                               send="";
                               for (var i in param.data) send+= i+"="+param.data[i]+"&";
                               // send=send+"ajax=true"; // если хотите передать сообщение об успехе
                }
                req.open(method, param.url, true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.send(send);
                req.onreadystatechange = function(){
                    if (req.readyState == 4 && req.status == 200){ //если ответ положительный
                       if(param.success)param.success(req.responseText);
                    }
                }
}

$(document).ready(function(){
    $(document).on('click', '#start-test', function(){
        ajax({
            url: "/server/get_tags.php",
            method: "post",
            //datatype: "json",
            data:{},
            success:function(resp){
                $('#predv_res').html(resp);
            }
        });
    });
});


