<!-- BEGIN CONTENT -->
<div class="page-content-wrapper event hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN EVENT -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Events</h1>
        <!-- END PAGE TITLE-->

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Distributed Events</span>
                </div>
            </div>
            <div class="portlet-body">

                <!-- main table -->
                <div class="table-content"></div>
                <script class="template-table-content" type="text/template7">
                    <div class="table-scrollable">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Country </th>
                                    <th> League </th>
                                    <th> Event </th>
                                    <th> Prediction </th>
                                    <th> Odd </th>
                                    <th> Score </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{#each events}}
                                <tr data-id="{{id}}">
                                    <td>{{id}}</td>
                                    <td>{{country}}</td>
                                    <td>{{league}}</td>
                                    <td>{{homeTeam}} - {{awayTeam}}</td>
                                    <td>{{predictionId}}</td>
                                    <td>{{odd}}</td>
                                    <td>{{result}}</td>
                                    <td>{{statusId}}</td>
                                    <td>
                                        <button class="btn blue edit">Edit</button>
                                    </td>
                                </tr>
                                {{else}}
                                <tr>
                                    <td colspan="9">--- No events distributed in packages ---</td>
                                </tr>
                                {{/each}}
                            </tbody>
                        </table>
                    </div>
                </script>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->

        <!-- END TIPS DISTRIBUTION -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<!-- START EDIT SEND HOUR -->
<div class="modal fade" id="edit_send_hour" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Change Send Hour</h4>
            </div>
            <div class="modal-body">
                <label class="control-label">Choose Date</label>
                <input type="text" value="2:30 PM" data-format="hh:mm A" class="form-control clockface_1" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END EDIT SEND HOUR -->

<!-- START PREVIEW AND SEND -->
<div class="modal fade" id="preview_and_send" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Preview and Send</h4>
            </div>
            <div class="modal-body">
                <label class="control-label">Pack: Payfortips - 2 Tips</label>
                <div class="form-group">
                    <div name="summernote" id="summernote_1"> </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Send</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END PREVIEW AND SEND -->


<!-- START MANAGE USERS -->
<div class="modal fade" id="manage_users" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Manage Users</h4>
            </div>
            <div class="modal-body">
                <div class="panel-group accordion" id="accordion3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> User 1 - <span class="label label-danger">3/2</span> </a>
                            </h4>
                        </div>
                        <div id="collapse_3_1" class="panel-collapse in">
                            <div class="table-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Country </th>
                                            <th> League </th>
                                            <th> Event </th>
                                            <th> Prediction </th>
                                            <th> Odd </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> User 1 - <span class="label label-success">2/2</span> </a>
                            </h4>
                        </div>
                        <div id="collapse_3_2" class="panel-collapse collapse">
                            <div class="table-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Country </th>
                                            <th> League </th>
                                            <th> Event </th>
                                            <th> Prediction </th>
                                            <th> Odd </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> User 1 - <span class="label label-success">2/2</span> </a>
                            </h4>
                        </div>
                        <div id="collapse_3_3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Country </th>
                                            <th> League </th>
                                            <th> Event </th>
                                            <th> Prediction </th>
                                            <th> Odd </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4"> User 1 - <span class="label label-success">2/2</span> </a>
                            </h4>
                        </div>
                        <div id="collapse_3_4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Country </th>
                                            <th> League </th>
                                            <th> Event </th>
                                            <th> Prediction </th>
                                            <th> Odd </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                        <tr>
                                            <td> <input type="checkbox"> </td>
                                            <td> Romania </td>
                                            <td> Liga 1 </td>
                                            <td> Steaua - Dinamo </td>
                                            <td> Over 2.5 </td>
                                            <td> 1.85 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MANAGE USERS -->
