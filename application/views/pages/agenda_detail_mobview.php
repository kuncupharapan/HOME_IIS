<?php
if ($agenda != NULL) {
    ?>
    <div class="container mt-1 pt-2 pb-2" style="background-color: #CBCBCB; font-size: 0.8em;">
        <div class="row text-dark mx-1">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-sm-4 bg-navy text-white text-center">
                        Keterangan Kegiatan
                    </div>
                </div>
                <div class="row  mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Nama Kegiatan
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo $agenda->title ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Jenis Kegiatan
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo $agenda->category ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Lokasi
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo $agenda->location ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Waktu Mulai
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo date('d-m-Y H:i:s', strtotime($agenda->startdate . ' ' . $agenda->starttime)) ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Waktu Selesai
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo date('d-m-Y H:i:s', strtotime($agenda->enddate . ' ' . $agenda->endtime)) ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-4 col-sm-4 bg-navy text-white">
                        Deskripsi Kegiatan
                    </div>
                    <div class="col-8 col-sm-8 border-bottom border-navy">
                        <?php echo $agenda->agendadesc ?>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 col-sm-4 bg-navy text-white text-center">
                        Personil Yang Terlibat
                    </div>
                </div>
                <div class="row mt-1">
                <?php
                $col = 0;
                foreach ($pic as $i => $person) {
                    if ($col == 3) {
                        $col = 0;
                        echo '</div>';
                        echo '<div class="row">';
                    }
                    echo '<div class="col-auto p-0" style="margin-right:1px; margin-left:1px; margin-bottom: 1px">';
                    echo '<div class="card border-dark m-0 p-0" style="width: 125px;">';
                    echo '<div class="card-header text-center" style="font-size:0.7em; max-width: 120px; min-height: 52px">' . $person['name'] . '</div>';
                    echo '<div class="text-center mt-1">';
                    $picture = '';
                    if ($person['internalid'] != null || $person['internalid'] != '') {
                        $picture = 'https://sidadu.bppt.go.id/uploads/' . $person['internalid'] . '.jpg';
                    } else {
                        $picture = base_url() . 'images/no-image.jpg';
                    }
                    echo '<img src="' . $picture . '" class="rounded" alt="" width="90">';
                    echo '</div>';
                    echo '<div class="card-body text-dark">';
                    echo '<p class="card-text" style="font-size:0.68em; min-height: 30px">' . $person['notes'] . '</p>';
                    echo '</div>';
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
    <?php
} else {
    echo '<div> Data tidak tersedia, agenda telah dihapus. silahkan hubungi administrator untuk keterangan lebih lanjut </div>';
}
?>
