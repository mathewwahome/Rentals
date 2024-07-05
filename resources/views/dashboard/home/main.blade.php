<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-12">
        <div class="row">

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Web Users</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $webusers }}</h6>
                    <span class="text-muted small pt-2 ps-1">Web Users</span>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">App User</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $appusers }}</h6>
                    <span class="text-muted small pt-2 ps-1">App Users</span>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">



              <div class="card-body">
                <h5 class="card-title">Total Clients</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $t_clients }}</h6>
                    <span class="text-muted small pt-2 ps-1">Total Clients</span>

                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Total Houses</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $t_houses }}</h6>
                    <span class="text-muted small pt-2 ps-1">Total Houses</span>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Sales',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">



              <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th class="col">ID</th>
                      <th class="col">Profile</th>
                      <th class="col">Name</th>
                      <th class="col">Email</th>
                      <th class="col">Phone</th>
                      <th class="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($latestclients as $latestclient)
                    <tr>
                      <td class="serial">{{ $latestclient->id }}</td>
                      <td class="avatar">
                        <div class="round-img">
                          <a href="#"><img class="rounded-circle" src="images/user/default.png" alt=""></a>
                        </div>
                      </td>
                      <td> {{ $latestclient->client_name }} </td>
                      <td> {{ $latestclient->email }} </td>
                      <td><span class="count">{{ $latestclient->phone }}</span></td>
                      <td>
                        <div class="row ml-2">
                          <form action="{{ route('client.view') }}" method="POST">
                            @csrf
                            <input type="hidden" name="client_id" value="{{ $latestclient->id }}">
                            <button class="btn btn-success" type="submit"><i class="ti ti-book"></i></button>
                          </form>
                          <a class="btn btn-secondary ml-2" href="{{ route('single.client', ['client' => $latestclient->id]) }}"><i class="fa fa-pencil"></i></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                <div class="activity">

                  <div class="activity-item d-flex">
                    <div class="activite-label">32 min</div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                    </div>
                  </div>
                  <div class="activity-item d-flex">
                    <div class="activite-label">56 min</div>
                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                    <div class="activity-content">
                      Voluptatem blanditiis blanditiis eveniet
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">2 hrs</div>
                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                    <div class="activity-content">
                      Voluptates corrupti molestias voluptatem
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">1 day</div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content">
                      Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">2 days</div>
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                      Est sit eum reiciendis exercitationem
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">4 weeks</div>
                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                    <div class="activity-content">
                      Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                    </div>
                  </div><!-- End activity item-->

                </div>

              </div>
            </div>
          </div><!-- End Recent Activity -->

          <!-- Website Traffic -->
          <div class="col-6">

            <div class="card">


              <div class="card-body pb-0">
                <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: 1048,
                            name: 'Search Engine'
                          },
                          {
                            value: 735,
                            name: 'Direct'
                          },
                          {
                            value: 580,
                            name: 'Email'
                          },
                          {
                            value: 484,
                            name: 'Union Ads'
                          },
                          {
                            value: 300,
                            name: 'Video Ads'
                          }
                        ]
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Website Traffic -->
          </div><!-- End Website Traffic -->

        </div>
      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->