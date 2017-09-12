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
                                <select class="form-control select-package select2 table_import_filter_select"></select>
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
                                       <div class="selectable-row" data-email="{{email}}">{{email}}</div>
                                   {{/each}}
                                </script>
                            </div>
                        </li>
                        <li class="li-create-customer hidden">
                            <button type="button" class="btn green create-customer">Create Customer</button>
                        </li>
                    </ul>

                    <div class="subscription-values"></div>
                    <script class="template-subscription-values" type="text/template7">
                        {{#if this}}
                        <h2>Subscription Info</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Subscription Name</label>
                                    <input class="form-control name" type="text" value="{{name}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label class="control-label">Price</label>
                                    <input class="form-control price" type="text" value="{{price}}">
                                </div>
                            </div>

                            <!-- tips subscription -->
                            {{#js_compare "this.subscriptionType === 'tips'"}}
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">Tips Number</label>
                                        <input class="form-control subscription" type="text" value="{{subscription}}">
                                        <input class="form-control dateStart hidden" type="text">
                                        <input class="form-control dateEnd hidden" type="text">
                                    </div>
                                </div>
                            {{/js_compare}}

                            <!-- days subscription -->
                            {{#js_compare "this.subscriptionType === 'days'"}}
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">Days Number</label>
                                        <input class="form-control subscription" type="text" value="{{subscription}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Start</label>
                                        <input class="form-control dateStart" type="text">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">End</label>
                                        <input class="form-control dateEnd" type="text">
                                    </div>
                                </div>
                            {{/js_compare}}

                            <div class="col-md-2">
                                <label class="control-label">&nbsp;</label>
                                <input type="hidden" class="type" value="{{subscriptionType}}">
                                <button class="btn blue btn-block save">Create Subscription</button>
                            </div>
                        </div>
                        {{/if}}
                    </script>

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
                                    <th>Id</th>
                                    <th>Customer</th>
                                    <th>Package</th>
                                    <th>Site</th>
                                    <th>Type</th>
                                    <th>Tips / Days</th>
                                    <th>Tips Left</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{#each subscriptions}}
                                <tr data-id="{{id}}">
                                    <td>{{id}}</td>
                                    <td>{{customerId}}</td>
                                    <td>{{packageId}}</td>
                                    <td>{{siteId}}</td>
                                    <td>{{type}}</td>
                                    <td>{{subscription}}</td>
                                    <td>{{tipsLeft}}</td>
                                    <td>{{dateStart}}</td>
                                    <td>{{dateEnd}}</td>
                                    <td>{{status}}</td>
                                    <td>
                                        <button class="btn blue edit">Edit</button>
                                    </td>
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
<div class="modal fade" id="modal-subscription-create-customer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Create new customer</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control name" type="text"></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control email" type="text"></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Active Email</label>
                            <input class="form-control active-email" type="text"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green save">Create Customer</button>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL EDIT -->













