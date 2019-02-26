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
                            <form>
                                <div class="form-group row">
                                    <label for="inputactivities" class="col-sm-2 col-form-label">Activities</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select-sm">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Merancang Sistem Komunikasi</option>
                                            <option value="2">Merancang Sistem Navigasi</option>
                                            <option value="3">Merancang Sistem Persenjataan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputreceipent" class="col-sm-2 col-form-label">Receipent</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select-sm">
                                            <option selected>Open this select menu</option>
                                            <option value="1">ES2001 | Frandi Adi Kaharjito, S.T</option>
                                            <option value="2">ES2002 | Linda Nuryanti, S. Kom</option>
                                            <option value="3">ES2003 | Wahyu Cesar, S.Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputtitle" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputtitle" placeholder="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="standalone-container" class="col-sm-2 col-form-label">Instruction</label>
                                    <div class="col-sm-10">
                                        <div id="standalone-container" >
                                            <div id="toolbar-container">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-script" value="sub"></button>
                                                    <button class="ql-script" value="super"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-indent" value="-1"></button>
                                                    <button class="ql-indent" value="+1"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-direction" value="rtl"></button>
                                                    <select class="ql-align"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                                    <button class="ql-video"></button>
                                                    <button class="ql-formula"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-clean"></button>
                                                </span>
                                            </div>
                                            <div id="editor-container" class="form-control" style="height: 350px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputdatestart" class="col-sm-2 col-form-label">Date start</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3"  >
                                            <input type="text" id="datetimepicker1" class="form-control" placeholder="mm/dd/yy hh:mm:ss" aria-label="date-start" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputreceipent" class="col-sm-2 col-form-label">Working Hours</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputmanhours" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputmaxdeadline" class="col-sm-2 col-form-label">Maximal Deadline</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3" >
                                            <input type="text" id="datetimepicker2" class="form-control"  placeholder="mm/dd/yy hh:mm:ss" aria-label="max-finished" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputdateestimation" class="col-sm-2 col-form-label">Completion Time Estimation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputdateestimation" placeholder="22/01/2019 12:00:00" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputreceipent" class="col-sm-2 col-form-label">Deliverable</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Technical Notes</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Working Sheet</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Log Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Benda Kerja</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Attachment</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="d-flex d-sm-flex d-xl-none justify-content-center align-items-center sidebar-shortcut rounded-circle bg-t1bluedark text-t1bluelight"><i class="fas fa-angle-double-left"></i></div>
</div>