<main class="d-flex">
    <div class="d-xs-none p-0 flex-shrink-1 bg-infoboard-1" style="font-size: 1.2em" id="infoboardsidemenu">
    </div>
    <div class="p-0 pl-2 pt-4 w-100 bd-highlight border-bottom">
        <div class="d-flex justify-content-center">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">calendar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <input type="text" class="form-control calendar text-center" id="inlineFormInputGroup text-calendar" placeholder="Username" value="<?= date('d-m-Y') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-flex mr-2" id="ajaxcontainer">
            <div class="d-flex mt-1 float-right"><span class="text-eng-primary-1"><a href="javascript:void(0)" id="addAgenda" onclick="addAgendaClickHandler()"><i class="fas fa-plus-square fa-lg"></i></a></span></div>
            <table class="table table-sm table-hover">
                <thead class="thead-dark theader">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="content">
                    <?php
                    $this->load->helper('text');
                    if ($agenda != null) {
                        $time = 6;
                        foreach ($agenda as $key => $val) {
                            $startts = date('d-m-Y H:i:s', strtotime($val['startdate'] . ' ' . $val['starttime']));
                            $endts = date('d-m-Y H:i:s', strtotime($val['enddate'] . ' ' . $val['endtime']));
                            if ($key % 2 == 0) {
                                $rowstripe = "evenrow";
                            } else {
                                $rowstripe = "oddrow";
                            }
                            echo '<tr class="' . $rowstripe . '" id="row' . $key . '"><th scope="row" class="colnumber">' . ($key + 1) . '</th>'
                            . '<td class="coltitle" id="title' . $val['id'] . '">' . $val['title'] . '</td>'
                            . '<td class="colstart">' . $startts . '</td>'
                            . '<td class="colend">' . $endts . '</td>'
                            . '<td class="colaction" id="' . $val['id'] . '">'
                            . '<a href="javascript:void(0);" id="upload' . $key . '" class="icon upload" onClick="javascript:upload(\'' . $key . '\')"><i class="fas fa-upload fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" id="id' . $val['id'] . '" class="icon pic" onClick="javascript:addPIC(\'id' . $val['id'] . '\')"><i class="fas fa-users fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" id="notes' . $key . '" class="icon notes" onClick="javascript:addNotes(\'' . $key . '\')"><i class="fas fa-sticky-note fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" id="view' . $key . '" class="icon detail" onClick="javascript:agendaonClickHandler(\'' . $key . '\')"><i class="fas fa-eye fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" id="rm' . $key . '" class="icon delete" onClick="javascript:rma(\'' . $key . '\')"><i class="fas fa-trash fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" id="edit' . $key . '" class="icon edit" onClick="javascript:editAgendaClickHandler(\'' . $key . '\')"><i class="fas fa-pen fa-xs"></i></a></td>'
                            . '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">tidak ada agenda kegiatan pada hari ini</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>