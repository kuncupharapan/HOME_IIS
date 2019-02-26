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
                        <form>
                            <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Project Description</span></div>
                            <div class="form-group">
                                <label for="programId">ID Program/Project</label>
                                <input type="text" class="form-control" id="programId" name="programid" readonly="" value="2018001">
                            </div>
                            <div class="form-group">
                                <label for="programName">Nama</label>
                                <input type="text" class="form-control" id="programName" name="programname" value="Rancang Bangun Kapal Selam Mini">
                            </div>
                            <div class="form-group">
                                <label for="programAbbr">Inisial/Singkatan</label>
                                <input type="text" class="form-control" id="programAbbr" maxlength="3" name="programabbreviation">
                            </div>
                            <div class="form-group">
                                <label for="previousProject">Program Sebelumnya</label>
                                <input class="form-control" id="search" name="previousproject" placeholder="cari proyek/kegiatan sebelumnya">
                                <small id="previousProjectHelp" class="form-text text-muted">*Jika program ini lanjutan dari program sebelumnya maka cantumkan kegiatan terkait.</small>
                            </div>
                            <div class="form-group">
                                <label for="projectDescription">Deskripsi Program</label>
                                <textarea class="form-control" id="projectDescription" name="projectdescription" rows="3" placeholder="Jelaskan latar belakang, peluang, tantangan dan kemajuan dari proyek sebelumnya"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="programCategory">Kategori Program</label>
                                <select class="form-control" id="programCategory">
                                    <option>DIPA</option>
                                    <option>Non-DIPA</option>
                                    <option>Insinas</option>
                                    <option>Internal</option>
                                </select>
                            </div>
                            <!--
                            <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Project Scope</span></div>
                            <div class="form-group">
                                <label for="projectScopeInc">Termasuk dalam Program</label>
                                <textarea class="form-control" id="projectDescription" name="projectscopeinclude" rows="3" placeholder="Jelaskan pekerjaan yang termasuk dalam kegiatan"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="projectScopeExc">Tidak Termasuk dalam Kegiatan</label>
                                <textarea class="form-control" id="projectScopeExc" name="projectscopeexclude" rows="3" placeholder="Jelaskan pekerjaan yang tidak termasuk dalam proyek"></textarea>
                            </div>
                            -->
                            <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Tingkatan Teknologi</span></div>
                            <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Project Stakeholders</span></div>
                            <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">MOV (Measurable Organizational Value)</span></div>
                            <div class="form-group">
                                <div class="d-flex bd-highlight mb-3 justify-content-between">
                                    <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1">Save & Exit</a>
                                    <button type="submit" class="btn btn-primary p-2 bd-highlight">Cancel</button>
                                    <a href="<?= site_url() ?>//engineeringmanagement_project_setting/project/1/2">Save & Next</a>
                                </div>
                            </div>

                        </form>
                        <!-- Body End --> 
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>