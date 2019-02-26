<div class="container-fluid mt-0">
    <div class="row flex-xl-nowrap mt-0">
        <div class="col-12 col-md-3 col-xl-6 bd-sidebar bg-eng-primary-1 text-left">
            <div class="d-flex flex-column pb-2 border-bottom border-t1bluedark">
                <div class="d-flex p-0 m-0 justify-content-center align-items-start"><img class="rounded-circle mt-3 bd-lnav-photo" src="<?php echo base_url() ?>images/pasphoto_square.jpg" alt=""></div>
                <div class="d-flex pt-1 m-0 justify-content-center align-items-start"><strong class="text-eng-primary-5">@joni.doe</strong>&nbsp;<button type="button" class="btn btn-link bd-link-profile p-0 m-0"><i class="fas fa-edit text-white" style="font-size: 9pt"></i></button></div>
            </div>
            <nav class="collapse bd-links" id="bd-docs-nav">
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/engineeringmanagement_home">
                        Engineering Home
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link  active" href="<?php echo site_url() ?>/engineeringmanagement_projects_browse">
                        Projects
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/">
                        My Performance
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link" href="<?php echo site_url() ?>/project_dashboard">
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
            <div class="d-flex p-2 mt-0 mb-1 text-eng-secondary-2-1 bg-eng-secondary-2-4 rounded box-shadow">
                <i class="fas fa-calendar-alt" style="font-size: 15pt"></i>&nbsp;&nbsp;<h6 class="text-white">Project Information</h6>
            </div>
            <div class="container-fluid">
                <div class="row flex-xl-nowrap mt-0 bg-white rounded box-shadow mb-3">
                    <div class="container-fluid">

                        <div class="container-fluid mb-2 mt-3">
                            <div class="jumbotron p-3 p-md-5 text-white rounded bg-eng-secondary-1-1">
                                <div class="col px-0">
                                    <div class="row">
                                        <div class="col-auto pt-3">
                                            <div class="bd-notif-icon d-flex justify-content-center align-items-center mr-1 border border-navy p-0 bg-navy rounded" style="min-width: 80px; min-height: 80px"><h5 class="text-white">KSM</h5></div>
                                        </div>
                                        <div class="col-9 pt-0">
                                            <h1 class="display-4 font-italic"><?= $project["name"] ?></h1>
                                        </div>
                                    </div>

                                    <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>

                                </div>
                                <div class="nav-scroller py-1 mb-2">
                                    <nav class="nav d-flex justify-content-between">
                                        <a class="p-2 text-eng-complement-4" href="#">Summary</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Conversation</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Files</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Schedule</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Organization</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Photos</a>
                                        <a class="p-2 text-eng-complement-4" href="#">Log Book</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid mb-2 mt-3">
                            <div id="org_chart"></div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>