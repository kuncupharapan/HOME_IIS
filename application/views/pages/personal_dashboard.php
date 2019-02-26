<div class="container-fluid mt-0">
    <div class="row flex-xl-nowrap mt-0">
        <div class="col-12 col-md-3 col-xl-6 bd-sidebar text-left bg-t1greenlight">
            <div class="d-flex flex-column pb-2 border-bottom border-t1bluedark">
                <div class="d-flex p-0 m-0 justify-content-center align-items-start"><img class="rounded-circle mt-3 bd-lnav-photo" src="<?php echo base_url() ?>images/pasphoto_square.jpg" alt=""></div>
                <div class="d-flex pt-1 m-0 justify-content-center align-items-start"><strong class="text-gray-dark">@joni.doe</strong>&nbsp;<button type="button" class="btn btn-link bd-link-profile p-0 m-0"><i class="fas fa-edit text-t1bluelight" style="font-size: 9pt"></i></button></div>
            </div>
            <nav class="collapse bd-links" id="bd-docs-nav">
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/personal_page">
                        Notification Center
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/employee_profile">
                        Profile Info
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/personal_calendar">
                        Personal Calendar
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link active" href="<?php echo site_url() ?>/personal_dashboard">
                        Dashboard
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="">
                        Setting
                    </a>
                </div>
            </nav>
        </div>
        <main class="col-12 col-md-9 col-xl-10 pl-md-2 mt-1">
            <div class="d-flex p-2 mt-0 mb-1 text-t1greenmed bg-t1bluedark rounded box-shadow">
                <i class="fas fa-tachometer-alt" style="font-size: 15pt"></i>&nbsp;&nbsp;<h6 class="text-white">Personal Dashboard</h6>
            </div>
            <div class="container-fluid">
                <div class="row flex-xl-nowrap mt-0 bg-white">
                    <div class="container-fluid border border-gray bg-white rounded shadow-sm m-3">
                        <div class="row border-bottom border-gray mb-1 pl-2">
                            <div class="col-12 pl-0 py-1 clearfix">
                                <div  class="d-inline-flex">
                                    <span class="d-block mr-2 mt-1 fa-lg"><i class="fas fa-fingerprint bg-t1bluedark" data-fa-transform="shrink-3" style="color: #FFF"></i></span>
                                    <h6 class="d-block mt-1 float-left text-t1bluedark" style="font-weight: 1000">
                                        Kehadiran
                                    </h6>
                                </div>
                                <div class="d-inline-flex float-right">
                                    <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 50px" href="#"><i class="fas fa-eye-slash mt-1"></i></a> 
                                    <div class="dropdown dropleft">
                                        <button type="button" class="btn btn-link bd-link-profile p-0 m-0 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-t1bluedark"></i></button>
                                        <div class="dropdown-menu bg-t1greenlight border-t1bluelight">
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-list-ul"></i>&nbsp;Monthly</a>
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Weekly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid mb-2" id="attendancechart">

                            <div id="chartcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                            <div id="perfchartcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

                        </div>
                    </div>
                </div>
                <div class="row flex-xl-nowrap mt-0 bg-white">
                    <div class="container-fluid border border-gray bg-white rounded shadow-sm mb-3 mx-3">
                        <div class="row border-bottom border-gray mb-1 pl-2">
                            <div class="col-12 pl-0 py-1 clearfix">
                                <div  class="d-inline-flex">
                                    <span class="d-block mr-2 mt-1 fa-lg"><i class="fas fas fa-charging-station bg-t1bluedark" data-fa-transform="shrink-3" style="color: #FFF"></i></span>
                                    <h6 class="d-block mt-1 float-left text-t1bluedark" style="font-weight: 1000">
                                        Kinerja Individu
                                    </h6>
                                </div>
                                <div class="d-inline-flex float-right">
                                    <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 50px" href="#"><i class="fas fa-eye-slash mt-1"></i></a> 
                                    <div class="dropdown dropleft">
                                        <button type="button" class="btn btn-link bd-link-profile p-0 m-0 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-t1bluedark"></i></button>
                                        <div class="dropdown-menu bg-t1greenlight border-t1bluelight">
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-list-ul"></i>&nbsp;Monthly</a>
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Weekly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid mb-2" id="attendancechart">

                            <div id="workperformancecontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                            <div id="skicompcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                            <div id="skicontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

                        </div>
                    </div>
                </div>
                <div class="row flex-xl-nowrap mt-0 bg-white">
                    <div class="container-fluid border border-gray bg-white rounded shadow-sm mb-3 mx-3">
                        <div class="row border-bottom border-gray mb-1 pl-2">
                            <div class="col-12 pl-0 py-1 clearfix">
                                <div  class="d-inline-flex">
                                    <span class="d-block mr-2 mt-1 fa-lg"><i class="fas fas fa-drafting-compass bg-t1bluedark" data-fa-transform="shrink-3" style="color: #FFF"></i></span>
                                    <h6 class="d-block mt-1 float-left text-t1bluedark" style="font-weight: 1000">
                                        Kinerja Litbangyasa
                                    </h6>
                                </div>
                                <div class="d-inline-flex float-right">
                                    <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 50px" href="#"><i class="fas fa-eye-slash mt-1"></i></a> 
                                    <div class="dropdown dropleft">
                                        <button type="button" class="btn btn-link bd-link-profile p-0 m-0 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-t1bluedark"></i></button>
                                        <div class="dropdown-menu bg-t1greenlight border-t1bluelight">
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-list-ul"></i>&nbsp;Monthly</a>
                                            <a class="dropdown-item text-t1bluedark" style="font-size: 9pt; max-width: 100px" href="#"><i class="fas fa-calendar-alt"></i>&nbsp;Weekly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid mb-2" id="attendancechart">

                            <div id="workloadcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                            <div id="perekcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                            <div id="pointdistcontainer" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>
