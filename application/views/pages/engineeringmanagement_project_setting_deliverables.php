<div class="container-fluid mt-0">
    <div class="row flex-xl-nowrap mt-0">
        <div class="col-12 col-md-3 col-xl-6 bd-sidebar bg-eng-primary-1 text-left" id="engleftmenu">

        </div>
        <main class="col-12 col-md-9 col-xl-10 pl-md-2 mt-1">
            <div class="d-flex p-2 mt-0 mb-1 text-eng-secondary-2-1 bg-eng-secondary-2-4 rounded box-shadow">
                <i class="fas fa-cog" style="font-size: 15pt"></i>&nbsp;&nbsp;<h6 class="text-white">Project Setting</h6>
            </div>
            <div class="container-fluid">
                <div class="row flex-xl-nowrap mt-0 bg-white rounded box-shadow mb-3">
                    <div class="container-fluid py-2">
                        <div class="jumbotron p-3 p-md-3 text-white rounded svgtitlecard">
                            <div class="col px-0">
                                <div class="row">
                                    <div class="col-auto pt-3">
                                        <div class="bd-notif-icon d-flex justify-content-center align-items-center mr-1 border border-navy p-0 bg-navy rounded" style="min-width: 80px; min-height: 80px"><h5 class="text-white text-uppercase"><?= $project["abbr"] ?></h5></div>
                                    </div>
                                    <div class="col-9 pt-0">
                                        <h1 class="display-4 font-italic"><?= $project["name"] ?></h1>
                                        <span class="font-italic" style="font-size: 7pt; color: #777777">Last Edited: 12-12-2018 00:00:00 wib, by Administrator</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jumbo End, Body Start -->
                        <div class="d-flex border-bottom border-eng-primary-2 my-3">
                            <span class="font-italic font-weight-bold text-capitalize">kegiatan program &nbsp;</span>
                            <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="help" data-content="Jika terdapat lebih dari satu peroject yang digabungkan dalam satu WBS maka setiap project dalam WBS tersebut disebut dengan kegiatan. hal ini dimaksudkan untuk mempermudah mengelola history masing-masing project. Dalam satu program harus terdapat satu kegiatan atau lebih."><i class="far fa-question-circle"></i></a>
                        </div>
                        <div class="d-flex mt-1 float-right"><span class="text-eng-primary-1"><a href="javascript:void();" role="button" id="modalAddProject"><i class="fas fa-plus-square fa-lg"></i></a></span></div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Produk/Layanan</th>
                                    <th scope="col">Last Update</th>
                                    <th scope="col">Updated By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>RB. Kapal Selam Mini</td>
                                    <td>Purwarupa</td>
                                    <td>21-04-2018 00:00:00 wib</td>
                                    <td>Administrator</td>
                                    <td id="21">
                                        <a href="javascript:void(0);" id="modalView"><i class="fas fa-eye fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" id="modalDelete"><i class="fas fa-trash fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" class="modalEdit" id="21"><i class="fas fa-pen fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" role="button" id="dropdownMenuLink" onmouseover="$(this).tooltip('show')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" title="Lanjut"><i class="fas fa-ellipsis-h fa-xs"></i></a>
                                        <div class="dropdown-menu bg-eng-primary-5 border-eng-primary-1" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra1"><i class="fas fa-sort-amount-up"></i>&nbsp;Tingkatan Teknologi</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra2"><i class="fas fa-gift"></i>&nbsp;Produk Kegiatan/Deliverables</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra3"><i class="fas fa-cookie-bite"></i>&nbsp;Scope</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra4"><i class="fas fa-handshake"></i>&nbsp;Mitra/Konsorsium</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra5"><i class="fas fa-bullseye"></i>&nbsp;Measurement Goals</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" id="modalExtra6"><i class="fas fa-list-ol"></i>&nbsp;Requirements</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>RB. Terpedo</td>
                                    <td>Detail Design</td>
                                    <td>21-04-2018 00:00:00 wib</td>
                                    <td>Administrator</td>
                                    <td id="22">
                                        <a href="javascript:void(0);" id="modalView"><i class="fas fa-eye fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" id="modalDelete"><i class="fas fa-trash fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" class="modalEdit" id="22"><i class="fas fa-pen fa-xs"></i></a>&nbsp;
                                        <a href="javascript:void(0);" role="button" id="dropdownMenuLink" onmouseover="$(this).tooltip('show')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" title="Lanjut"><i class="fas fa-ellipsis-h fa-xs"></i></a>
                                        <div class="dropdown-menu bg-eng-primary-5 border-eng-primary-1" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="javascript:void(0)" onclick=""><i class="fas fa-list-ul"></i>&nbsp;Tingkatan Teknologi</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Produk Kegiatan/Deliverables</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Scope</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Mitra/Konsorsium</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Measurement Goals</a>
                                            <a class="dropdown-item text-eng-adj-primary-1" style="font-size: 9pt" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Requirements</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <div class="d-flex bd-highlight mb-3 justify-content-between">
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1/2">Back</a>
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1">Exit</a>
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1/4">Next</a>
                            </div>
                        </div>
                        <!-- Body End --> 
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>