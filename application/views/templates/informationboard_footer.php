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
        <span class="svgfooterbg text-t1greenmed">Tim Pengembang SI-TI PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascrip" src="<?php echo base_url() ?>js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>js/pg-calendar/dist/js/pignose.calendar.full.js"></script>
<script type="text/javascript">
    $(function () {
        $('input.calendar').pignoseCalendar({
            format: 'DD-MM-YYYY'
        });
    });
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
        $("div.sidemenu").removeClass("active mouseover");
        $(this).addClass("active");
    });

    $(document).ajaxStart(function () {
        $("#modalBody").append("<div id=\"ajaxEvent\">Loading ...</div>");
    });
    $('#modalView').click(function () {
        var agendaId = $(this).parent().attr('id');
        $("#modalTitle").text("Informasi Agenda Kegiatan");
        $("#modalBody").empty();
        $("#modalFooter").empty();
        /*
        $.ajax({
            url: "<?= site_url('information_board/index/1/1') ?>",
            xhrFields: {
                withCredentials: true
            }
        });
        */
        $("#modalBody").load("<?= site_url('information_board/index/1/') ?>"+ agendaId)
        $('#customizeModal').modal('show')
    });
</script>
</html>