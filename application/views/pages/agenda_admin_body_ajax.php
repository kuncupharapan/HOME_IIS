<div class="d-flex mt-1 float-right"><span class="text-eng-primary-1"><a href=""><i class="fas fa-plus-square fa-lg"></i></a></span></div>
<table class="table table-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Agenda</th>
            <th scope="col">Waktu Mulai</th>
            <th scope="col">Waktu Selesai</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $this->load->helper('text');
        if ($agenda != null) {
            $time = 6;
            foreach ($agenda as $key => $val) {
                $startts = date('d-m-Y h:i:s', strtotime($val['startdate'] . ' ' . $val['starttime']));
                $endts = date('d-m-Y h:i:s', strtotime($val['enddate'] . ' ' . $val['endtime']));
                if ($key % 2 == 0) {
                    $rowstripe = "evenrow";
                } else {
                    $rowstripe = "oddrow";
                }
                echo '<tr Class="' . $rowstripe . '"><th scope="row">' . ($key + 1) . '</th>'
                            . '<td id="title'. $val['id'] .'">' . $val['title'] . '</td>'
                            . '<td>' . $startts . '</td>'
                            . '<td>' . $endts . '</td>'
                            . '<td id="'. $val['id'] .'">'
                            . '<a href="javascript:void(0);" id="id'. $val['id'] .'" class="pic" onClick="javascript:addPIC(\'id'. $val['id'] .'\')"><i class="fas fa-users fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" class="detail"><i class="fas fa-eye fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" class="delete"><i class="fas fa-trash fa-xs"></i></a>&nbsp;'
                            . '<a href="javascript:void(0);" class="edit"><i class="fas fa-pen fa-xs"></i></a></td>'
                            . '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">tidak ada agenda kegiatan pada hari ini</td></tr>';
        }
        ?>
    </tbody>
</table>