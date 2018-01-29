<!-- BEGIN CONTENT -->
<div class="page-content-wrapper auto-unit hidden">
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
        <h1 class="page-title">Auto Unit</h1>
        <!-- END TABLE TITLE-->

        <!-- BEGIN SELECT SITE AND TABLE PORTLET-->
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
                </ul>
            </div>

            <div class="portlet-body">

            </div>

        </div>
        <!-- END SELECT SITE AND TABLE PORTLET-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- end content -->
