<main class="d-flex">
    <div class="p-0 flex-shrink-1 bg-infoboard-1" style="font-size: 1.2em" id="infoboardsidemenu">
    </div>
    <div class="p-0 pl-2 pt-4 w-100 bd-highlight border-bottom">
        <div class="container align-content-center">
            <?php
            $arrdays = array('minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jum\'at', 'sabtu');
            $arrmonths = array('01' => 'jan', '02' => 'feb', '03' => 'mar', '04' => 'apr', '05' => 'mei', '06' => 'jun', '07' => 'jul', '08' => 'agu', '09' => 'sep', '10' => 'okt', '11' => 'nop', '12' => 'des');
            ?>
            <ul class="nav justify-content-center">

                <?php
                for ($i = 0; $i < 7; $i++) {
                    echo '<li class="nav-item p-0 mr-1" id="' . str_replace('-', '', $days[$i][1]) . '">';
                    echo '<a class="nav-link datenav p-0 m-0 dateshortcut ';
                    $badge = '';
                    if ($i != 0) {
                        $status = '';
                    } else {
                        $status = 'active';
                    }
                    if ($badges[$i] > 0) {
                            $badge = '<span class="badge rounded-circle align-content-center align-middle align-items-center" style="width: 18px; height: 18px">' . $badges[$i] . '</span>';
                        }
                    echo $status . '" href="#">';
                    echo '<span id="day' . ($i + 1) . '" class="d-flex justify-content-center pt-1 days">' . $arrdays[$days[$i][0]] . '&nbsp;' . $badge . '</span>';
                    echo '<span id="date' . ($i + 1) . '" class="d-flex bg-white justify-content-center dates">' . substr($days[$i][1], 0, -8) . '</span>';
                    echo '<span id="month' . ($i + 1) . '" class="d-flex justify-content-center months">' . $arrmonths[substr($days[$i][1], 3, -5)] . '</span>';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item p-0 text-dark last" style="font-size: 3.45em">
                    <a class="nav-link datenav pt-3 pb-3 datepicker btn-calendar" href="#"><span class="d-flex justify-content-center"><i class="far fa-calendar-alt fa-fw" style="color:#FF8C6E"></i></span></a>
                </li>
            </ul>
        </div>
        <div id="ajaxcontainer">
            <?php
            $this->load->helper('text');
            if ($agenda != null) {
                $time = 6;
                foreach ($agenda as $key => $val) {
                    $startts = strtotime($val['startdate'] . ' ' . $val['starttime']);
                    $endts = strtotime($val['enddate'] . ' ' . $val['endtime']);
                    $starttime = date('H', $startts);
                    if ($time == 6) {
                        echo '<div class="container mt-5 mb-5">';
                        echo '<div class="row">';
                        echo '<div class="col-9">';
                        echo '<div class="container">'
                        . '<div class="d-inline pt-0 pl-3 pr-1 bg-dark text-white hashtag">#</div><div class="d-inline tagline border border-white-50">agendahankam</div>&nbsp;&nbsp;'
                        . '<div class="d-inline pt-0 pl-3 pr-1 bg-dark text-white hashtag">#</div><div class="d-inline tagline border border-white-50">' . str_replace('-', '.', $date) . '</div>'
                        . '</div>';
                        echo '<ul class="timeline">';
                    }
                    echo '<li id="' . $val['id'] . '">'
                    . '<h5 class="agendatitle">' . strtoupper($val['title']) . '<h5>'
                    . '<h5 class="agendatime">Waktu: ' . $val['starttime'] . ' WIB</h5>'
                    . '<p class="agendadesc">' . word_limiter($val['desc'], 20, ' ...') . '</p>'
                    . '<a href="javascript:void(0);" class="badge badge-dark" onClick="javascript:agendaonClickHandler(' . $val['id'] . ')" id = "modalView">BACA</a>'
                    . '</li>';
                    $time = $starttime;
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="container mt-5 mb-5">';
                echo '<div class="row">';
                echo '<div class="col-9">';
                echo '<div class="container">'
                . '<div class="d-inline pt-0 pl-3 pr-1 bg-dark text-white hashtag">#</div><div class="d-inline tagline border border-white-50">agendahankam</div>&nbsp;&nbsp;'
                . '<div class="d-inline pt-0 pl-3 pr-1 bg-dark text-white hashtag">#</div><div class="d-inline tagline border border-white-50">' . str_replace('-', '.', $date) . '</div>'
                . '</div>';
                echo '<ul class="timeline">';
                echo '<li>tidak ada agenda kegiatan pada hari ini</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>
<!--
<div class="fixed-bottom">
    <p style="text-align: right;"><iframe src="https://www.jadwalsholat.org/adzan/ajax.row.php?id=24" frameborder="0" width="220" height="220"></iframe></p>
</div>
-->