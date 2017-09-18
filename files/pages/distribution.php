<!-- BEGIN CONTENT -->
<div class="page-content-wrapper distribution hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR-->
        <div class="page-bar">
            <div class="date-selector">
                <select class="form-control input-small input-sm select-system-date">
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+3day')); ?>">+3 Days</option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+2day')); ?>">+2 Days</option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+1day')); ?>">+1 Day</option>
                    <option value="<?php echo gmdate('Y-m-d'); ?>" selected="selected">Today</option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-1day')); ?>">-1 Day</option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-2day')); ?>">-2 Days</option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-3day')); ?>">-3 Days</option>
                </select>
            </div>
            <div class="bar-buttons actions">
                <div class="btn-group">
                    <button class="btn green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Schedule
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <label class="control-label">Start Date</label>
                            <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                        </li>
                        <li>
                            <label class="control-label">End Date</label>
                            <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                        </li>
                        <li>
                            <a href="javascript:;"> Stop </a>
                        </li>
                        <li>
                            <a href="javascript:;"> Start Schedule </a>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button class="btn green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Controls
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a class="preview-and-send"> Preview and Send </a></li>
                        <li><a href="javascript:;"> Send </a></li>
                        <li><a href="#edit_send_hour" data-toggle="modal" > Edit </a></li>
                        <li><a class="publish"> Publish </a></li>
                        <li><a class="delete"> Delete </a></li>
                        <li><a href="#manage_users" data-toggle="modal"> Manage Users </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN TIPS DISTRIBUTION -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Tips Distributions</h1>
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
                                    <th> Sent At </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{#each sites}}
                                    <tr class="website_tr">
                                        <td> <input class="select-group-site" type="checkbox" value="{{siteId}}"> </td>
                                        <td colspan="9">{{name}}</td>
                                    </tr>
                                    {{#each packages}}
                                        <tr class="pack_tr">
                                            <td></td>
                                            <td colspan="9">{{name}} - {{eventsNumber}}/{{tipsPerDay}}</td>
                                        </tr>
                                        {{#each events}}
                                            <tr>
                                                <td>
                                                    <input class="use" type="checkbox" data-site-id="{{siteId}}" data-event-id="{{id}}"/>
                                                </td>
                                                {{#if isNoTip}}
                                                    <td colspan="7">NO TIP</td>
                                                {{else}}
                                                    <td>{{country}}</td>
                                                    <td>{{league}}</td>
                                                    <td>{{homeTeam}} - {{awayTeam}}</td>
                                                    <td>{{predictionName}}</td>
                                                    <td>{{odd}}</td>
                                                    <td>{{result}}</td>
                                                    <td>{{statusId}}</td>
                                                {{/if}}
                                                <td>{{mailingDate}}</td>
                                                {{#if isPublish}}
                                                    <td><span class="label label-sm label-success"> Published </span></td>
                                                {{else}}
                                                    <td><span class="label label-sm label-danger"> Unpublished </span></td>
                                                {{/if}}
                                            </tr>
                                            {{else}}
                                            <tr>
                                                <td> </td>
                                                <td colspan="9">--- No events distributed in package ---</td>
                                            </tr>
                                        {{/each}}
                                    {{/each}}
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
<div class="modal fade" id="modal-distribution-preview-and-send" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
        <script class="template-modal-content" type="text/template7">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Preview and Send</h4>
            </div>
            <div class="modal-body">
                <label class="control-label">Pack: Payfortips - 2 Tips</label>
                <div class="form-group">
                    <div class="summernote">{{template}}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Send</button>
            </div>
        </script>
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
