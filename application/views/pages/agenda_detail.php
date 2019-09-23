<div class="container">
    <div class="row">
        <div class="col-12">
            &nbsp;
            <div class="row">
                <div class="col-4 col-sm-4">
                    Nama Kegiatan
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo $agenda->title ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Jenis Kegiatan
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo $agenda->category ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Lokasi
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo $agenda->location ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Waktu Mulai
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo date('d-m-Y h:i:s', strtotime($agenda->startdate . ' ' . $agenda->starttime)) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Waktu Selesai
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo date('d-m-Y h:i:s', strtotime($agenda->enddate . ' ' . $agenda->endtime)) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Deskripsi Kegiatan
                </div>
                <div class="col-8 col-sm-8">
                    <?php echo $agenda->agendadesc ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-sm-4">
                    Personil Yang Terlibat
                </div>
                <div class="col-8 col-sm-8">
                    &nbsp;
                </div>
                <div class="col-12 col-sm-12">
                    <?php
                    echo '<div class="card-group">';
                    $col = 0;
                    foreach ($pic as $i => $person) {
                        if ($col == 3) {
                            $col = 0;
                            echo '</div>';
                            echo '<div class="card-group">';
                        }
                        echo '<div class="card border-dark mb-3" style="max-width: 14rem;">';
                        echo '<div class="card-header text-center">'.$person['name'].'</div>';
                        echo '<div class="text-center mt-1">';
                        echo '<img src="'. base_url() .'images/no-image.jpg" class=" rounded-circle" alt="" width="48" height="48">';
                        echo '</div>';
                        echo '<div class="card-body text-dark">';
                        echo '<h5 class="card-title"></h5>';
                        echo '<p class="card-text">'.$person['notes'].'</p>';
                        echo '</div>';
                        echo '</div>';
                        $col++;
                    }
                    if ($col < 3) {
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

