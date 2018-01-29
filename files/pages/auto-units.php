<!-- BEGIN CONTENT -->
<div class="page-content-wrapper auto-units hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR-->
        <div class="page-bar">
            <div class="date-selector">
                <select class="form-control input-small input-sm select-date"></select>
                <script class="template-select-date" type="text/template7">
                    <option value="-">-- select --</option>
                    {{#each months}}
                    <option value="{{year}}-{{month}}">{{month}}/{{year}}</option>
                    {{/each}}
                </script>
            </div>
        </div>
        <!-- END PAGE BAR-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Auto Units</h1>
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
                               <option value="-"> -- select -- </option>
                               {{#each sites}}
                               <option value="{{id}}">{{name}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">Table</label>
                            <select class="form-control select-table select2 table_import_filter_select">
                               <option value="-"> -- select -- </option>
                            </select>
                            <script class="template-select-table" type="text/template7">
                               <option value="-"> -- select -- </option>
                               {{#each tables}}
                               <option value="{{tableIdentifier}}">{{tableIdentifier}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                    <li>
                        <button type="button" class="btn green btn-outline publishMonth">Publish Current Month</button>
                    </li>
                    <li>
                        <button type="button" class="btn green btn-outline publishInSite">Update in site</button>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">

                content here!


            </div>
        </div>
        <!-- END MONTH TABLE PORTLET-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- end content -->
