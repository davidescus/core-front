<!-- BEGIN CONTENT -->
<div class="page-content-wrapper archive-big hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Big archives</h1>
        <!-- END TABLE TITLE-->

        <!-- BEGIN MONTH TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <ul class="table_import_filters_container">
                    <li>
                        <div class="form-group">
                            <label class="control-label">Site</label>
                            <select class="form-control select-site select2 table_import_filter_select"></select>
                            <script class="template-select-site" type="text/template7">
                               <option value=""> -- select -- </option>
                               {{#each sites}}
                               <option value="{{id}}">{{name}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">Table</label>
                            <select class="form-control select-table select2 table_import_filter_select"></select>
                            <script class="template-select-table" type="text/template7">
                               <option value=""> -- select -- </option>
                               {{#each tables}}
                               <option value="{{tableIdentifier}}">{{tableIdentifier}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">

                <!-- month table -->
                <div class="table-content-month"></div>
                <script class="template-table-content-month" type="text/template7">
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
                                {{#each events}}
                                <tr>
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
                                </tr>
                                {{else}}
                                <tr>
                                    <td> </td>
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
<!-- END CONTENT -->
