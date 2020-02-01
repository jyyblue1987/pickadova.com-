@extends('admin.layouts.app')

@section('content')


<section class="content dashboard">

<div class="dashboard-heading">
<div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box infobox-type-3 bg-success">
                            <div class="icon"><i class="material-icons">group</i></div>
                            <div class="content" style="min-height: 1464px;">
                                <div class="text">Users</div>
                                <div class="number count-to" data-from="0" data-to="245" data-speed="1000" data-fresh-interval="20">{{$total_user}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box infobox-type-3 bg-primary">
                            <div class="icon"><i class="material-icons">favorite</i></div>
                            <div class="content" style="min-height: 1464px;">
                                <div class="text">Advertiser</div>
                                <div class="number count-to" data-from="0" data-to="348" data-speed="1000" data-fresh-interval="20">{{$total_advertiser}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box infobox-type-3 bg-warning">
                            <div class="icon"><i class="material-icons">face</i></div>
                            <div class="content" style="min-height: 1464px;">
                                <div class="text">Browsers</div>
                                <div class="number count-to" data-from="0" data-to="143" data-speed="1000" data-fresh-interval="20">{{$total_browser}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box infobox-type-3 bg-danger">
                            <div class="icon"><i class="material-icons">bookmark</i></div>
                            <div class="content" style="min-height: 1464px;">
                                <div class="text">LIKES</div>
                                <div class="number count-to" data-from="0" data-to="2158" data-speed="1500" data-fresh-interval="20">2158</div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<div class="page-body weather-station">

<div class="main-graph">
<div class="row clearfix">
<div class="col-xs-12 col-sm-6 col-md-8 col-lg-10 padding-0 overflow-hidden">
<div class="graph-area">
<div id="line_chart"></div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
<div class="stats-area overflow-hidden">
<div class="total">
<span class="col-success">$27 525</span>
<small>Total Income</small>
</div>
<div class="stats">$9 225</div>
<span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
<p>MasterCard Payments</p>
<div class="stats">$9 300</div>
<span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
<p>Visa Payments</p>
<div class="stats">$8 250</div>
<span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
<p>Paypal Payments</p>
</div>
</div>
</div>
</div>

<div class="row clearfix">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

<div class="panel panel-default">
<div class="panel-heading">LAST 5 COMMENTS</div>
<div class="panel-body">
<div class="comment-box">
<ul>
<li>
<div class="media">
<div class="media-left">
<a href="javascript:void(0);">
<img src="../../images/avatars/face2.jpg" alt="User Avatar" />
</a>
</div>
<div class="media-body">
<div class="username">John Doe</div>
<div class="comment">Lorem ipsum dolor sit amet, vel fugit abhorreant ei.</div>
<div class="time">2 mins ago</div>
</div>
</div>
</li>
<li>
<div class="media">
<div class="media-left">
<a href="javascript:void(0);">
<img src="../../images/avatars/face6.jpg" alt="User Avatar" />
</a>
</div>
 <div class="media-body">
<div class="username">Maria Doe</div>
<div class="comment">Lorem ipsum dolor sit amet, vel fugit abhorreant ei...</div>
<div class="time">30 mins ago</div>
</div>
</div>
</li>
<li>
<div class="media">
<div class="media-left">
<a href="javascript:void(0);">
<img src="../../images/avatars/face3.jpg" alt="User Avatar" />
</a>
</div>
<div class="media-body">
<div class="username">Everett Hunt</div>
<div class="comment">Vel ex audiam virtute mediocritatem, quo.</div>
<div class="time">1 hour ago</div>
</div>
</div>
</li>
<li>
<div class="media">
<div class="media-left">
<a href="javascript:void(0);">
<img src="../../images/avatars/face7.jpg" alt="User Avatar" />
</a>
</div>
<div class="media-body">
<div class="username">Connie Craig</div>
<div class="comment">Duo enim harum moderatius et, sed ex oblique persius labor...</div>
<div class="time">2 hours ago</div>
</div>
</div>
</li>
<li>
<div class="media">
<div class="media-left">
<a href="javascript:void(0);">
<img src="../../images/avatars/face5.jpg" alt="User Avatar" />
</a>
</div>
<div class="media-body">
<div class="username">Bran Craig</div>
<div class="comment">Eam te rebum legere urbanitas. Et vitae verear...</div>
<div class="time">2 hours ago</div>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">TODO LIST</div>
 <div class="panel-body">
<div class="input-group m-b-15">
<input type="text" placeholder="Please add to-do item..." class="input input-sm form-control js-input">
<span class="input-group-btn">
<button type="button" class="btn btn-sm btn-default js-btn-add-item"> <i class="fa fa-plus m-r-5"></i>Add item</button>
</span>
</div>
<ul class="todo-list">
<li class="closed">
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" checked="checked" />
<span>Lorem ipsum dolor sit amet, mel id minimum maluisset.</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Nec graeci essent luptatum cu, te mei sale essent impedit.</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Mel ex graecis accusam atomorum. In vitae decore maiorum est.</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Duo an suscipit scriptorem, ne nec melius periculis definiebas.</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Has dictas constituto disputando an.</span>
 <span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>At errem altera assueverit sed, qui laoreet delectus incorrupte cu.</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Duo no aperiri detracto, omnis solet no qui...</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Mutat etiam ad mea, iisque comprehensam</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
<li>
<a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
<input type="checkbox" />
<span>Nam bonorum salutatus ei, vix iudicabit expetendis cu</span>
<span class="controls pull-right">
<a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
</span>
</li>
</ul>
</div>
</div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="panel panel-default">
<div class="panel-heading">ONLINE USERS</div>
<div class="panel-body">
<div id="world-map-markers" class="jvector-map"></div>
 <table class="table table-hover">
<thead>
<tr>
<th>Country</th>
<th>Total Visits For Today</th>
<th>Online Users</th>
</tr>
</thead>
<tbody>
<tr>
<td>USA</td>
<td>12521</td>
<td>1624</td>
</tr>
<tr>
<td>Canada</td>
<td>7521</td>
<td>1124</td>
</tr>
<tr>
<td>Venezuela</td>
<td>3142</td>
<td>125</td>
</tr>
<tr>
<td>Argentina</td>
<td>1479</td>
<td>918</td>
</tr>
<tr>
<td>Russia</td>
<td>14479</td>
<td>1800</td>
</tr>
<tr>
<td>Turkey</td>
<td>14479</td>
<td>1250</td>
</tr>
<tr>
<td>Germany</td>
<td>9780</td>
<td>1120</td>
</tr>
<tr>
<td>Australia</td>
<td>4712</td>
<td>417</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</section>

@endsection
@section('script')
<script type="text/javascript">
    
        // Init flot chart
        var flotChartDatas = [[[0, 21], [1, 12], [2, 27], [3, 12], [4, 16], [5, 20], [6, 15], [7, 12], [8, 35], [9, 20], [10, 10], [11, 18], [12, 12]], [[0, 3], [1, 9], [2, 15], [3, 9], [4, 16], [5, 8], [6, 15], [7, 12], [8, 19], [9, 14], [10, 10], [11, 16], [12, 10]]];
        var flotChartOptions = {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                points: {
                    show: false,
                    radius: 5,
                    width: 5
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.3
                },
                shadowSize: 0
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: '#f0f0f0',
                borderWidth: 1,
                color: '#f0f0f0'
            },
            colors: ['#d0d0d0', '#1ab394'],
            yaxis: {
                ticks: 4
            }
        }

        setTimeout(initFlotChart, 550);
        function initFlotChart() {
            $.plot('#line_chart', flotChartDatas, flotChartOptions);
        }

        $('.js-toggle-left-sidebar').on('click', function () {
            setTimeout(initFlotChart, 500);
        });
        window.onresize = function (e) {
            initFlotChart();
        };

        //Init peity chart
        $("span.pie")
            .peity("pie",
            {
                fill: ['#009688', '#ddd']
            });

                   //Online Users - jvectorMap
        var onlineUsers = { 'TR': 1250, 'DE': 1120, 'RU': 1800, 'AR': 918, 'CA': 1122, 'US': 1624, 'HU': 242, 'VE': 125, 'AU': 417 };
        var $el = $('#world-map-markers');

        $el.vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    'fill': 'rgba(210, 214, 222, 1)',
                    'fill-opacity': 1,
                    'stroke': 'none',
                    'stroke-width': 0,
                    'stroke-opacity': 1
                },
                hover: {
                    'fill-opacity': 0.7,
                    'cursor': 'pointer'
                },
                selected: {
                    'fill': 'yellow'
                },
                selectedHover: {}
            },
            series: {
                regions: [{
                    values: onlineUsers,
                    scale: ['#a7dad5', '#009688'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function (e, el, code) {
                if (onlineUsers[code] !== undefined) {
                    el.html(el.html() + ': ' + onlineUsers[code] + ' online users');
                }
            }
        });

        //Online user table
        $('.jvector-map + table').dataTable({
            sorting: [[2, 'desc']],
            pageLength: 5,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });
   
    
</script>
@endsection