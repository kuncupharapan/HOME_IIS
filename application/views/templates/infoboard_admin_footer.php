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
            <div class="bg-eng-primary-1 text-white font-weight-bold text-monospace px-3 py-3 collapse" id="responseMessage" style="display: none">Sedang Memproses, Mohon Tunggu Sesaat ...</div>
            <div class="modal-body" id="modalBody">
            </div>
            <div id="ajaxEvent" style="display: none">Loading ...</div>
            <div class="modal-footer" id="modalFooter">
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="d-flex justify-content-center p-2">
        <span class="svgfooterbg text-dark">Developed by ICT Division - PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascrip" src="<?php echo base_url() ?>js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>js/pg-calendar/dist/js/pignose.calendar.full.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/tagsinput/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.form.min.js"></script>
<script type="text/javascript">
<?php
echo "var agendaCategories='";
foreach ($categories as $k => $v) {
    echo "<option value=\"" . $v['id'] . "\">" . $v['title'] . "</option>";
}
echo "';";
?>
    $(function () {
        $('input.calendar').pignoseCalendar(
                {
                    format: 'DD-MM-YYYY',
                    select: function (date, context) {
                        //alert(date[0], date[1]);
                        var agendadate = $("#text-calendar").val();
                        $("#ajaxcontainer").load("<?= site_url('infoboard_admin/index/0/') ?>" + agendadate);
                    }
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
        $("#ajaxEvent").show();
    });
    $(document).ajaxStop(function () {
        $("#ajaxEvent").hide();
    });
    function agendaonClickHandler(row) {
        $("#responseMessage").empty().hide();
        var agendaId = $('#view' + row).parent().attr('id');
        $("#modalTitle").text("Informasi Agenda Kegiatan");
        $("#modalBody").empty();
        $("#modalFooter").empty();
        $("#modalBody").load("<?= site_url('information_board/index/1/') ?>" + agendaId);
        $('#customizeModal').modal('show')
    }
    function addAgendaClickHandler() {
        $("#responseMessage").empty().hide();
        $("#modalTitle").text("Form Penambahan Agenda Kegiatan");
        $("#modalBody").empty();
        $("#modalFooter").empty();
        $('#modalBody').append('<form id="addAgendaForm"><div class="form-group"><label for="agendaTitle">Judul Agenda</label><input type="text" name="agendaTitle" class="form-control" id="agendaTitle" placeholder="judul agenda"></div><div class="form-group"><label for="dateStart">Tanggal Mulai</label><div class="input-group date" ><input type="text" name="dateStart" id="datetimepicker1" class="form-control" /><div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="form-group"><label for="dateStart">Waktu Mulai</label><div class="input-group date" ><input type="text" id="datetimepicker2" name="timeStart" class="form-control" /><div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><label for="dateStart">Tanggal Selesai</label><div class="input-group date" ><input type="text" id="datetimepicker3" name="dateEnd" class="form-control" /><div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><label for="datepicker4">Waktu Selesai</label><div class="input-group date" ><input type="text" id="datetimepicker4" name="timeEnd" class="form-control" /><div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="form-group"><label for="agendaCategory">Kategori Agenda</label><select class="form-control" id="agendaCategory" name="agendaCategory">' + agendaCategories + '</select></div><div class="form-group"><label for="agendaPriority">Prioritas Agenda</label><select class="form-control" id="agendaPriority" name="agendaPriority"><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div class="form-group"><label for="location">Lokasi Kegiatan</label><input type="text" class="form-control" id="location" name="location" placeholder="lokasi kegiatan"></div><div class="form-group"><label for="projectType">Keterangan Agenda</label><textarea class="form-control" id="agendaDesc" name="agendaDesc" rows="3" placeholder="Jelaskan dengan rinci agenda kegiatan yang akan dilaksanakan"></textarea></div><input type="hidden" name="addAgenda" id="addAgenda" value="1"></form>');
        $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="buttonSubmit" class = "btn btn-primary" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
        $('#responseMessage').empty().text('Sedang Memproses, Mohon Tunggu Sesaat ...').hide();
        $("#customizeModal").modal('show');
        $('#datetimepicker1').datetimepicker({format: "DD-MM-YYYY"});
        $('#datetimepicker2').datetimepicker({format: "LT"});
        $('#datetimepicker3').datetimepicker({format: "DD-MM-YYYY"});
        $('#datetimepicker4').datetimepicker({format: "LT"});
        $("#buttonSubmit").click(function () {
            //var postData = $("#editProjectForm").serialize();
            //$("#projectSponsorInfo").text(postData);
            $('#customizeModal').animate({scrollTop: 0}, 100);
            $('#responseMessage').show('slow');
            var posting = $.post("<?= site_url('infoboard_admin/index/3') ?>", $("#addAgendaForm").serialize());
            posting.done(function (data) {
                var dateStart = $('#datetimepicker1').val();
                $("#ajaxcontainer").load("<?= site_url('infoboard_admin/index/0/') ?>" + dateStart);
                $("#responseMessage").empty().text(data.responsemessage);
            });
        });
    }
    function formatDate(date, timedate) {
        var date = new Date(date);
        var result = "";
        if (timedate == 1) {
            result = date.toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
        } else {
            result = date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate();
        }
        return result;
    }
    function editAgendaClickHandler(row) {
        $("#responseMessage").empty().hide();
        var agendaId = $('#edit' + row).parent().attr('id');
        $.getJSON("<?= site_url('infoboard_admin/index/8/') ?>" + agendaId, function () {
        }).done(function (data) {
            var startdate = data.agenda.startdate.substring(8, 10) + '-' + data.agenda.startdate.substring(5, 7) + '-' + data.agenda.startdate.substring(0, 4);
            var starttime = formatDate(data.agenda.startdate + ' ' + data.agenda.starttime, 1);
            var enddate = data.agenda.enddate.substring(8, 10) + '-' + data.agenda.enddate.substring(5, 7) + '-' + data.agenda.enddate.substring(0, 4);
            var endtime = formatDate(data.agenda.enddate + ' ' + data.agenda.endtime, 1);

            $("#modalTitle").text("Form Pembaruan Agenda Kegiatan");
            $("#modalBody").empty();
            $("#modalFooter").empty();
            $('#modalBody').append('<form id="editAgendaForm"><div class="form-group"><label for="agendaTitle">Judul Agenda</label><input type="text" name="agendaTitle" class="form-control" id="agendaTitle" placeholder="judul agenda" value="' + data.agenda.title + '"></div><div class="form-group"><label for="dateStart">Tanggal Mulai</label><div class="input-group date" ><input type="text" name="dateStart" id="datetimepicker1" class="form-control" value="' + startdate + '"/><div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="form-group"><label for="dateStart">Waktu Mulai</label><div class="input-group date" ><input type="text" id="datetimepicker2" name="timeStart" class="form-control" value="' + starttime + '"/><div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><label for="dateStart">Tanggal Selesai</label><div class="input-group date" ><input type="text" id="datetimepicker3" name="dateEnd" class="form-control" value="' + enddate + '"/><div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><label for="datepicker4">Waktu Selesai</label><div class="input-group date" ><input type="text" id="datetimepicker4" name="timeEnd" class="form-control" value="' + endtime + '"/><div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="form-group"><label for="agendaCategory">Kategori Agenda</label><select class="form-control" id="agendaCategory" name="agendaCategory">' + agendaCategories + '</select></div><div class="form-group"><label for="agendaPriority">Prioritas Agenda</label><select class="form-control" id="agendaPriority" name="agendaPriority"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div class="form-group"><label for="location">Lokasi Kegiatan</label><input type="text" class="form-control" id="location" name="location" placeholder="lokasi kegiatan" value="' + data.agenda.location + '"></div><div class="form-group"><label for="projectType">Keterangan Agenda</label><textarea class="form-control" id="agendaDesc" name="agendaDesc" rows="3" placeholder="Jelaskan dengan rinci agenda kegiatan yang akan dilaksanakan">' + data.agenda.agendadesc + '</textarea></div><input type="hidden" name="updateAgenda" id="updateAgenda" value="1"></form>');
            $('#agendaCategory').val(data.agenda.categoryid);
            $('#agendaPriority').val(data.agenda.agendapriority);
            $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="buttonSubmit" class = "btn btn-primary" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
            $('#responseMessage').empty().hide();
            $("#customizeModal").modal('show');
            $('#datetimepicker1').datetimepicker({format: "DD-MM-YYYY"});
            $('#datetimepicker2').datetimepicker({format: "LT"});
            $('#datetimepicker3').datetimepicker({format: "DD-MM-YYYY"});
            $('#datetimepicker4').datetimepicker({format: "LT"});
            $("#buttonSubmit").click(function () {
                //var postData = $("#editProjectForm").serialize();
                //$("#projectSponsorInfo").text(postData);
                $('#customizeModal').animate({scrollTop: 0}, 100);
                $('#responseMessage').show('slow');
                var posting = $.post("<?= site_url('infoboard_admin/index/8/') ?>" + agendaId, $("#editAgendaForm").serialize());
                posting.done(function (data) {
                    var dateStart = $('#datetimepicker1').val();
                    $("#ajaxcontainer").load("<?= site_url('infoboard_admin/index/0/') ?>" + dateStart);
                    $("#responseMessage").empty().text(data.responsemessage);
                });
                posting.fail(function (jqXHR, textStatus) {
                    console.log(textStatus);
                });
            });
        })

    }
    function addPIC(id) {
        $("#responseMessage").empty().hide();
        $("#modalTitle").text("Form Penambahan PIC Kegiatan");
        $("#modalBody").empty();
        $("#modalFooter").empty();
        var agendaId = $('#' + id).parent().attr('id');
        var agendaTitle = $("td#title" + agendaId).text();
        $('#modalBody').empty().append('<div class="row"><div class="col">Judul Agenda</div><div class="col">: ' + agendaTitle + '</div><div class="w-100"></div><div class="col">Personel</div><div class="col">: &nbsp;</div></div>');
        $.getJSON("<?= site_url('infoboard_admin/index/4/') ?>" + agendaId, function (data) {
            var items = [];
            $('#modalBody').append('<input type="text" id="taglist" data-role="tagsinput" />');
            $('#modalFooter').empty().append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Tutup</button>');
            $("#customizeModal").modal('show');
            var employees = data.employees;
            var empl = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: employees
            });
            empl.initialize();

            var elt = $('#taglist');
            elt.tagsinput({
                itemValue: 'id',
                itemText: 'name',
                typeaheadjs: {
                    name: 'empl',
                    displayKey: 'name',
                    source: empl.ttAdapter(),
                    freeInput: false
                }
            });
            $.each(data.pic, function (key, val) {
                elt.tagsinput('add', {"id": val.id, "name": val.name});
            });
            $('#taglist').on('beforeItemAdd', function (event) {
                var tag = event.item;
                $('#responseMessage').hide();
                $('#responseMessage').show();
                if (!event.options || !event.options.preventPost) {
                    $.ajax({
                        method: "POST",
                        url: "<?= site_url('infoboard_admin/index/5/') ?>",
                        data: {agenda: agendaId, pic: tag.id, addPIC: 1}
                    })
                            .done(function (msg) {
                                $('#responseMessage').text(msg.responsemessage);
                                if (msg.responsecode != 1) {
                                    elt.tagsinput('remove', tag, {preventPost: true});
                                }
                            })
                            .fail(function (jqXHR, textStatus) {
                                console.log(textStatus);
                            });
                }

            });
            $('#taglist').on('beforeItemRemove', function (event) {
                var tag = event.item;
                $('#responseMessage').hide();
                $('#responseMessage').show();
                if (!event.options || !event.options.preventPost) {
                    $.ajax({
                        method: "POST",
                        url: "<?= site_url('infoboard_admin/index/6/') ?>",
                        data: {agenda: agendaId, pic: tag.id, removePIC: 1}
                    })
                            .done(function (msg) {
                                $('#responseMessage').text(msg.responsemessage);
                                if (msg.responsecode != 1) {
                                    elt.tagsinput('add', tag, {preventPost: true});
                                }
                            })
                            .fail(function (jqXHR, textStatus) {
                                console.log(textStatus);
                            });
                }
            });
        });
    }
    function addNotes(row) {
        $("#responseMessage").empty().hide();
        $("#modalTitle").text("Menambah Catatan Untuk PIC");
        var agendaId = $('#notes' + row).parent().attr('id');
        $.getJSON("<?= site_url('infoboard_admin/index/9/') ?>" + agendaId, function () {
        }).done(function (data) {
            var formAtr = '';
            var i = 0;
            $.each(data.pic, function (key, val) {
                var notes = val.notes == null ? '' : val.notes;
                formAtr += '<div class="form-group" style="display:none"><label for="picid' + key + '"></label><input type="text" name="picid' + key + '" class="form-control" id="picid' + key + '" value="' + val.picid + '"></div><div class="form-group"><label for="notes' + key + '">' + val.name + '</label><textarea class="form-control" id="notes' + key + '" name="notes' + key + '" rows="3" placeholder="Catatan atau peran untuk ' + val.name + '">' + notes + '</textarea></div>';
                i++;
            });
            if (i > 0) {
                $('#modalBody').empty().append('<form id="addPersonNotes">' + formAtr + '<input type="hidden" name="total" id="total" value="' + i + '"><input type="hidden" name="addNotes" id="addNotes" value="1"></form>');
                $('#modalFooter').empty().append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="buttonSubmit" class = "btn btn-primary" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
            } else {
                $('#modalBody').empty().append('Belum ada personil yang ditunjuk untuk agenda ini');
            }

            $("#buttonSubmit").click(function () {
                $('#customizeModal').animate({scrollTop: 0}, 100);
                $('#responseMessage').show('slow');
                var posting = $.post("<?= site_url('infoboard_admin/index/9/') ?>" + agendaId, $("#addPersonNotes").serialize());
                posting.done(function (data) {
                    console.log(data);
                    $("#responseMessage").empty().text(data.responsemessage);
                });
            });
        });
        $("#customizeModal").modal('show');
    }
    function rma(row) {
        $("#responseMessage").empty().hide();
        $("#modalTitle").text("Perhatian: Anda akan menghapus data agenda");
        $('#modalBody').empty().append('<span class="d-flex justify-content-center">Apakah anda yakin akan menghapus kegiatan ini?</span>');
        $('#modalFooter').empty().append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button><button type="button" class="btn btn-primary confirmation">Hapus</button>');
        $("#customizeModal").modal('show');
        $(".confirmation").click(function () {
            var agendaId = $('#rm' + row).parent().attr('id');
            $.getJSON("<?= site_url('infoboard_admin/index/7/') ?>" + agendaId, function () {
            }).done(function (data) {
                $('#responseMessage').text(data.responsemessage);
                $('#responseMessage').show();
                $('#modalBody').empty();
                $('#modalFooter').empty().append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>');
                if (data.responsecode == '1') {
                    $('#row' + row).remove();
                }
            })
        })
    }
    function upload(row) {
        var agendaId = $('#upload' + row).parent().attr('id');
        $('#responseMessage').empty().hide();
        $('#modalTitle').text('Unggah Berkas');
        $('#modalBody').empty().append('<form id="uploadForm" name="uploadFile" method="post" enctype="multipart/form-data"><input type="file" id="uploadImage" name="uploadImage" /></form><div id="progress" style="padding: 0"><div id="bar"></div><div id="percent"></div></div>');
        $('#modalFooter').empty().append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>');
        $("#customizeModal").modal('show');
        $("input[type='file']").change(function () {
            // Check input( $( this ).val() ) for validity here
            
            $('#uploadForm').ajaxSubmit({
                //target: "#responseMessage",
                url: "<?= site_url('infoboard_admin/index/10/') ?>" + agendaId + "/2",
                beforeSubmit: function () {
                    /*
                    $("#outputImage").hide();
                    if ($("#uploadImage").val() == "") {
                        $("#outputImage").show();
                        $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
                        return false;
                    }
                    */
                    //$("#progress").css("display", "block");
                    var percentValue = '0%';

                    $('#bar').width(percentValue);
                    //$('#bar').html(percentValue);
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    var percentValue = percentComplete + '%';
                    $("#bar").animate({
                        width: '' + percentValue + ''
                    }, {
                        duration: 5000,
                        easing: "linear",
                        step: function (x) {
                            percentText = Math.round(x * 100 / percentComplete);
                            $("#bar").text(percentText + "%");
                            if (percentText == "100") {
                                //$("#responseMessage").text("Berkas telah terunggah dengan sukses").show();
                            }
                        }
                    });
                },
                error: function (response, status, e) {
                    $("#responseMessage").text("Oops Terjadi kesalahan pada saat mengunggah berkas").show();
                },

                complete: function (xhr) {
                    if (xhr.responseText && xhr.responseText != "error")
                    {
                        $("#responseMessage").text(xhr.responseText).show();
                    } else {
                        $("#responseMessage").text("Oops Terjadi kesalahan pada saat mengunggah berkas").show();
                        //$("#outputImage").show();
                        //$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
                        //$("#progressBar").stop();
                    }
                }
                
            });
            
        });
    }
</script>
</html>