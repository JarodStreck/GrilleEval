$( document ).ready(function() {

    $( "td" ).click(function() {

        var cid = $(this).data('cid');
        var sid = $(this).data('sid');
        var mpts = $(this).data('mpts');
        var point = $(this).html();
        console.log("student :" + cid + " criteria" + sid + " Note " + point);

        var cidSelector = "#criteria-" +cid ;
        var sidSelector = "#student-" +sid ;

        $('#criteria').html($(cidSelector).html());
        $('#student').html($(sidSelector).html());
        $('#cid').val(cid);
        $('#sid').val(sid);
        $('#mpts').val(mpts);
        $('#pts').attr("placeholder", point);

    });
    $("#updateForm").submit(function(e){

        if($('#pts').val() == 0 || $('#pts').val() > $('#mpts').val())
        {
            $('.errorMsg').css("visibility", "visible");
            window.scrollTo(0,0);
            return false;
        }
        else{
            $('.errorMsg').css("visibility", "hidden");
            return true;
        }
    });
});
