<footer class="footer">
    <div class="d-flex justify-content-center p-2 bg-t1bluedark">
        <span class="text-t1greenmed">Tim Pengembangan SI-TI PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script type="text/javascript">
    $(function () {
        var myChart = Highcharts.chart('chartcontainer', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Rekapitulasi Kehadiran'
            },
            subtitle: {
                text: 'Sumber: sidapi.bppt.go.id'
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret']
            },
            yAxis: {
                title: {
                    text: 'Hari'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Hadir',
                    data: [20, 21, 22]
                }, {
                    name: 'Ijin',
                    data: [1, 0, 0]
                }, {
                    name: 'SPPD',
                    data: [0, 2, 1]
                }, {
                    name: 'Non SPPD',
                    data: [0, 1, 4]
                }]
        });
    });
    $(function () {
        var performchart =
                Highcharts.chart('perfchartcontainer', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Prosentase Kehadiran'
                    },
                    subtitle: {
                        text: 'Sumber: sidapi.bppt.go.id'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Prosentase (%)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                            name: 'Kinerja Kehadiran',
                            data: [100.0, 100.0, 100.0, 100.0, 99.8, 99.0, 98.5, 96.5, 93.3, 98.3, 93.9, 99.6]
                        }, {
                            name: 'Kehadiran',
                            data: [99.9, 94.2, 95.7, 98.5, 91.9, 95.2, 97.0, 96.6, 94.2, 90.3, 96.6, 94.8]
                        }]
                });
    });
    $(function () {
        var wpchart =
                Highcharts.chart('workperformancecontainer', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Prestasi Kerja'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Prosentase (%)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                            name: 'Kinerja Kehadiran',
                            data: [100.0, 100.0, 100.0, 100.0, 99.8, 99.0, 98.5, 96.5, 93.3, 98.3, 93.9, 99.6]
                        }, {
                            name: 'Sasaran Kerja Individu',
                            data: [99, 94.2, 95.7, 98.5, 91.9, 95.2, 97.0, 96.6, 94.2, 90.3, 96.6, 94.8]
                        }, {
                            name: 'Prestasi Kerja',
                            data: [99.5, 98.2, 97.7, 99.5, 93.9, 97.2, 97.5, 96.6, 93.2, 94.3, 95.6, 96.8]
                        }]
                });
    });
    $(function () {
        var skichart =
                Highcharts.chart('skicontainer', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Capaian SKI'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Prosentase (%)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                            name: 'Tugas Pokok & Fungsi',
                            data: [100.0, 100.0, 100.0, 100.0, 99.8, 99.0, 98.5, 96.5, 93.3, 98.3, 93.9, 99.6]
                        }, {
                            name: 'Tugas Strategis',
                            data: [99.5, 98.2, 97.7, 99.5, 93.9, 97.2, 97.5, 96.6, 93.2, 94.3, 95.6, 96.8]
                        }, {
                            name: 'Tugas Tambahan',
                            data: [98.5, 97.2, 94.7, 97.5, 100, 100, 95, 99.6, 99.2, 98.3, 94.6, 95.8]
                        }, {
                            name: 'Sasaran Kerja Individu',
                            data: [99, 94.2, 95.7, 98.5, 91.9, 95.2, 97.0, 96.6, 94.2, 90.3, 96.6, 94.8]
                        }]
                });
    });
    $(function () {
        var comboski = Highcharts.chart('skicompcontainer', {
            title: {
                text: 'Bobot SKI'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Prosentase (%)'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Tugas Pokok & Fungsi',
                    data: [70, 80, 70, 80, 75, 80, 70, 60, 70, 85, 75, 80]
                }, {
                    type: 'column',
                    name: 'Tugas Strategis',
                    data: [20, 10, 15, 10, 15, 15, 20, 30, 20, 10, 15, 15]
                }, {
                    type: 'column',
                    name: 'Tugas Tambahan',
                    data: [10, 10, 15, 10, 10, 5, 10, 10, 10, 5, 10, 5]
                }, {
                    type: 'spline',
                    name: 'Capaian SKI',
                    data: [99, 94.2, 95.7, 98.5, 91.9, 95.2, 97.0, 96.6, 94.2, 90.3, 96.6, 94.8],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }]
        });
    });
    $(function () {
        var workload = Highcharts.chart('workloadcontainer', {
            title: {
                text: 'Beban Kerja'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jam'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Drone',
                    data: [30, 40, 30, 20, 35, 20, 30, 40, 20, 35, 45, 40]
                }, {
                    type: 'column',
                    name: 'Kapal Selam Mini',
                    data: [40, 30, 25, 30, 35, 30, 20, 30, 20, 40, 25, 25]
                }, {
                    type: 'column',
                    name: 'Lain-lain',
                    data: [20, 30, 25, 30, 20, 35, 20, 20, 50, 25, 20, 35]
                }, {
                    type: 'spline',
                    name: 'Capaian',
                    data: [100, 98, 70, 98, 100, 120, 90, 96, 98, 99, 116, 104],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }]
        });
    });
    $(function () {
        var comboperek = Highcharts.chart('perekcontainer', {
            chart: {
                zoomType: 'xy'
            }, title: {
                text: 'hasil litbangyasa'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                crosshair: true
            },
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Jumlah Dokumen',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                }, {// Secondary yAxis
                    title: {
                        text: 'Poin Kerekayasaan',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true
                }],
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Lembar Instruksi',
                    data: [7, 8, 7, 8, 7, 8, 7, 6, 7, 8, 7, 8]
                }, {
                    type: 'column',
                    name: 'Catatan Teknis',
                    data: [2, 3, 6, 5, 2, 5, 2, 3, 2, 3, 5, 5]
                }, {
                    type: 'column',
                    name: 'Lembar Kerja',
                    data: [2, 3, 6, 5, 2, 5, 2, 3, 2, 3, 5, 5]
                }, {
                    type: 'column',
                    name: 'Dokumen Teknis',
                    data: [1, 2, 1, 2, 1, 2, 1, 2, 1, 1, 1, 2]
                }, {
                    type: 'column',
                    name: 'Laporan Teknis',
                    data: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
                }, {
                    type: 'spline',
                    yAxis: 1,
                    name: 'Poin Kerekayasaan',
                    data: [2.5, 3.2, 1.4, 2.5, 3.3, 5.7, 3.9, 4.4, 7.0, 2.4, 5.2, 6.1],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }]
        });
    });

    $(function () {
        var workload = Highcharts.chart('pointdistcontainer', {
            title: {
                text: 'Akumulasi Kinerja Program Litbangyasa'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Poin Kerekayasaan'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Drone',
                    data: [3.2, 4.4, 3.5, 2.8, 3.5, 2.0, 3.0, 4.9, 2.1, 3.5, 4.5, 4.2]
                }, {
                    type: 'column',
                    name: 'Kapal Selam Mini',
                    data: [4.0, 3.0, 2.5, 3.2, 3.5, 4.5, 2.1, 3.3, 2.4, 4.0, 2.5, 2.5]
                }, {
                    type: 'column',
                    name: 'Lain-lain',
                    data: [2.6, 3.8, 2.5, 3.0, 2.0, 3.5, 2.1, 2.2, 5.5, 2.5, 2.3, 3.5]
                }]
        });
    });

</script>
</html>

