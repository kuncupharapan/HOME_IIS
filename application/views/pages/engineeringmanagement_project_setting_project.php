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
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card text-white bg-eng-secondary-1-2 mb-3 card text-center" style="max-width: 18rem;">
                                    <div class="card-header font-weight-bold text-uppercase"><i class="fas fa-info-circle" data-fa-transform="grow-5" style="margin-right: 4px"></i> Project Information</div>
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">Informasi Tentang Program/ Kegiatan.</p>
                                        <span class="d-flex justify-content-center mb-3 font-italic text-white" style="font-size: 7pt;">Last Edited: 12-12-2018 00:00:00 wib<br>By: Administrator</span>
                                        <div class="d-flex justify-content-center">
                                            <a href="<?=site_url()?>/engineeringmanagement_project_setting/project/1/1" class="btn btn-eng-secondary-2-2">Log</a>&nbsp;
                                            <a href="<?=site_url()?>/engineeringmanagement_project_setting/project/1/1" class="btn btn-eng-secondary-2-2">GO</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white bg-eng-secondary-1-2 mb-3 card text-center" style="max-width: 18rem;">
                                    <div class="card-header font-weight-bold text-uppercase"><i class="fas fa-sitemap" data-fa-transform="grow-5" style="margin-right: 4px"></i> Project organization</div>
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">Pengaturan struktur Organisasi program/ kegiatan.</p>
                                        <a href="#" class="btn btn-eng-secondary-2-2">GO</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white bg-eng-secondary-1-2 mb-3 card text-center" style="max-width: 18rem;">
                                    <div class="card-header font-weight-bold text-uppercase"><i class="fas fa-calendar-alt" data-fa-transform="grow-5" style="margin-right: 4px"></i> Project Schedule</div>
                                    <div class="card-body">
                                        <p class="card-text text-capitalize">Pengaturan jadwal dan agenda program/ kegiatan.</p>
                                        <a href="#" class="btn btn-eng-secondary-2-2">GO</a>
                                    </div>
                                </div>
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