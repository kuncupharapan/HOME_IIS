<div class="fixed-bottom">
    <div class="TickerNews default_theme" id="news">
        <div class="ti_wrapper">
            <div class="ti_slide">
                <div class="ti_content">
                    <?php
                    foreach ($newsticker as $key => $news) {
                        $timestamp = date("h:i", strtotime($news['createdtimestamp']));
                        echo '<div class="ti_news"><a href="javascript:void(0);">' . $timestamp . '&nbsp;' . $news['news'] . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-bottom">
    <div class="clearfix">
        <div class="float-left logo"><img src="<?php echo base_url() ?>images/logo_bppt.png" class="" alt=""></div>
        <div class="float-right">
            <div class="clock px-2">
                <div id="Date"></div>
                <ul class="timeblock d-flex flex-row">
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                    <li id="point">:</li>
                    <li id="sec"></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="customizeModal" tabindex="-1" role="dialog" aria-labelledby="customizeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-auto">
                    <div class="bd-notif-icon d-flex justify-content-center align-items-center mr-1 border border-navy p-0 bg-navy rounded" style="min-width: 50px; max-height: 40px"><h5 class="pt-1 text-white text-uppercase" id="projectAbbr"><i class="fas fa-info-circle"></i></h5></div>
                </div>
                <h5 class="pt-2 mt-2" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="bg-eng-primary-1 text-white font-weight-bold text-monospace px-3 py-3 collapse" id="responseMessage">Sedang Memproses, Mohon Tunggu Sesaat ...</div>
            <div class="modal-body" id="modalBody">
            </div>
            <div class="modal-footer" id="modalFooter">
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="d-flex justify-content-center p-2">
        <span class="svgfooterbg text-dark">Proudly Presented by ICT Development Group - PTIPK &copy; 2018-2019</span>
    </div>
</footer>
<input id="lastidle" type="hidden" value="<?php echo date('H:i:s') ?>" />
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascrip" src="<?php echo base_url() ?>js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>js/pg-calendar/dist/js/pignose.calendar.full.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/news-ticker/jquery.tickerNews.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/viewer/EZView.js"></script>
<script type="text/javascript">
    /*
     $(function () {
     $('a.calendar').pignoseCalendar(
     {
     format: 'DD-MM-YYYY',
     select: function (date, context) {
     //alert(date[0], date[1]);
     var agendadate = $("#text-calendar").val();
     $.ajax({
     url: "<?= site_url('information_board/index/0/') ?>" + agendadate,
     xhrFields: {
     withCredentials: true
     }
     }).done(function (data) {
     $('#ajaxcontainer').empty().append(data);
     });
     }
     });
     });
     */
    var $btn = $('.btn-calendar').pignoseCalendar({
        apply: onApplyHandler,
        modal: true, // It means modal will be showed when you click the target button.
        buttons: true
    });
    function onApplyHandler(date, context) {
        /**
         * @date is an array which be included dates(clicked date at first index)
         * @context is an object which stored calendar interal data.
         * @context.calendar is a root element reference.
         * @context.calendar is a calendar element reference.
         * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
         * @context.storage.events is all events associated to this date
         */
        setIdleTime();
        var $element = context.element;
        var $calendar = context.calendar;
        //var $box = $element.siblings('#datedisplay').show();
        var agendaDate = '';

        if (date[0] !== null) {
            agendaDate += date[0].format('DD-MM-YYYY');
        }

        if (date[0] !== null && date[1] !== null) {
            agendaDate += '';
        } else if (date[0] === null && date[1] == null) {
            agendaDate += '';
        }

        if (date[1] !== null) {
            agendaDate += date[1].format('DD-MM-YYYY');
        }
        $.ajax({
            url: "<?= site_url('information_board/index/0/') ?>" + agendaDate,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (data) {
            $('#ajaxcontainer').empty().append(data);
            $('.datenav.active').removeClass('active');
            $('.datepicker').addClass('active');
        });
        //$box.text(text);
    }
    $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu active\" id=\"agenda\><a href=\"#\"><i class=\"far fa-calendar-alt fa-fw\"></i></a></div>");
    $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu \" id=\"agenda\><a href=\"#\"><i class=\"fas fa-bullhorn fa-fw\"></i></a></div>");
    $("#infoboardsidemenu").append("<div class=\"p-2 sidemenu\" id=\"agenda\><a href=\"#\"><i class=\"far fa-newspaper fa-fw\"></i></a></div>");
    $("div.sidemenu").on("mouseover", function () {
        if ($(this).hasClass("active")) {
            $(this).css({"background-color": "#FF8C6E"})
        } else {
            $(this).css({"background-color": "#FF8C6E"})
            if ($(this).hasClass("mouseleave")) {
                $(this).removeClass("mouseleave")
            }
            $(this).addClass("mouseover");
        }
    }).on("mouseleave", function () {
        if ($(this).hasClass("active")) {
            $(this).css({"background-color": "#F34213"})
        } else {
            $(this).css({"background-color": "#F34213"})
            $(this).removeClass("mouseover");
            $(this).addClass("mouseleave");
        }
    }).on("click", function () {
        setIdleTime();
        $("div.sidemenu").removeClass("active mouseover");
        $(this).addClass("active");
    });
    $(document).ajaxStart(function () {
        $("#modalBody").append("<div id=\"ajaxEvent\">Loading ...</div>");
    });
    function agendaonClickHandler(agendaId) {
        setIdleTime();
        $("#modalTitle").text("Informasi Agenda Kegiatan");
        $("#modalBody").empty();
        $("#modalFooter").empty();
        $("#modalBody").load("<?= site_url('information_board/index/1/') ?>" + agendaId);
        $('#customizeModal').modal('show')
    }
    $("#news").newsTicker();

    (function () {
        window.setInterval(function () {
            var idleTime = $('#lastidle').val();
            var hourIdleTime = parseInt(idleTime.substring(0, 2));
            var minuteIdleTime = parseInt(idleTime.substring(3, 5));
            var curDate = new Date();
            var curHour = curDate.getHours();
            var curMinute = curDate.getMinutes();
            var deltaMin = 0;
            if (curHour == hourIdleTime) {
                deltaMin = curMinute - minuteIdleTime;
            } else {
                deltaMin = (curMinute + 60) - minuteIdleTime;
            }
            if (deltaMin > 5) {
                //reload next page on 10 minutes idle time 
                //alert(idleTime + '-' + curHour + ' ' + deltaMin + ' page has been shifted')
                var activeLink = $('.datenav.active');
                if (activeLink.parent().next().hasClass('last') || activeLink.parent().hasClass('last')) {
                    //alert('end');
                    var context = $('ul.nav > li').first();
                    var contId = context.attr('id');
                    var date = contId.substring(0, 2) + '-' + contId.substring(2, 4) + '-' + contId.substring(4, 8);

                    $.ajax({
                        url: "<?= site_url('information_board/index/0/') ?>" + date,
                        xhrFields: {
                            withCredentials: true
                        }
                    }).done(function (data) {
                        $('#ajaxcontainer').empty().append(data);
                        $('.datenav.active').removeClass('active');
                        context.children().addClass('active');
                    });
                } else {
                    var context = activeLink.parent().next();
                    var contId = context.attr('id');
                    var date = contId.substring(0, 2) + '-' + contId.substring(2, 4) + '-' + contId.substring(4, 8);
                    //alert(date);
                    $.ajax({
                        url: "<?= site_url('information_board/index/0/') ?>" + date,
                        xhrFields: {
                            withCredentials: true
                        }
                    }).done(function (data) {
                        $('#ajaxcontainer').empty().append(data);
                        $('.datenav.active').removeClass('active');
                        context.children().addClass('active');
                    });
                }
            }
            if (curMinute == 0 || curMinute == 15 || curMinute == 30 || curMinute == 45) {
                //auto reload page on 00:01 every day
                if (deltaMin > 2) {
                    location.reload(true);
                }
            }
        }, 30000);
    })();
    $('.datenav').on("click", function () {
        setIdleTime();
        var id = $(this).parent().attr('id');
        var context = $(this);
        var date = id.substring(0, 2) + '-' + id.substring(2, 4) + '-' + id.substring(4, 8);
        $.ajax({
            url: "<?= site_url('information_board/index/0/') ?>" + date,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (data) {
            $('#ajaxcontainer').empty().append(data);
            $('.datenav.active').removeClass('active');
            context.addClass('active');
        });
    })
    function setIdleTime() {
        var curTime = new Date();
        $("#lastidle").val(curTime.getHours() + ":" + curTime.getMinutes() + ":" + curTime.getSeconds());
    }
    
    $(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);	
});
</script>
</html>