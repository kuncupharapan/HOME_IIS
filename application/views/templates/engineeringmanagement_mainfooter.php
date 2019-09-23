<?php
if (isset($modal)) {
    ?>
    <!-- Modal Start -->
    <div class="modal fade" id="customizeModal" tabindex="-1" role="dialog" aria-labelledby="customizeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-auto">
                        <div class="bd-notif-icon d-flex justify-content-center align-items-center mr-1 border border-navy p-0 bg-navy rounded" style="min-width: 50px; max-height: 40px"><h5 class="pt-1 text-white text-uppercase" id="projectAbbr"></h5></div>
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
    <!-- Modal End -->
    <?php
}
?>
<footer class="footer">
    <div class="d-flex justify-content-center p-2">
        <span class="svgfooterbg text-t1greenmed">Tim Pengembang SI-TI PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<?php
if (isset($treantmaster)) {
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "js/raphael.js\"></script>";
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "js/Treant.js\"></script>";
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "js/basic-example.js\"></script>";
}
if (isset($wordeditor)) {
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "quill/highlight.min.js\"></script>";
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "quill/quill.js\"></script>";
}
if (isset($datepicker)) {
    //echo "<script type=\"text/javascript\" src=\"" . base_url() . "js/zebra_datepicker.min.js\"></script>";
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "bootstrap/js/moment.js\"></script>";
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "bootstrap/js/bootstrap-datetimepicker.js\"></script>";
}
if (isset($autocomplete)) {
    echo "<script type=\"text/javascript\" src=\"" . base_url() . "js/jquery-ui/jquery-ui.min.js\"></script>";
}
?>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(document).ajaxStart(function () {
        $("#modalBody").append("<div id=\"ajaxEvent\">Loading ...</div>");
    });
<?php
if ($mediaboxhover == 1) {
    echo "$(\".medboxmover\").on(\"mouseover\", function () {
        $(this).css({
            \"background-color\": \"#E7E4EC\"
        });
    }).on(\"mouseleave\", function () {
        var styles = {
            backgroundColor: \"#FFFFFF\"
        };
        $(this).css(styles);
    });";
    echo "$(\".medboxmoverwithaction\").on(\"mouseover\", function () {
        $(this).css({
            \"background-color\": \"#E7E4EC\"
        });
        $(this).find(\".medboxactionbar\").css({
            \"display\": \"block\",
            \"height\": \"150px\"
        });
    }).on(\"mouseleave\", function () {
        var styles = {
            backgroundColor: \"#FFFFFF\"
        };
        $(this).css(styles);
        $(this).find(\".medboxactionbar\").hide();
    });";
}
if (isset($leftmenu)) {
    echo "$(\"#engleftmenu\").append(\"<div id=\\\"leftmenuheader\\\" class=\\\"d-flex flex-column pb-2 border-bottom border-t1bluedark\\\"></div>\");"
    . "$(\"#leftmenuheader\").append(\"<div class=\\\"d-flex p-0 m-0 justify-content-center align-items-start\\\"><img class=\\\"rounded-circle mt-3 bd-lnav-photo\\\" src=\\\"" . base_url() . "images/pasphoto_square.jpg\\\"></div>\");"
    . "$(\"#leftmenuheader\").append(\"<div class=\\\"d-flex pt-1 m-0 justify-content-center align-items-start\\\"><strong class=\\\"text-eng-primary-5\\\">@joni.doe</strong>&nbsp;<button type=\\\"button\\\" class=\\\"btn btn-link bd-link-profile p-0 m-0\\\"><i class=\\\"fas fa-edit text-white\\\" style=\\\"font-size: 9pt\\\"></i></button></div>\");"
    . "$(\"#engleftmenu\").append(\"<nav id=\\\"leftmenunav\\\" class=\\\"collapse bd-links\\\" id=\\\"bd-docs-nav\\\"></nav>\");"
    . "$(\"#leftmenunav\").append(\"<div class=\\\"bd-toc-item\\\"><a id=\\\"home\\\" class=\\\"bd-toc-link\\\" href=\\\"" . site_url() . "/engineeringmanagement_home\\\">Engineering Home</a></div>\");"
    . "$(\"#leftmenunav\").append(\"<div class=\\\"bd-toc-item\\\"><a id=\\\"project\\\" class=\\\"bd-toc-link\\\" href=\\\"" . site_url() . "/engineeringmanagement_projects_browse\\\">Projects</a></div>\");"
    . "$(\"#leftmenunav\").append(\"<div class=\\\"bd-toc-item\\\"><a id=\\\"performance\\\" class=\\\"bd-toc-link\\\" href=\\\"" . site_url() . "/engineeringmanagement_home\\\">My Performance</a></div>\");"
    . "$(\"#leftmenunav\").append(\"<div class=\\\"bd-toc-item\\\"><a id=\\\"dashboard\\\" class=\\\"bd-toc-link\\\" href=\\\"" . site_url() . "/engineeringmanagement_home\\\">Dashboard</a></div>\");"
    . "$(\"#leftmenunav\").append(\"<div class=\\\"bd-toc-item\\\"><a id=\\\"setting\\\"  class=\\\"bd-toc-link\\\" href=\\\"" . site_url() . "/engineeringmanagement_project_setting\\\">Setting</a></div>\");";

    echo "$(\"#" . $leftmenu . "\").addClass(\"active\");";
}
if (isset($projectheader)) {
    echo "$(\"#projecttab\").append(\"<ul id=\\\"tabcontainer\\\" class=\\\"nav d-flex justify-content-between\\\"></ul>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"summary\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Summary</a></li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"> <a id=\\\"conversation\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Conversation</a></li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"files\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Files</a></li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"schedule\\\" class=\\\"nav-link p-2 text-eng-complement-4 dropdown-toggle\\\" href=\\\"#\\\" role=\\\"button\\\" data-toggle=\\\"dropdown\\\" aria-haspopup=\\\"true\\\" aria-expanded=\\\"false\\\">Schedule</a>"
    . "<div class=\\\"dropdown-menu bg-eng-secondary-1-2\\\">"
    . "<a class=\\\"dropdown-item\\\" href=\\\"#\\\">Schedule Chart</a>"
    . "<a class=\\\"dropdown-item\\\" href=\\\"#\\\">Activities</a>"
    . "<a class=\\\"dropdown-item\\\" href=\\\"" . site_url() . "/engineeringmanagement_project_assignment/add/1001\\\">Assignment</a>"
    . "</div>"
    . "</li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"organisation\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Organization</a></li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"photos\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Photos</a></li>\");"
    . "$(\"#tabcontainer\").append(\"<li class=\\\"nav-item\\\"><a id=\\\"logbook\\\" class=\\\"nav-link p-2 text-eng-complement-4\\\" href=\\\"#\\\">Logbook</a></li>\");";

    echo "$(\"#" . $projectheader . "\").addClass(\"active\");";
}
if (isset($treantmaster)) {
    echo "new Treant(chart_config);";
}
if (isset($wordeditor)) {
    echo "var quill = new Quill('#editor-container', {"
    . "modules: {"
    . "syntax: true,"
    . "toolbar: '#toolbar-container'"
    . "},"
    . "placeholder: 'Type your instruction here...',"
    . "theme: 'snow'"
    . "});";
}
if (isset($datepicker)) {
    //echo "$('#datepicker1').Zebra_DatePicker();";
    //echo "$(function () {"
    // . "$('#datetimepicker1').datetimepicker();"
    // . "});";
    echo "$(function () {"
    . "$('#datetimepicker1').datetimepicker();"
    . "});";
}
if (isset($autocomplete)) {
    ?>
        $(function () {
            $.widget("custom.catcomplete", $.ui.autocomplete, {
                _create: function () {
                    this._super();
                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                },
                _renderMenu: function (ul, items) {
                    var that = this,
                            currentCategory = "";
                    $.each(items, function (index, item) {
                        var li;
                        if (item.category != currentCategory) {
                            ul.append("<li class='ui-autocomplete-category px-2 font-weight-bold' style='font-size:10pt'>" + item.category + "</li>");
                            currentCategory = item.category;
                        }
                        li = that._renderItemData(ul, item);
                        if (item.category) {
                            li.attr("aria-label", item.category + " : " + item.label);
                            li.attr("style", "font-size:10pt");
                        }
                    });
                }
            });
            var data = [
                {label: "Rancang Bangun Drone & Rudal", category: "2017"},
                {label: "Kapal Selam Mini", category: "2017"},
                {label: "Kapal Selam Mini", category: "2016"},
                {label: "Medium Drone", category: "2016"},
                {label: "Kendaraan Tempur", category: "2016"}
            ];
            $("#search").catcomplete({
                delay: 0,
                source: data
            });
        });
    <?php
}
if (isset($popover)) {
    ?>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    <?php
}
if (isset($subprojectform)) {

    echo "var productOption='";
    foreach ($productoption as $k => $v) {
        echo "<option value=\"" . $k . "\">" . $v . "</option>";
    }
    echo "';";
    echo "var projectSponsor='";
    foreach ($projectsponsor as $k => $v) {
        echo "<option value=\"" . $k . "\">" . $v . "</option>";
    }
    echo "';";
    ?>
        $("#modalAddProject").click(function () {
            $("#projectAbbr").text("<?= $project["abbr"] ?>");
            $("#modalTitle").text("Menambah Kegiatan Pada Program");
            $("#modalBody").empty();
            $("#modalFooter").empty();
            $('#modalBody').append('<form id="addProjectForm"><div class="form-group"><label for="subProjectName">Nama Kegiatan</label><input type="text" name="subproject" class="form-control" id="subProjectName" placeholder="Nama Kegiatan"></div><div class="form-group"><label for="projectProduct">Produk/Layanan</label><select class="form-control" id="projectProduct" name="projectproduct">' + productOption + '</select></div><div class="form-group"><label for="projectType">Deskripsi Kegiatan</label><textarea class="form-control" id="projectType" name="projecttype" rows="3" placeholder="Jelaskan lebih rinci kegiatan yang dilakukan"></textarea></div><div class="form-group"><label for="projectSponsor">Sponsor/Pengguna Produk/Layanan</label><select class="form-control" id="projectProduct" name="projectSponsor">' + projectSponsor + '</select></div><div class="form-group"><label for="projectSponsorInfo">Informasi Tambahan Sponsor/Pengguna</label><textarea class="form-control" id="productDescription" name="projectSponsorInfo" rows="3" placeholder="Tambahkan informasi tentang sponsor/pengguna yang lebih rinci"></textarea></div></form>');
            $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" class = "btn btn-primary"> Simpan </button>');
            $("#customizeModal").modal('show')
        });
        $('#modalView').click(function () {
            var subProjId = $(this).parent().parent().attr('id');
            $("#modalTitle").text("Informasi Kegiatan");
            $("#modalBody").empty();
            $("#modalFooter").empty();
            $("#modalBody").load("<?= site_url('engineeringmanagement_project_setting/project/1/3/2/1') ?>" + subProjId)
            $('#customizeModal').modal('show')
        });
        $('#modalDelete').click(function () {
            $('#modalTitle').text('Kegiatan: ');
            $("#modalBody").empty();
            $("#modalFooter").empty();
            $('#modalBody').append('<span class="d-flex justify-content-center">Apakah anda yakin akan menghapus kegiatan ini?</span>');
            $('#modalFooter').append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button><button type="button" class="btn btn-primary">Hapus</button>');
            $('#customizeModal').modal('show');
        });
        $(".modalEdit").click(function () {
            var subProjId = $(this).parent().parent().attr('id');
            $.getJSON("<?= site_url('engineeringmanagement_project_setting/project/1/3/3/1/') ?>" + subProjId).done(function (data) {
                var obj = data;
                $("#projectAbbr").text(obj.projectabbr);
                $("#modalTitle").text('Edit Kegiatan');
                $("#modalBody").empty();
                $("#modalFooter").empty();
                $('#modalBody').append('<form id="editProjectForm"><div class="form-group"><label for="subProjectName">Nama Kegiatan</label><input type="text" name="subprojectname" class="form-control" id="subProjectName" value="' + obj.projectname + '"></div><div class="form-group"><label for="projectProduct">Produk/Layanan</label><select class="form-control" id="projectProduct" name="projectproduct">' + productOption + '</select></div><div class="form-group"><label for="projectType">Deskripsi Kegiatan</label><textarea class="form-control" id="projectType" name="projecttype" rows="3">' + obj.projectdesc + '</textarea></div><div class="form-group"><label for="projectSponsor">Sponsor/Pengguna Produk/Layanan</label><select class="form-control" id="projectSponsor" name="projectsponsor">' + projectSponsor + '</select></div><div class="form-group"><label for="projectSponsorInfo">Informasi Tambahan Sponsor/Pengguna</label><textarea class="form-control" id="projectSponsorInfo" name="projectsponsorinfo" rows="3">' + obj.projectsponsorinfo + '</textarea></div><input type="hidden" name="subprojid" id="subProjeId" value="' + subProjId + '"></form>');
                $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="formSubmit" class = "btn btn-primary collapsed" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
                $("#projectProduct").val(obj.projecttype);
                $("#projectSponsor").val(obj.projectsponsor);
                $("#formSubmit").click(function () {
                    //var postData = $("#editProjectForm").serialize();
                    //$("#projectSponsorInfo").text(postData);
                    $('#customizeModal').animate({scrollTop: 0}, 100);
                    var posting = $.post("<?= site_url('engineeringmanagement_project_setting/project/1/3/3/1/') ?>" + subProjId, $("#editProjectForm").serialize());
                    posting.done(function (data) {
                        $("#ajaxEvent").empty();
                        $("#responseMessage").empty().text(data.responsemessage);
                    });
                });
            }).fail(function () {
                $("#projectAbbr").text('Érr');
                $("#modalTitle").text('Error');
                $("#modalBody").empty();
                $("#modalBody").append('<p>Gagal memuat halaman, Silahkan cek koneksi internet anda');
                $("#modalFooter").empty();
            });
            var subProjId = $(this).parent().attr('id');
            $("#customizeModal").modal('show')
        });
        $('#modalExtra1').click(function () {
            var subProjId = $(this).parent().parent().attr('id');
            $.getJSON("<?= site_url('engineeringmanagement_project_setting/project/1/3/51/1/') ?>" + subProjId).done(function (data) {
                var obj = data;
                $("#projectAbbr").text(obj.projattr.projectabbr);
                $("#modalTitle").text('Edit Tingkatan Teknologi');
                $("#modalBody").empty();
                $("#modalFooter").empty();
                var formAttr = '<form id="editExtra1">';
                $.each(obj.subprojattr, function (index, value) {
                    if (index == 0) {
                        formAttr += '<div class="form-group"><label for="trl">' + value.techmetricdesc + '</label><input type="text" name="' + value.techmetricid + '" class="form-control" id="trl" value="' + value.techmetricval + '"></div>';
                    } else {
                        formAttr += '<div class="form-group"><label for="desc">' + value.techmetricdesc + '</label><textarea class="form-control" name="' + value.techmetricid + '" id="desc" rows="3">' + value.techmetricval + '</textarea></div>';
                    }
                });
                $('#modalBody').append(formAttr + '<input type="hidden" name="subprojid" id="subProjeId" value="' + subProjId + '"></form>');
                $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="formSubmit" class = "btn btn-primary collapsed" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
                $("#formSubmit").click(function () {
                    $('#customizeModal').animate({scrollTop: 0}, 100);
                    var posting = $.post("<?= site_url('engineeringmanagement_project_setting/project/1/3/51/1/') ?>" + subProjId, $("#editExtra1").serialize());
                    posting.done(function (data) {
                        $("#ajaxEvent").empty();
                        $("#responseMessage").empty().text(data.responsemessage);
                    });
                });
            }).fail(function () {
                $("#projectAbbr").text('Érr');
                $("#modalTitle").text('Error');
                $("#modalBody").empty();
                $("#modalBody").append('<p>Gagal memuat halaman, Silahkan cek koneksi internet anda');
                $("#modalFooter").empty();
            });
            $("#customizeModal").modal('show');
        });
        $('#modalExtra2').click(function () {
            var subProjId = $(this).parent().parent().attr('id');
            $.getJSON("<?= site_url('engineeringmanagement_project_setting/project/1/3/52/1/') ?>" + subProjId).done(function (data) {
                var obj = data;
                $("#projectAbbr").text(obj.projattr.projectabbr);
                $("#modalTitle").text('Edit Produk Kegiatan/Deliverables');
                $("#modalBody").empty();
                $("#modalFooter").empty();
                var formAttr = '<form id="editExtra2">';
                $.each(obj.subprojattr, function (index, value) {
                    
                });
                $('#modalBody').append(formAttr + '<input type="hidden" name="subprojid" id="subProjeId" value="' + subProjId + '"></form>');
                $('#modalFooter').append('<button type="button" class="btn btn - secondary" data-dismiss="modal">Batal</button><button type = "button" id="formSubmit" class = "btn btn-primary collapsed" data-toggle="collapse" data-target="#responseMessage"> Simpan </button>');
                $("#formSubmit").click(function () {
                    $('#customizeModal').animate({scrollTop: 0}, 100);
                    var posting = $.post("<?= site_url('engineeringmanagement_project_setting/project/1/3/51/1/') ?>" + subProjId, $("#editExtra1").serialize());
                    posting.done(function (data) {
                        $("#ajaxEvent").empty();
                        $("#responseMessage").empty().text(data.responsemessage);
                    });
                });
            }).fail(function () {
                $("#projectAbbr").text('Érr');
                $("#modalTitle").text('Error');
                $("#modalBody").empty();
                $("#modalBody").append('<p>Gagal memuat halaman, Silahkan cek koneksi internet anda');
                $("#modalFooter").empty();
            });
            $("#customizeModal").modal('show');
        });
    <?php
}
?>
</script>
</html>

