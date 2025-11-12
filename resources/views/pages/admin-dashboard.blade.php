@extends('layouts.admin.app')

@section('content')

    <body>
        <div id="app">
            <div id="main">


                <div class="main-content container-fluid">
                    <div class="page-title">
                        <h3 style="font-size: 22px; font-weight: 600; color: #000000; text-transform: uppercase; letter-spacing: 1px; border-left: 4px solid #0d6efd; padding-left: 10px;">Dashboard</h3>
                        <br>
                        <h4
                            style="font-size: 18px; font-weight: 600; color: #0d6efd; text-transform: uppercase; letter-spacing: 1px; border-left: 4px solid #0d6efd; padding-left: 10px;">
                            Daftar Peminjaman Ruang Desa
                        </h4>
                        <p class="text-subtitle text-muted">Website ini dirancang untuk memudahkan masyarakat dalam melakukan
                            peminjaman fasilitas dan ruang publik milik desa, seperti aula pertemuan, lapangan, gedung
                            serbaguna, serta perlengkapan kegiatan masyarakat.</p>
                    </div>
                    <section class="section">
                        <div class="row mb-2">
                            <div class="col-12 col-md-3">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class='px-3 py-3 d-flex justify-content-between align-items-center'>
                                                <h3 class='card-title mb-0'>
                                                    <i class="fa-solid fa-users me-2 text-blue"></i> JUMLAH WARGA
                                                </h3>
                                                <div class="card-right d-flex align-items-center">
                                                    <p class="fs-3 fw-bold text-black mb-0">
                                                        {{ $jumlahWarga }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="chart-wrapper">
                                                <canvas id="canvas1" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="pl-3">
                                                        <p class='text-xs'><span class="text-green"><i
                                                                    data-feather="bar-chart" width="15"></i> +19%</span>
                                                            than last month</p>
                                                        <div class="legends">
                                                            <div class="legend d-flex flex-row align-items-center">
                                                                <div class='w-3 h-3 rounded-full bg-info mr-2'></div><span
                                                                    class='text-xs'>Last Month</span>
                                                            </div>
                                                            <div class="legend d-flex flex-row align-items-center">
                                                                <div class='w-3 h-3 rounded-full bg-blue mr-2'></div><span
                                                                    class='text-xs'>Current Month</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <canvas id="bar"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title">Orders Today</h4>
                                            <div class="d-flex ">
                                                <i data-feather="download"></i>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pb-0">
                                            <div class="table-responsive">
                                                <table class='table mb-0' id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Graiden</td>
                                                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                                                            <td>076 4820 8838</td>
                                                            <td>Offenburg</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dale</td>
                                                            <td>fringilla.euismod.enim@quam.ca</td>
                                                            <td>0500 527693</td>
                                                            <td>New Quay</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nathaniel</td>
                                                            <td>mi.Duis@diam.edu</td>
                                                            <td>(012165) 76278</td>
                                                            <td>Grumo Appula</td>
                                                            <td>
                                                                <span class="badge bg-danger">Inactive</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Darius</td>
                                                            <td>velit@nec.com</td>
                                                            <td>0309 690 7871</td>
                                                            <td>Ways</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ganteng</td>
                                                            <td>velit@nec.com</td>
                                                            <td>0309 690 7871</td>
                                                            <td>Ways</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Oleg</td>
                                                            <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                                            <td>0500 441046</td>
                                                            <td>Rossignol</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kermit</td>
                                                            <td>diam.Sed.diam@anteVivamusnon.org</td>
                                                            <td>(01653) 27844</td>
                                                            <td>Patna</td>
                                                            <td>
                                                                <span class="badge bg-success">Active</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <h4><i class="fa-solid fa-clock me-2"></i>Waktu Sekarang</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="clock" class="display-4 fw-bold text-dark mb-3"></div>
                                            <h6 class="text-muted">Zona Waktu: WIB</h6>
                                        </div>
                                    </div>

                                    <div class="card widget-todo mt-4">
                                        <div
                                            class="card-header border-bottom d-flex justify-content-between align-items-center">
                                            <h4 class="card-title d-flex align-items-center">
                                                <i class="fa-solid fa-list-check me-2 text-primary"></i>Progress
                                            </h4>
                                        </div>
                                        <div class="card-body px-0 py-1">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td class="col-3">UI Design</td>
                                                    <td class="col-6">
                                                        <div class="progress progress-info">
                                                            <div class="progress-bar" style="width: 60%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="col-3 text-center">60%</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-3">VueJS</td>
                                                    <td class="col-6">
                                                        <div class="progress progress-success">
                                                            <div class="progress-bar" style="width: 35%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="col-3 text-center">35%</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-3">Laravel</td>
                                                    <td class="col-6">
                                                        <div class="progress progress-danger">
                                                            <div class="progress-bar" style="width: 50%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="col-3 text-center">50%</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-3">ReactJS</td>
                                                    <td class="col-6">
                                                        <div class="progress progress-primary">
                                                            <div class="progress-bar" style="width: 80%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="col-3 text-center">80%</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-3">Go</td>
                                                    <td class="col-6">
                                                        <div class="progress progress-secondary">
                                                            <div class="progress-bar" style="width: 65%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="col-3 text-center">65%</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Fungsi untuk menampilkan jam real-time
                                    function updateClock() {
                                        const now = new Date();
                                        const hours = now.getHours().toString().padStart(2, '0');
                                        const minutes = now.getMinutes().toString().padStart(2, '0');
                                        const seconds = now.getSeconds().toString().padStart(2, '0');
                                        document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
                                    }

                                    // Update setiap detik
                                    setInterval(updateClock, 1000);
                                    updateClock();
                                </script>

                            </div>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-left">
                            <p>2020 &copy; Voler</p>
                        </div>
                        <div class="float-right">
                            <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                    href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    </body>
@endsection
