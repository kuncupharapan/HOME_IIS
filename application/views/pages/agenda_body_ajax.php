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
                        echo '<h4 class="pb-4">AGENDA HARI INI</h4>';
                        echo '<ul class="timeline">';
                    }
                    echo '<li id="' . $val['id'] . '">'
                    . '<h5>' . strtoupper($val['title']) . '<h5>'
                    . '<h5>Pukul ' . $val['starttime'] . ' wib</h5>'
                    . '<p>' . word_limiter($val['desc'], 20, ' ...') . '</p>'
                    . '<a href = "javascript:void(0);" class = "badge badge-dark" onClick = "javascript:agendaonClickHandler(' . $val['id'] . ')" id = "modalView">BACA</a>'
                    . '</li>';
                    $time = $starttime;
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo 'tidak ada agenda kegiatan pada hari ini';
            }
            ?>