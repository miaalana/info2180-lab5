$(document).ready(function() {
    var btn = $('#lookup');
    var btn2 = $('#lookupc');
    var res = $('#result');

    btn.on('click', function() {
        event.preventDefault();
        res.html('');

        let ctry = document.getElementById("country");
        let url = 'http://localhost:8888/info2180-lab5/world.php?country=' + ctry.value;

        $.ajax(url,{
            method: 'GET',
            dataType: "html", 
            success: function (data) {
                res.html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });

        ctry.value = "";
    });

    btn2.on('click', function() {
        event.preventDefault();
        res.html('');

        let ctry = document.getElementById("country");
        let url = 'http://localhost:8888/info2180-lab5/world.php?country=' + ctry.value +"&lookup=cities";

        $.ajax(url,{
            method: 'GET',
            dataType: "html", 
            success: function (data) {
                res.html(data);
            },
            error: function(xhr, status, error) {
                alert('Error:', status, error);
            }
        });

        ctry.value = "";
    });

});