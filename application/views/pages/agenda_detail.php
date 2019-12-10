<?php
if ($agenda != NULL) {
?>
<div class="container">
    <div class="row text-dark">
        <div class="col-12">
            &nbsp;
            <div class="row">
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
                <div class="col-4 col-sm-4 bg-navy text-white">
                    Personil Yang Terlibat
                </div>
                <div class="col-8 col-sm-8">
                    &nbsp;
                </div>
                <div class="col-12 col-sm-12 mt-1">
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
                        echo '<div class="card-header text-center">' . $person['name'] . '</div>';
                        echo '<div class="text-center mt-2">';
                        $picture = '';
                        if ($person['internalid'] != null || $person['internalid'] != '') {
                            $picture = 'https://sidadu.bppt.go.id/uploads/' . $person['internalid'] . '.jpg';
                        } else {
                            $picture = base_url() . 'images/no-image.jpg';
                        }
                        echo '<img src="' . $picture . '" class="rounded" alt="" width="100">';
                        echo '</div>';
                        echo '<div class="card-body text-dark">';
                        echo '<h5 class="card-title"></h5>';
                        echo '<p class="card-text">' . $person['notes'] . '</p>';
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
<?php
} else {
    echo '<div> Data tidak tersedia, agenda telah dihapus. silahkan hubungi administrator untuk keterangan lebih lanjut </div>';
}
?>
