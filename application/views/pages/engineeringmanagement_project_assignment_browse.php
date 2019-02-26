<div class="container-fluid mt-0">
    <div class="row flex-xl-nowrap mt-0">
        <div class="col-12 col-md-3 col-xl-6 bd-sidebar bg-eng-primary-1 text-left" id="engleftmenu">

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
                                <div id="projecttab"></div>
                            </div>
                        </div>
                        <div class="container-fluid mb-2 mt-3">
                            <div class="row pb-1 justify-content-end">
                                <a href="<?=site_url()."/engineeringmanagement_project_assignment/add/1001"?>" class="btn btn-secondary btn-sm mr-3"><i class="fas fa-plus-square"></i>&nbsp;new assignment&nbsp;</a>
                            </div>
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Instruction Number</th>
                                        <th scope="col">Receipent <i class="fas fa-sort-down"></i></th>
                                        <th scope="col">Intruction Date <i class="fas fa-sort-down"></i></th>
                                        <th scope="col">Activities</th>
                                        <th scope="col">Start Date <i class="fas fa-sort-down"></i></th>
                                        <th scope="col">End Date <i class="fas fa-sort-down"></i></th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>IS001/2500/KSL/5/2018</td>
                                        <td>Linda Nuryanti</td>
                                        <td>20/12/2018 11:20:45</td>
                                        <td>Merancang sistem komunikasi</td>
                                        <td>20/12/2018</td>
                                        <td>20/01/2019</td>
                                        <td>On Progress</td>
                                        <td>Hapus|Edit</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>IS002/2500/KSL/5/2018</td>
                                        <td>Linda Nuryanti</td>
                                        <td>20/12/2018 11:20:45</td>
                                        <td>Merancang sistem navigasi</td>
                                        <td>20/12/2018</td>
                                        <td>20/01/2019</td>
                                        <td>On Progress</td>
                                        <td>Hapus|Edit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>