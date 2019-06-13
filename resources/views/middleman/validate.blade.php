@extends('main.base')

@section('title', "Report Validation")

@section('page-css')

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />


<!-- ================== END PAGE LEVEL STYLE ================== -->

@endsection

@section('page-js')

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{{--CAROUSEl--}}


<script src="{{asset('carousel/dist/util.js')}}"></script>
<script src="{{asset('carousel/dist/carousel.js')}}"></script>

<script src="{{asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
{{--Modals--}}
<script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        Notification.init();
    });
    $("td").css("font-size",16)



</script>

{{--For Edit button--}}
<script>
    var Editform = document.getElementById("EditForm");

    $("a[id='EditBTN']").on('click',function () {


        var barid = $('#EditBarangayID').val()
        var barname = $('#EditBarangayName').val()
        var barseal = $('#EditBarangaySeal')[0].files[0]

        var fd= new FormData();
        fd.append('EditBarangayID',barid)
        fd.append('EditBarangayName',barname)
        fd.append('EditBarangaySeal',barseal);
        fd.append('_token',"{{csrf_token()}}");

        if(barname == "" || $('#EditBarangaySeal').val()=="")
        {
            $('#ReqBarangayNameEdit').html('Required field!').css('color', 'red');
            $('#ReqBarangaySealEdit').html('Required field!').css('color', 'red');
            swal({
                title: 'Ooops!',
                text: 'Please fill out the necessary fields!',
                icon: 'error',
                buttons: {
                    confirm: {
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true,
                    }
                }

            });
        }
        else
        {
            swal({
                title: "Wait!",
                text: "Are you sure you want to edit this?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data have been successfully updated!", {
                        icon: "success",

                    });
                    setTimeout(function(){ 
                        $.ajax({
                            url:'EditBarangay',
                            type:'post',
                            processData:false,
                            contentType:false,
                            cache:false,
                            data:fd,
                            success:function()
                            {


                                location.reload();
                            }


                        })
                    }, 1000);
                } else {
                    swal("Operation Cancelled.", {
                        icon: "error",
                    });
                }
            });

        }

    });
</script>

{{--For Modal VIEW Form--}}
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".viewCategory").click(function()
        {
            $("#ViewReportID").val($(this).closest("tbody tr").find("th:eq(0)").html());

            $("#ViewReportCode").text($(this).closest("tbody tr").find("td:eq(0)").html());

            $("#ViewName").text($(this).closest("tbody tr").find("td:eq(1)").html());

            $("#ViewReportType").text($(this).closest("tbody tr").find("td:eq(2)").text());            

            $("#ViewReportDescription").text($(this).closest("tbody tr").find("td:eq(3)").text());

            $("#ViewReportDate").text($(this).closest("tbody tr").find("td:eq(4)").text());


                //LOAD REPORT ATTACHMENT

                $.ajax({
                    url:'{{route("LoadReportAttachments")}}',
                    type:'post',
                    data:{'ReportID':$(this).closest("tbody tr").find("th:eq(0)").html(),'_token':'{{csrf_token()}}'},
                    dataType:'json',
                    success:function(data)
                    {

                        data.map(item=>{

                            $("#ReportAttachmentsCarousel").append(" <div class='carousel-item' style='overflow:hidden'> <embed src='report_images/"+item.ReportFileName+"' style='width:700px; height:500px;  object-fit: fill; '/></div>")
                            $('.carousel-inner').find('.carousel-item').first().addClass('active');
                        });

                    }

                })

                
            });








        // SEND TO OSAS BUTTON
        $('#InvalidReportBtn').click(function(){


            ReportID=$(this).closest("tbody tr").find("th:eq(0)").html();


            swal({
                title: "Wait!",
                text: "Are you sure you want to remove this report?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data have been successfully remove!", {
                        icon: "success",

                    });
                    setTimeout(function(){ 
                        $.ajax({
                            url:'{{route("RemoveReport")}}',
                            type:'post',

                            cache:false,
                            data:{'ReportID':ReportID,'_token':'{{csrf_token()}}'},
                            success:function()
                            {


                                location.reload();
                            }


                        })
                    }, 1000);
                } else {
                    swal("Operation Cancelled.", {
                        icon: "error",
                    });
                }
            });

        });



    });



    function SendToOfficials(SendTo)
    {   

        report_id=$("#ViewReportID").val();

        swal({
            title: 'Success!',
            text: 'Successfully send to Office of Student Affairs and Services',
            icon: 'success',

        } );
        setTimeout(function(){
            $.ajax({
                url:'{{route("SendToOfficials")}}',
                type:'post',                    
                cache:false,
                data:{'ReportID':report_id,'_token':'{{csrf_token()}}','SendTo':SendTo},
                success:function()
                {
                    location.reload();

                }


            })

        }, 1000);


    }
</script>

{{--For Modal EDIT Form--}}
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".editCategory").click(function()
        {
            $("#EditBarangayID").val($(this).closest("tbody tr").find("td:eq(0)").html());
            $("#EditBarangayName").val($(this).closest("tbody tr").find("td:eq(1)").html());
            $("#EditBarangaySeal").val($(this).closest("tbody tr").find("td:eq(2)").html());
        });
    });
</script>

{{--For ADD FORM--}}
<script>
    var Addform = document.getElementById("AddForm");

    $('#AddBTN').click(function(){
        var barname = $('#BarangayNameTxt').val()
        var barseal = $('#BarangaySealTxt')[0].files[0]
        var fd= new FormData();
        fd.append('BarangayNameTxt',barname)
        fd.append('BarangaySealTxt',barseal);
        fd.append('_token',"{{csrf_token()}}");

        if(barname == "" || $('#BarangaySealTxt').val() ==""){
            $('#ReqBarangayNameTxt').html('Required field!').css('color', 'red');
            $('#ReqBarangaySealTxt').html('Required field!').css('color', 'red');
            swal({
                title: 'Ooops!',
                text: 'Please fill out the necessary fields!',
                icon: 'error',
                buttons: {
                    confirm: {
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true,
                    }
                }

            })
        }
        else {
            swal({
                title: 'Success!',
                text: 'Category successfully added.',
                icon: 'success',

            } );
            setTimeout(function(){
                $.ajax({
                    url:'AddBarangay',
                    type:'post',
                    processData:false,
                    contentType:false,
                    cache:false,
                    data:fd,
                    success:function()
                    {


                    }


                })

            }, 1000);

        }
    });
</script>

















@endsection



@section('content')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Report Validation</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div >

        <!-- begin col-10 -->
        <div>
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading" style="background-color:maroon">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                    </div>
                    <h4 class="panel-title">Report Validation</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin alert -->
                <div class="alert alert-yellow fade show">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Report Validation list of reports that are for validation. 
                </div>
                <!-- end alert -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <br>
                    <br>

                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th hidden>Report ID </th>
                                <th>Report Code </th>
                                <th>Name </th>
                                <th>Report Type</th>
                                <th>Report Description</th>
                                <th>Date</th>

                                <th style="width: 15%">Actions </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($DisplayData as $value)


                            <tr >

                                <th hidden>{{$value->ReportID}} </th>

                                <td>{{$value->ReportCode}}</td>
                                <td>{{$value->LastName}}, {{$value->FirstName}} {{$value->MiddleName}}</td>
                                <td> {{$value->ReportTypeDescription}}:<br>{{$value->ReportSubTypeDescription}}:</td>
                                <td>{{$value->ReportDescription}} </td>
                                <td>{{$value->ReportDate}}</td>



                                <td>
                                    <button type='button' class='btn btn-warning viewCategory ' data-toggle='modal' data-target='#ViewModal' >
                                        <i class='fa fa-eye'></i> View
                                    </button>

                                    <button type='button' class='btn btn-danger editCategory ' id="InvalidReportBtn">
                                        <i class='fa fa-trash'></i> trash
                                    </button>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <!-- #modal-EDIT -->
                    <div class="modal fade" id="UpdateModal">
                        <div class="modal-dialog" style="max-width: 30%">
                            <form id="EditForm" method="POST" action="">
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #008a8a">
                                        <h4 class="modal-title" style="color: white">Edit Barangay</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                    </div>
                                    <div class="modal-body">
                                        {{--modal body start--}}
                                        <label class="form-label hide">Barangay ID</label>
                                        <input id="EditBarangayID" name="EditBarangayID" type="text" class="form-control hide" name="CategoryID"/>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Barangay Name</label> <span id='ReqBarangayNameEdit'></span>
                                                <input style="text-transform: capitalize;" id="EditBarangayName" name="EditBarangayName" class="form-control"  placeholder="e.g.: Merchandising" required="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Barangay Seal</label> <span id='ReqBarangaySealEdit'></span>
                                                <input type="file" id="EditBarangaySeal" name="EditBarangaySeal" class="form-control" required="true" placeholder="Briefly define the category" >
                                            </div>
                                        </div>
                                        {{--modal body end--}}
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                        {{--<a id="DeleteBTN" href="javascript:;" class="btn btn-danger">Delete</a>--}}
                                        <a id="EditBTN" href="javascript:;" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- #modal-view -->
                    <div class="modal fade" id="ViewModal">
                        <div class="modal-dialog" style="max-width: 60%; max-height: 100%">
                            <form id="ViewForm">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #f59c1a">
                                        <h4 class="modal-title" style="color: white">View Report</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                    </div>
                                    <div class="modal-body">
                                        {{--modal body start--}}
                                        <input id="ViewReportID" name="ReportID" hidden>
                                        <h2 id="ViewReportCode" align="center"></h2>
                                        <label style="display: block; text-align: center">Report Code</label>

                                        <br>
                                        <h2 id="ViewName" align="center"></h2>
                                        <label style="display: block; text-align: center">Name</label>
                                        <br>

                                        <h2 id="ViewReportDate" align="center"></h2>
                                        <label style="display: block; text-align: center">Report Date</label>
                                        <br> 

                                        <h2 id="ViewReportType" align="center"></h2>
                                        <label style="display: block; text-align: center">Report Type </label>
                                        <br>   

                                        <h4 id="ViewReportDescription" align="center"></h4>
                                        <label style="display: block; text-align: center">Report Description</label>
                                        <br>      
                                        {{--REPORT ATTACHMENTS--}}
                                        <center >

                                           <!-- CAROUSEL  -->


                                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width: 700px; height:500px; ">

                                            <div class="carousel-inner" id="ReportAttachmentsCarousel">

                                            </div>
                                            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                          </a>
                                      </div>


                                      <br> 
                                      <label>Report Attachments</label>
                                  </center>
                                  <br>

                                  {{--modal body end--}}
                              </div>
                              <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

                                <div class="btn-group">
                                  <a  class="btn btn-yellow">Validate and Send to</a>
                                  <a href="#" class="btn btn-yellow dropdown-toggle"
                                  data-toggle="dropdown"></a>
                                  <ul class="dropdown-menu pull-right">
                                    <li><a  onclick="SendToOfficials('OSAS')" data-dismiss="modal">Office of Student Affairs and Services</a></li>
                                    <li><a  onclick="SendToOfficials('Guidance Counselor')">Guidance Counselor </a></li>


                                </ul>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- #modal-add -->
        <div class="modal fade" id="AddModal">
            <div class="modal-dialog" style="max-width: 30%">
                <form id="AddForm" method="POST">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#6C9738;">
                            <h4 class="modal-title" style="color: white">Add Barangay Setup</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                         {{--modal body start--}}
                         <div class="col-lg-12">
                            <div class="form-group">
                                <label>Barangay Name</label> <span id='ReqBarangayNameTxt'></span>
                                <input style="text-transform: capitalize;" id="BarangayNameTxt" name="BarangayNameTxt" class="form-control"  placeholder="e.g.: Gaya-Gaya" required="true">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Barangay Seal</label> <span id='ReqBarangaySealTxt'></span>
                                <input type="file" id="BarangaySealTxt" name="BarangaySealTxt" class="form-control" required="true" placeholder="Barangay seal here..." >
                            </div>
                        </div>
                        {{--modal body end--}}
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" id="AddCloseBtn" data-dismiss="modal">Close</a>
                        <a id="AddBTN" href="javascript:;" class="btn btn-lime">Add</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end panel-body -->
</div>
<!-- end panel -->
</div>
<!-- end col-10 -->
</div>

<!-- end row -->
</div>

<!-- end #content -->




@endsection