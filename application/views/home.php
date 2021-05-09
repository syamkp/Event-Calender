<html>
    <head>
        <title>My Evo Calendar</title>
        <link rel="stylesheet" type="text/css" href="assets/css/evo-calendar.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/evo-calendar.midnight-blue.css"/>
        <style type="text/css">
            .highlight {
                border: 2px solid red!important;
            }
        </style>    
    </head>
    <body>

    
        <div id="calendar"></div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/evo-calendar.js"></script>
        <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({

            });

            //selectDate
            $('#calendar').on('selectDate', function(event, newDate, oldDate) {
                var siteurl = '<?php echo base_url(); ?>';
                var active_date = $('#calendar').evoCalendar('getActiveDate');
                var add_event = siteurl+'/event/add?date='+active_date;
                var list_event = siteurl+'/event/list?date='+active_date;

                $.post(list_event, function (data){
                     $('.event-list').html(data);
                     $('.event-list').append('<a href="'+add_event+'" id="popup">Add Event</a>');
                });
                
            });

        })

        $(document).ready(function() {
            $('body').on('click', '#popup', function() {
             var NWin = window.open($(this).prop('href'), '', 'height=800,width=800');
             if (window.focus) 
             {
               NWin.focus();
             }
             return false;
            });
       
        // Highlight events
        var siteurl = '<?php echo base_url(); ?>';
        var all_event = siteurl+'/event/get_all';
        $.post(all_event, function (data){
           var date_array = data.split(',');

           for ( d in date_array) {
                $('.day[data-date-val="'+date_array[d]+'"]').addClass('highlight');
            }
        });

});  
</script>
</body>
</html>