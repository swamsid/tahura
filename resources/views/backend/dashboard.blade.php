@extends('backend.main')

@section('content')
    @if(Auth::user()->posisi == 'kantor')
        <div class="row border-bottom white-bg dashboard-header">
            <div class="col-sm-3">
                <h2>Selamat Datang</h2>
                <small>You have 42 messages and 6 notifications.</small>
                <ul class="list-group clear-list m-t">
                    <li class="list-group-item fist-item">
                        <span class="pull-right">
                            09:00 pm
                        </span>
                        <span class="label label-success">1</span> Please contact me
                    </li>
                    <li class="list-group-item">
                        <span class="pull-right">
                            10:16 am
                        </span>
                        <span class="label label-info">2</span> Sign a contract
                    </li>
                    <li class="list-group-item">
                        <span class="pull-right">
                            08:22 pm
                        </span>
                        <span class="label label-primary">3</span> Open new shop
                    </li>
                    <li class="list-group-item">
                        <span class="pull-right">
                            11:06 pm
                        </span>
                        <span class="label label-default">4</span> Call back to Sylvia
                    </li>
                    <li class="list-group-item">
                        <span class="pull-right">
                            12:00 am
                        </span>
                        <span class="label label-primary">5</span> Write a letter to Sandra
                    </li>
                </ul>
            </div>

            <div class="col-sm-6">
                <div class="flot-chart dashboard-chart">
                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                </div>
                <div class="row text-left">
                    <div class="col-xs-4">
                        <div class=" m-l-md">
                        <span class="h4 font-bold m-t block">$ 406,100</span>
                        <small class="text-muted m-b block">Sales marketing report</small>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <span class="h4 font-bold m-t block">$ 150,401</span>
                        <small class="text-muted m-b block">Annual sales revenue</small>
                    </div>
                    <div class="col-xs-4">
                        <span class="h4 font-bold m-t block">$ 16,822</span>
                        <small class="text-muted m-b block">Half-year revenue margin</small>
                    </div>

                </div>
            </div>

            <div class="col-sm-3">
                <div class="statistic-box">
                <h4>
                    Project Beta progress
                </h4>
                <p>
                    You have two project.
                </p>
                    <div class="row text-center">
                        <div class="col-lg-6">
                            <canvas id="polarChart" width="80" height="80"></canvas>
                            <h5 >Kolter</h5>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="doughnutChart" width="60" height="60"></canvas>
                            <h5 >Maxtor</h5>
                        </div>
                    </div>
                    <div class="m-t">
                        <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endsection

@section('extra_script')
    <script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Selamat Data {{ Auth::user()->nama }}', 'UPT Tahura Raden Soerjo');

        }, 1300);

        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
            data1, data2
        ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis:{
                    },
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                }
        );

       var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [ 32, 41, 13],
                    backgroundColor: ['#00ff00', '#ff0000', '#0000ff'],
                    label: 'Dataset 1'
                }],
                labels: ['M', 'G', 'K']
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Chart.js Doughnut Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        var ctx = document.getElementById('doughnutChart').getContext('2d');
        window.myDoughnut = new Chart(ctx, config);

        var ctx2 = document.getElementById('polarChart').getContext('2d');
        window.myDoughnut = new Chart(ctx2, config);

    });
</script>
@endsection