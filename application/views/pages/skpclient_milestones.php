
<main class="container-fluid mt-1">
    <div class="d-flex p-2 mt-0 mb-1 text-eng-secondary-2-1 bg-eng-secondary-2-4 rounded box-shadow">
        <i class="fas fa-cog" style="font-size: 15pt"></i>&nbsp;&nbsp;<h6 class="text-white">Informasi Kegiatan</h6>
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
                <div class="d-flex border-bottom border-eng-primary-2 my-3"><span class="font-italic font-weight-bold text-capitalize">Milestone Luaran/Deliverables Kegiatan</span></div>

                <div class="d-flex mt-1 float-right"><span class="text-eng-primary-1"><a href=""><i class="fas fa-plus-square fa-lg"></i></a></span></div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Luaran/Deliverables</th>
                            <th scope="col">Milestones</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Periode/Triwulan</th>
                            <th scope="col">Deliver Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i =1;
                        foreach ($milestones as $row => $value) {
                            echo '<tr>';
                            echo '<th scope="row">'.$i++.'</th>';
                            echo '<td>'.ucfirst($value['name']).'</td>';
                            echo '<td>'.ucfirst($value['milestonename']).'</td>';
                            echo '<td>'.ucfirst($value['desc']).'</td>';
                            echo '<td>'.ucfirst($value['milestoneperiod']).'</td>';
                            echo '<td>'.ucfirst($value['deliverdate']).'</td>';
                            echo '<td>';
                            echo '<a href=""><i class="fas fa-eye fa-xs"></i></a>&nbsp;';
                            echo '<a href=""><i class="fas fa-trash fa-xs"></i></a>&nbsp;';
                            echo '<a href=""><i class="fas fa-pen fa-xs"></i></a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <!-- Body End --> 
            </div>
        </div>
    </div>
</main>
