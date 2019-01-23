$( document ).ready(function() {
    $( "td" ).click(function() {

        var cid = $(this).data('cid');
        var sid = $(this).data('sid');
        var point = $(this).html();

        console.log(cid + " " + sid + " Note " + point);
        var sidSelector = "#criteria-" +sid ;
        var cidSelector = "#student-" +cid ;
        $('#cid').val(cid);
        $('#sid').val(sid);
        $('#criteria').html($(sidSelector).html());
        $('#student').html($(cidSelector).html());
         $('#pts').attr("placeholder", point);
    });
});
