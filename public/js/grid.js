$( document ).ready(function() {
    
    $( "td" ).click(function() {

        var cid = $(this).data('cid');
        var sid = $(this).data('sid');
        var point = $(this).html();

        console.log("student :" + cid + " criteria" + sid + " Note " + point);
        var cidSelector = "#criteria-" +cid ;
        var sidSelector = "#student-" +sid ;

        $('#criteria').html($(cidSelector).html());
        $('#student').html($(sidSelector).html());
        $('#cid').val(cid);
        $('#sid').val(sid);
         $('#pts').attr("placeholder", point);
    });
});
