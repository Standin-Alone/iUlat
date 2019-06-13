@extends('main.base')

@section('page-js')

    <script>
        $(document).ready(function() {
            App.init();
        });

    </script>
@endsection

@section('title', "Home")

@section ('content')

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('assets/code/highcharts.js')}}"></script>
    <script src="{{asset('assets/code/modules/data.js')}}"></script>
    <script src="{{asset('assets/code/modules/drilldown.js')}}"></script>
    <script src="{{asset('assets/code/modules/exporting.js')}}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->


    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        </ol>
        <!-- end breadcrumb -->

        <!-- begin page-header -->
        <h1 class="page-header">Dashboard </h1>
        <!-- end page-header -->

        <!-- begin row -->

        <div class="row">
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-blue">
                    <div class="stats-icon"><i class="fas fa-users"></i></div>
                    <div class="stats-info">
                        <h4>Total Taga-Ulat</h4>
                        <p>{{$CountTagaUlat}}</p>
                    </div>
                    <div class="stats-link">
                        <a href="#">View Details <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-green">
                    <div class="stats-icon"><i class="fas fa-building"></i></div>
                    <div class="stats-info">
                        <h4>Total Reports</h4>
                        <p>{{$CountReports}}</p>
                    </div>
                    <div class="stats-link">
                        <a href="#">View Details <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats  bg-red">
                    <div class="stats-icon"><i class="fas fa-gavel"></i></div>
                    <div class="stats-info">
                        <h4>Total Validated Reports</h4>
                        <p>122</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Details <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats  bg-orange">
                    <div class="stats-icon"><i class="fa fa-file-alt"></i></div>
                    <div class="stats-info">
                        <h4>Total Invalid Reports</h4>
                        <p>79</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Details <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->

        

        <!-- begin chart -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="blotters" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <script type="text/javascript">

            // Create the chart
            Highcharts.chart('blotters', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Reports Per Year'
                },
                subtitle: {
                    text: 'Click the columns to view months.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total blotter records'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
                },

                "series": [
                    {
                        "name": "Years",
                        "colorByPoint": true,
                        "data": [
                            {
                                "name": "2015",
                                "y": 62,
                                "drilldown": "2015"
                            },
                            {
                                "name": "2016",
                                "y": 77,
                                "drilldown": "2016"
                            },
                            {
                                "name": "2017",
                                "y": 65,
                                "drilldown": "2017"
                            },
                            {
                                "name": "2018",
                                "y": 160,
                                "drilldown": "2018"
                            },
                            {
                                "name": "2019",
                                "y": 99,
                                "drilldown": "2019"
                            }

                        ]
                    }
                ],
                "drilldown": {
                    "series": [
                        {
                            "name": "2015",
                            "id": "2015",
                            "data": [
                                [
                                    "January",
                                    2
                                ],
                                [
                                    "February",
                                    5
                                ],
                                [
                                    "March",
                                    5
                                ],
                                [
                                    "April",
                                    7
                                ],
                                [
                                    "May",
                                    1
                                ],
                                [
                                    "June",
                                    8
                                ],
                                [
                                    "July",
                                    4
                                ],
                                [
                                    "August",
                                    5
                                ],
                                [
                                    "September",
                                    6
                                ],
                                [
                                    "October",
                                    3
                                ],
                                [
                                    "November",
                                    3
                                ],
                                [
                                    "December",
                                    10
                                ]
                            ]
                        },
                        {
                            "name": "2016",
                            "id": "2016",
                            "data": [
                                [
                                    "January",
                                    2
                                ],
                                [
                                    "February",
                                    5
                                ],
                                [
                                    "March",
                                    5
                                ],
                                [
                                    "April",
                                    7
                                ],
                                [
                                    "May",
                                    1
                                ],
                                [
                                    "June",
                                    8
                                ],
                                [
                                    "July",
                                    4
                                ],
                                [
                                    "August",
                                    5
                                ],
                                [
                                    "September",
                                    6
                                ],
                                [
                                    "October",
                                    3
                                ],
                                [
                                    "November",
                                    3
                                ],
                                [
                                    "December",
                                    10
                                ]
                            ]
                        },
                        {
                            "name": "2017",
                            "id": "2017",
                            "data": [
                                [
                                    "January",
                                    2
                                ],
                                [
                                    "February",
                                    5
                                ],
                                [
                                    "March",
                                    5
                                ],
                                [
                                    "April",
                                    7
                                ],
                                [
                                    "May",
                                    1
                                ],
                                [
                                    "June",
                                    8
                                ],
                                [
                                    "July",
                                    4
                                ],
                                [
                                    "August",
                                    5
                                ],
                                [
                                    "September",
                                    6
                                ],
                                [
                                    "October",
                                    3
                                ],
                                [
                                    "November",
                                    3
                                ],
                                [
                                    "December",
                                    10
                                ]
                            ]
                        },
                        {
                            "name": "2018",
                            "id": "2018",
                            "data": [
                                [
                                    "January",
                                    2
                                ],
                                [
                                    "February",
                                    5
                                ],
                                [
                                    "March",
                                    5
                                ],
                                [
                                    "April",
                                    7
                                ],
                                [
                                    "May",
                                    1
                                ],
                                [
                                    "June",
                                    8
                                ],
                                [
                                    "July",
                                    4
                                ],
                                [
                                    "August",
                                    5
                                ],
                                [
                                    "September",
                                    6
                                ],
                                [
                                    "October",
                                    3
                                ],
                                [
                                    "November",
                                    3
                                ],
                                [
                                    "December",
                                    10
                                ]
                            ]
                        },
                        {
                            "name": "2019",
                            "id": "2019",
                            "data": [
                                [
                                    "January",
                                    2
                                ],
                                [
                                    "February",
                                    5
                                ],
                                [
                                    "March",
                                    5
                                ],
                                [
                                    "April",
                                    7
                                ],
                                [
                                    "May",
                                    1
                                ],
                                [
                                    "June",
                                    8
                                ],
                                [
                                    "July",
                                    4
                                ],
                                [
                                    "August",
                                    5
                                ],
                                [
                                    "September",
                                    6
                                ],
                                [
                                    "October",
                                    3
                                ],
                                [
                                    "November",
                                    3
                                ],
                                [
                                    "December",
                                    10
                                ]
                            ]
                        },

                    ]
                }
            });
        </script>
        <!-- end chart-->

        <!-- begin chart -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="issuances" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <script type="text/javascript">

            Highcharts.chart('issuances', {
                title: {
                    text: 'Report Type Throughout the Years '
                },
                xAxis: {
                    categories: ['2015', '2016', '2017', '2018', '2019']
                },
                labels: {
                    items: [{
                        html: 'Total Issuances',
                        style: {
                            left: '50px',
                            top: '18px',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                        }
                    }]
                },
                series: [
                    {
                        type: 'column',
                        name: 'Environment',
                        data: [4, 3, 3, 9, 4]
                    },
                    {
                        type: 'column',
                        name: 'Student Issue',
                        data: [4, 3, 3, 9, 10]
                    },

                    {
                        type: 'spline',
                        name: 'Average',
                        data: [3, 2.67, 3, 6.33, 3],
                        marker: {
                            lineWidth: 2,
                            lineColor: Highcharts.getOptions().colors[3],
                            fillColor: 'white'
                        }
                    },
                    {
                        type: 'pie',
                        name: 'Total Issuances',
                        data: [{
                            name: 'Environment',
                            y: 13,
                            color: Highcharts.getOptions().colors[0] // Jane's color
                        }, {
                            name: 'Student Issue',
                            y: 23,
                            color: Highcharts.getOptions().colors[1] // John's color
                        }, 
                           
                        ],
                        center: [100, 80],
                        size: 100,
                        showInLegend: false,
                        dataLabels: {
                            enabled: false
                        }
                    }
                ]
            });


        </script>

        <!-- end chart-->


    </div>



@endsection
