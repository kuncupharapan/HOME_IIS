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
                                        <div class="bd-notif-icon d-flex justify-content-center align-items-center mr-1 border border-navy p-0 bg-navy rounded" style="min-width: 80px; min-height: 80px"><h5 class="text-white">KSM</h5></div>
                                    </div>
                                    <div class="col-9 pt-0">
                                        <h1 class="display-4 font-italic"><?= $project["name"] ?></h1>
                                        <span class="font-italic" style="font-size: 7pt; color: #777777">Last Edited: 12-12-2018 00:00:00 wib, by Administrator</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jumbo End, Body Start -->
                        <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Sumber Anggaran Program</span></div>

                        <div class="d-flex mt-1 float-right"><span class="text-eng-primary-1"><a href=""><i class="fas fa-plus-square fa-lg"></i></a></span></div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Anggaran</th>
                                    <th scope="col">Sumber Anggaran</th>
                                    <th scope="col">Jumlah Anggaran</th>
                                    <th scope="col">Last Update</th>
                                    <th scope="col">Updated By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DIPA Program KSM</td>
                                    <td>DIPA</td>
                                    <td>Rp. 1.000.000.000</td>
                                    <td>21-04-2018 00:00:00 wib</td>
                                    <td>Administrator</td>
                                    <td>
                                        <a href=""><i class="fas fa-eye fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-plus fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-trash fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-pen fa-xs"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mitra A</td>
                                    <td>Mitra</td>
                                    <td>Rp. 1.000.000.000</td>
                                    <td>21-04-2018 00:00:00 wib</td>
                                    <td>Administrator</td>
                                    <td>
                                        <a href=""><i class="fas fa-eye fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-plus fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-trash fa-xs"></i></a>&nbsp;
                                        <a href=""><i class="fas fa-pen fa-xs"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td colspan="2">Jumlah</td>
                                    <td>Rp. 2.000.000.000</td>
                                    <td></td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <div class="d-flex bd-highlight mb-3 justify-content-between">
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1/1">Back</a>
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1">Exit</a>
                                <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1/3">Next</a>
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