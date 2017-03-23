$('button#search_btn').on('click', function(){
    var search = $('input#search_input').val();
    if($.trim(search) !== "") {
        $.post('/products/search', {name: search}, function(responseData){
            var data = JSON.parse(responseData);
            var htmlStr = "\
            <div class='panel panel-warning'>\
                <div class='panel-heading'>\
                    <h3 class='panel-title'>Search result</h3>\
                </div>\
                <div class='panel-body'>\
                    <div class='col-sm-4 col-md-4'>\
                        <div class='thumbnail'>\
                            <img src=" + data.photo + " class='img-circle'>\
                            <div class='caption'>\
                                <h3>" + data.name_en + "</h3>\
                                <p><center><a href='#' class='btn btn-primary'\
                                 role='button'>View Category Products</a></center></p>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>"
                
            $('div#search_result').html(htmlStr);
//            location.href = "#search_result";
//            console.log(JSON.parse(data));
            
        });
    }
});

function getRate(id) {
    var radios = document.getElementsByClassName('radio');
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var myRate = radios[i].value;
            $.post('/products/calc-rate', {rate: myRate}, function (data) {
                var input = document.getElementById('star' + data);
                input.checked = "checked";
                console.log(data);

            });

            break
        }
    }
}

$('input[type="submit"]').mousedown(function () {
    $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function () {
    $(this).css('background', '#1abc9c');
});

$('#loginform').click(function () {
    $('.login').fadeToggle('slow');
    $(this).toggleClass('green');
});



$(document).mouseup(function (e)
{
    var container = $(".login");

    if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
    }
});


$('.carousel').carousel({
    interval: 5000
});
