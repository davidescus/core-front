<!-- BEGIN CONTENT -->
<div class="page-content-wrapper country-league-team hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN TABLE TITLE-->
        <h1 class="page-title">Manage Teams Names</h1>
        <!-- END TABLE TITLE-->

        <!-- BEGIN SELECT SITE AND TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <ul class="table_import_filters_container">
                    <li>
                        <div class="form-group">
                            <label class="control-label">Country</label>
                            <select class="form-control select-country select2 table_import_filter_select"></select>
                            <script class="template-select-country" type="text/template7">
                               <option value="-"> -- select -- </option>
                               {{#each countries}}
                               <option value="{{code}}">{{name}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">Team</label>
                            <select class="form-control select-team select2 table_import_filter_select"></select>
                            <script class="template-select-team" type="text/template7">
                               <option value="-"> -- select -- </option>
                               {{#each sites}}
                               <option value="{{id}}">{{name}} </option>
                               {{/each}}
                            </script>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="portlet-body">


                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control team-alias"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SELECT SITE AND TABLE PORTLET-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- end content -->
