$( document ).ready(function() {

    $( "td" ).click(function() {
        //save all important data
        var cid = $(this).data('cid');
        var sid = $(this).data('sid');
        var mpts = $(this).data('mpts');
        var point = $(this).html();
        //console.log("student :" + cid + " criteria" + sid + " Note " + point);

        var cidSelector = "#criteria-" +cid ;
        var sidSelector = "#student-" +sid ;
        //Show the data and store id in the edit point form
        $('#criteria').html($(cidSelector).html());
        $('#student').html($(sidSelector).html());
        $('#cid').val(cid);
        $('#sid').val(sid);
        $('#mpts').val(mpts);
        $('#pts').attr("placeholder", point);

    });
    //Event fired on the submit of the form
    $("#updateForm").submit(function(e){
        //Test if point entered is bigger than the maximum point or equal to 0
        if($('#pts').val() == 0 || $('#pts').val() > $('#mpts').val())
        {
            //Show the message error
            $('.errorMsg').css("visibility", "visible");
            //scroll to top to see the message
            window.scrollTo(0,0);
            //prevent data to be posted
            return false;
        }
        else{
            //hide message if not hidden
            $('.errorMsg').css("visibility", "hidden");
            //send the data with post
            return true;
        }
    });
});
