
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper association hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR-->
        <div class="page-bar">
            <div class="date-selector">
                <select id="association-system-date" class="form-control input-small input-sm">
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+3day')); ?>"><?php echo gmdate('Y-m-d', strtotime('+3day')); ?></option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+2day')); ?>"><?php echo gmdate('Y-m-d', strtotime('+2day')); ?></option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('+1day')); ?>"><?php echo gmdate('Y-m-d', strtotime('+1day')); ?></option>
                    <option value="<?php echo gmdate('Y-m-d'); ?>" selected="selected"><?php echo gmdate('Y-m-d'); ?></option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-1day')); ?>"><?php echo gmdate('Y-m-d', strtotime('-1day')); ?></option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-2day')); ?>"><?php echo gmdate('Y-m-d', strtotime('-2day')); ?></option>
                    <option value="<?php echo gmdate('Y-m-d', strtotime('-3day')); ?>"><?php echo gmdate('Y-m-d', strtotime('-3day')); ?></option>
                </select>
            </div>
            <button type="button" class="btn green btn-outline add-event-btn">Add Event</button>
        </div>
        <!-- END PAGE BAR-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN ASSOCIATION TABLE RUN -->
        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Real Users Normal</h1>
        <!-- END TABLE TITLE-->

        <div class="row">
            <div class="col-md-12">
                <div id="table-association-run" class="table-association" data-table="run">

                    <!-- TODO founded events -->
                    <span class="events-number"></span>
                    <script class="template-events-number" type="text/template7">
                        <small class="pull-right">{{number}} events found</small>
                    </script>

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="selection-param">
                                <ul class="table_import_filters_container">
                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Tipster</label>
                                            <select class="form-control select-provider select2 table_import_filter_select"></select>
                                            <script class="template-select-provider" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each tipsters}}
                                               <option value="{{provider}}">{{provider}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">League</label>
                                            <select class="form-control select-league select2 table_import_filter_select"></select>
                                            <script class="template-select-league" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each leagues}}
                                               <option value="{{league}}">{{league}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds From</label>
                                            <select class="form-control select-minOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1"> >= 1 </option>
                                                <option value="1.5"> >= 1.5 </option>
                                                <option value="2"> >= 2 </option>
                                                <option value="2.5"> >= 2.5 </option>
                                                <option value="3"> >= 3 </option>
                                                <option value="3.5"> >= 3.5 </option>
                                                <option value="4"> >= 4 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds To</label>
                                            <select class="form-control select-maxOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1.5"> <= 1.5 </option>
                                                <option value="2"> <= 2 </option>
                                                <option value="2.5"> <= 2.5 </option>
                                                <option value="3"> <= 3 </option>
                                                <option value="3.5"> <= 3.5 </option>
                                                <option value="4"> <= 4 </option>
                                                <option value="4.5"> <= 4.5 </option>
                                                <option value="5"> <= 5 </option>
                                                <option value="5.5"> <= 5.5 </option>
                                                <option value="6"> <= 6 </option>
                                                <option value="10"> <= 10 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green btn-outline search-events-btn modal-get-event">Search</button>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green refresh-events-btn refresh-event-info">Refresh</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <!-- content of association table -->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column association-table-datatable">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>League</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Odd</th>
                                        <th>Prediction</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>System Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div> 
        <!-- END ASSOCIATION TABLE -->


        <!-- BEGIN ASSOCIATION TABLE -->

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Real Users VIP</h1>
        <!-- END TABLE TITLE-->

       <div class="row">
            <div class="col-md-12">
                <div id="table-association-ruv" class="table-association" data-table="ruv">

                    <!-- TODO founded events -->
                    <span class="events-number"></span>
                    <script class="template-events-number" type="text/template7">
                        <small class="pull-right">{{number}} events found</small>
                    </script>

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="selection-param">
                                <ul class="table_import_filters_container">
                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Tipster</label>
                                            <select class="form-control select-provider select2 table_import_filter_select"></select>
                                            <script class="template-select-provider" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each tipsters}}
                                               <option value="{{provider}}">{{provider}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">League</label>
                                            <select class="form-control select-league select2 table_import_filter_select"></select>
                                            <script class="template-select-league" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each leagues}}
                                               <option value="{{league}}">{{league}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds From</label>
                                            <select class="form-control select-minOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1"> >= 1 </option>
                                                <option value="1.5"> >= 1.5 </option>
                                                <option value="2"> >= 2 </option>
                                                <option value="2.5"> >= 2.5 </option>
                                                <option value="3"> >= 3 </option>
                                                <option value="3.5"> >= 3.5 </option>
                                                <option value="4"> >= 4 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds To</label>
                                            <select class="form-control select-maxOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1.5"> <= 1.5 </option>
                                                <option value="2"> <= 2 </option>
                                                <option value="2.5"> <= 2.5 </option>
                                                <option value="3"> <= 3 </option>
                                                <option value="3.5"> <= 3.5 </option>
                                                <option value="4"> <= 4 </option>
                                                <option value="4.5"> <= 4.5 </option>
                                                <option value="5"> <= 5 </option>
                                                <option value="5.5"> <= 5.5 </option>
                                                <option value="6"> <= 6 </option>
                                                <option value="10"> <= 10 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green btn-outline search-events-btn modal-get-event">Search</button>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green refresh-events-btn refresh-event-info">Refresh</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <!-- content of association table -->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column association-table-datatable">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>League</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Odd</th>
                                        <th>Prediction</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>System Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END ASSOCIATION TABLE -->


        <!-- BEGIN ASSOCIATION TABLE -->

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">No Users Normal</h1>
        <!-- END TABLE TITLE-->

       <div class="row">
            <div class="col-md-12">
                <div id="table-association-nun" class="table-association" data-table="nun">

                    <!-- TODO founded events -->
                    <span class="events-number"></span>
                    <script class="template-events-number" type="text/template7">
                        <small class="pull-right">{{number}} events found</small>
                    </script>

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="selection-param">
                                <ul class="table_import_filters_container">
                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Tipster</label>
                                            <select class="form-control select-provider select2 table_import_filter_select"></select>
                                            <script class="template-select-provider" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each tipsters}}
                                               <option value="{{provider}}">{{provider}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">League</label>
                                            <select class="form-control select-league select2 table_import_filter_select"></select>
                                            <script class="template-select-league" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each leagues}}
                                               <option value="{{league}}">{{league}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds From</label>
                                            <select class="form-control select-minOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1"> >= 1 </option>
                                                <option value="1.5"> >= 1.5 </option>
                                                <option value="2"> >= 2 </option>
                                                <option value="2.5"> >= 2.5 </option>
                                                <option value="3"> >= 3 </option>
                                                <option value="3.5"> >= 3.5 </option>
                                                <option value="4"> >= 4 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds To</label>
                                            <select class="form-control select-maxOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1.5"> <= 1.5 </option>
                                                <option value="2"> <= 2 </option>
                                                <option value="2.5"> <= 2.5 </option>
                                                <option value="3"> <= 3 </option>
                                                <option value="3.5"> <= 3.5 </option>
                                                <option value="4"> <= 4 </option>
                                                <option value="4.5"> <= 4.5 </option>
                                                <option value="5"> <= 5 </option>
                                                <option value="5.5"> <= 5.5 </option>
                                                <option value="6"> <= 6 </option>
                                                <option value="10"> <= 10 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green btn-outline search-events-btn modal-get-event">Search</button>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green refresh-events-btn refresh-event-info">Refresh</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <!-- content of association table -->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column association-table-datatable">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>League</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Odd</th>
                                        <th>Prediction</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>System Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END ASSOCIATION TABLE -->


        <!-- BEGIN ASSOCIATION TABLE -->

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">No Users VIP</h1>
        <!-- END TABLE TITLE-->

       <div class="row">
            <div class="col-md-12">
                <div id="table-association-nuv" class="table-association" data-table="nuv">

                    <!-- TODO founded events -->
                    <span class="events-number"></span>
                    <script class="template-events-number" type="text/template7">
                        <small class="pull-right">{{number}} events found</small>
                    </script>

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="selection-param">
                                <ul class="table_import_filters_container">
                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Tipster</label>
                                            <select class="form-control select-provider select2 table_import_filter_select"></select>
                                            <script class="template-select-provider" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each tipsters}}
                                               <option value="{{provider}}">{{provider}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">League</label>
                                            <select class="form-control select-league select2 table_import_filter_select"></select>
                                            <script class="template-select-league" type="text/template7">
                                               <option value=""> -- all -- </option>
                                               {{#each leagues}}
                                               <option value="{{league}}">{{league}} </option>
                                               {{/each}}
                                            </script>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds From</label>
                                            <select class="form-control select-minOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1"> >= 1 </option>
                                                <option value="1.5"> >= 1.5 </option>
                                                <option value="2"> >= 2 </option>
                                                <option value="2.5"> >= 2.5 </option>
                                                <option value="3"> >= 3 </option>
                                                <option value="3.5"> >= 3.5 </option>
                                                <option value="4"> >= 4 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="control-label">Odds To</label>
                                            <select class="form-control select-maxOdd select2 table_import_filter_select">
                                                <option value=""> -- all -- </option>
                                                <option value="1.5"> <= 1.5 </option>
                                                <option value="2"> <= 2 </option>
                                                <option value="2.5"> <= 2.5 </option>
                                                <option value="3"> <= 3 </option>
                                                <option value="3.5"> <= 3.5 </option>
                                                <option value="4"> <= 4 </option>
                                                <option value="4.5"> <= 4.5 </option>
                                                <option value="5"> <= 5 </option>
                                                <option value="5.5"> <= 5.5 </option>
                                                <option value="6"> <= 6 </option>
                                                <option value="10"> <= 10 </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green btn-outline search-events-btn modal-get-event">Search</button>
                                    </li>

                                    <li>
                                        <button type="button" class="btn green refresh-events-btn refresh-event-info">Refresh</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <!-- content of association table -->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column association-table-datatable">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>League</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Odd</th>
                                        <th>Prediction</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>System Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END ASSOCIATION TABLE -->


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<!-- START ASSOCIATE EVENT MODAL -->
<div class="modal fade" id="modal-associate-events" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"></div>
        <script class="template-modal-content" type="text/template7">
            <input class="event-id" type="hidden" value="{{event.id}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <div class="assoc_modal_titles col-md-9">
                    <h4 class="modal-title">Associate Event: {{table}}</h4>
                    <h6>
                        {{event.country}}:
                        {{event.league}},
                        {{event.homeTeam}} - {{event.awayTeam}},
                        {{event.predictionId}}
                    </h6>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control assoc_websites_search" placeholder="Search">
                </div>
            </div>
            <div class="modal-body">
                <div class="row">

                    {{#each sites}}
                    <div class="col-md-6 assoc_website">
                        <div class="form-group row">
                            <label class="col-md-3 control-label">
                                <span class="assoc_website_name">{{siteName}}</span>
                                <br>
                                <span class="assoc_website_tips_remaining"> 1/3 </span>
                            </label>
                            <div class="col-md-9">
                                <div class="mt-checkbox-list">

                                    {{#each packages}}
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input class="use" type="checkbox" {{#if eventIsAssociated}}checked="checked"{{/if}} data-id="{{id}}"/> {{name}}
                                        {{packageAssociatedEventsNumber}} / {{tipsPerDay}}
                                        <span></span>
                                    </label>
                                    {{/each}}

                                </div>
                            </div>
                        </div>
                    </div>
                    {{/each}}

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green associate-event">Import</button>
            </div>
        </script>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END ASSOCIATE EVENT MODAL -->

<!-- START ADD EVENTS MODAL -->
<div class="modal fade" id="modal-available-events" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"></div>
        <script class="template-modal-content" type="text/template7">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title import_modal_title">Import Events - {{table}} System date: {{systemDate}}</h4>
                <select class="form-control import_events_sys_date input-small">
                    <option value="AK">Alaska</option>
                    <option value="HI" disabled="disabled">Hawaii</option>
                </select>
            </div>
            <div class="modal-body">
                <input class="table-identifier" type="hidden" value="{{table}}"/>
                <table class="table table-striped table-bordered table-hover table-checkable order-column">
                    <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set=".checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th>Id</th>
                            <th>Country</th>
                            <th>League</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Odd</th>
                            <th>Prediction</th>
                            <th>Result</th>
                            <th>Status</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{#each events}}
                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input class="use" type="checkbox" class="checkboxes" data-id="{{id}}" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{id}}</td>
                            <td>{{country}}</td>
                            <td>{{league}}</td>
                            <td>{{homeTeam}}</td>
                            <td>{{awayTeam}}</td>
                            <td>{{odd}}</td>
                            <td>{{predictionId}}</td>
                            <td>{{result}}</td>
                            <td>{{statusId}}</td>
                            <td>{{eventDate}}</td>
                        </tr>
                    {{/each}}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green import">Import</button>
            </div>
            <!-- /.modal-content -->
        </script>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END ADD EVENTS MODAL -->














