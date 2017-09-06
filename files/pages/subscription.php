<!-- BEGIN CONTENT -->
<div class="page-content-wrapper subscription hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Subscriptions</h1>
        <!-- END TABLE TITLE-->

        <!-- BEGIN MONTH TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="new-subscription">
                    <ul class="table_import_filters_container">
                        <li>
                            <div class="form-group">
                                <label class="control-label">Site</label>
                                <select class="form-control select-site select2 table_import_filter_select"></select>
                                <script class="template-select-site" type="text/template7">
                                   <option value="-"> -- select -- </option>
                                   {{#each sites}}
                                   <option value="{{id}}">{{name}} </option>
                                   {{/each}}
                                </script>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label class="control-label">Package</label>
                                <select class="form-control select-package select2 table_import_filter_select">
                                   <option value="-"> -- select -- </option>
                                </select>
                                <script class="template-select-package" type="text/template7">
                                   <option value="-"> -- select -- </option>
                                   {{#each packages}}
                                   <option value="{{id}}">{{name}} </option>
                                   {{/each}}
                                </script>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label class="control-label">Customer Email</label>
                                <input class="form-control search-customer" type="text">
                                <div class="selectable-block"></div>
                                <script class="template-selectable-block" type="text/template7">
                                   {{#each customers}}
                                   <div class="selectable-row">{{email}}</div>
                                   {{/each}}
                                </script>
                            </div>
                        </li>
                        <li>
                            <button type="button" class="btn green create-customer">Create Customer</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portlet-body">

                <!-- month table -->
                <div class="table-subscription"></div>
                <script class="template-table-subscription" type="text/template7">
                    <div class="table-scrollable">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th> System Date </th>
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
                                    {{#if isPublishInSite}}
                                        <td><span class="label label-sm label-success">Publish</span></td>
                                    {{else}}
                                        <td><span class="label label-sm label-danger">UnPub</span></td>
                                    {{/if}}
                                    <td>{{systemDate}}</td>
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
                                    <td>
                                        {{#if isVisible}}
                                        <button class="btn red show-hide">Hide</button>
                                        {{else}}
                                        <button class="btn green show-hide">Show</button>
                                        {{/if}}
                                        {{#if isNoTip}}
                                        {{else}}
                                        <button class="btn blue edit">Edit</button>
                                        {{/if}}
                                    </td>
                                </tr>
                                {{else}}
                                <tr>
                                    <td colspan="9">--- No events in this table ---</td>
                                </tr>
                                {{/each}}
                            </tbody>
                        </table>
                    </div>
                </script>

            </div>
        </div>
        <!-- END MONTH TABLE PORTLET-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- end content -->

<!-- START MODAL EDIT -->
<div class="modal fade" id="archive-big-modal-edit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Change Prediction and Status</h4>
            </div>
            <div class="modal-body">

                <div class="event-info row"></div>
                <script class="template-event-info" type="text/template7">
                    <input type="hidden" class="event-id" value="{{id}}"/>
                    <h4>
                        {{country}}
                        {{league}}
                        {{homeTeam}} - {{awayTeam}}
                        {{systemDate}}
                    </h4>
                </script>

                <!-- status and prediction -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Prediction</label>
                            <select class="form-control prediction select2"></select>
                            <script class="template-prediction" type="text/template7">
                               {{#each groups}}
                                   {{#each predictions}}
                                       <option value="{{identifier}}">{{name}} </option>
                                   {{/each}}
                               {{/each}}
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control status select2">
                               <option value="1">Win</option>
                               <option value="2">Loss</option>
                               <option value="3">Draw</option>
                               <option value="4">PostP.</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green save">Save</button>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL EDIT -->













