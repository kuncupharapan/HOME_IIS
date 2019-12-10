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