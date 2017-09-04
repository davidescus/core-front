<!-- BEGIN CONTENT -->
<div class="page-content-wrapper site hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <select class="form-control site-selection select2"></select>
                    <script class="template-site-selection" type="text/template7">
                        <option value="new"> -- New Website -- </option>
                        {{#each sites}}
                        <option value="{{id}}">{{name}}</option>
                        {{/each}}
                    </script>
                </div>
                <div class="col-sm-6">
                    <div class="actions pull-right">
                        <button class="btn green add-new-site">Add New</button>
                        <button class="btn red delete-site">Delete</button>
                        <button class="btn green save-site">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-name"></div>
        <script class="template-site-name" type="text/template7">
        <h1 class="page-title">{{name}}</h1>
        </script>

        <div class="row">

            <!-- site general configuration -->
            <div class="col-md-8">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-speech"></i>
                            <span class="caption-subject bold uppercase"> General Settings</span>
                        </div>
                        <div class="actions site-token"></div>
                        <script class="template-site-token" type="text/template7">
                            Token: <span>{{token}}</span> &nbsp;&nbsp;
                            {{#js_compare "this.isConnect === 0"}}
                            <button class="btn red connection-update">Connect</button>
                            {{/js_compare}}
                            {{#js_compare "this.isConnect === 1"}}
                            <button class="btn green connection-update">Update</button>
                            {{/js_compare}}
                        </script>
                    </div>
                    <div class="portlet-body">

                        <!-- div and script for populate site general configuration -->
                        <div class="row site-general"></div>
                        <script class="template-site-general" type="text/template7">
                        <div class="col-md-4">
                            <h4>General</h4>
                            <div class="form-group">
                                <label>Website name</label>
                                <input type="text" class="form-control name" value="{{name}}">
                            </div>

                            <div class="form-group">
                                <label>Website email</label>
                                <input type="text" class="form-control email" value="{{email}}">
                            </div>

                            <div class="form-group">
                                <label>Website URL</label>
                                <input type="text" class="form-control url" value="{{url}}">
                            </div>

                            <div class="form-group">
                                <label>Date Format</label>
                                <select class="form-control date-format">
                                    <option value="">- Select -</option>
                                    <option value="Y-m-d"
                                    {{#js_compare "this.dateFormat === 'Y-m-d'"}}selected="selected"{{/js_compare}}>
                                    <?php echo gmDate('Y-m-d'); ?></option>
                                    <option value="Y/m/d"
                                    {{#js_compare "this.dateFormat === 'Y/m/d'"}}selected="selected"{{/js_compare}}>
                                    <?php echo gmDate('Y/m/d'); ?></option>
                                    <option value="Y:m:d"
                                    {{#js_compare "this.dateFormat === 'Y:m:d'"}}selected="selected"{{/js_compare}}>
                                    <?php echo gmDate('Y:m:d'); ?></option>
                                    <option value="Y|m|d"
                                    {{#js_compare "this.dateFormat === 'Y|m|d'"}}selected="selected"{{/js_compare}}>
                                    <?php echo gmDate('Y|m|d'); ?></option>
                                    <option value="Y-:m-:d"
                                    {{#js_compare "this.dateFormat === 'Y-:m-:d'"}}selected="selected"{{/js_compare}}>
                                    <?php echo gmDate('Y-:m-:d'); ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thank you page parameter</label>
                                <input type="text" class="form-control" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4>SMTP</h4>
                            <div class="form-group">
                                <label>Host</label>
                                <input type="text" class="form-control smtp-host" value="{{smtpHost}}">
                            </div>

                            <div class="form-group">
                                <label>Port</label>
                                <input type="text" class="form-control smtp-port" value="{{smtpPort}}">
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control smtp-user" value="{{smtpUser}}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control smtp-password" value="{{smtpPassword}}">
                            </div>

                            <div class="form-group">
                                <label>Encryption</label>
                                <select class="form-control smtp-encryption">
                                    <option value=""> - None -</option>
                                    <option value="ssl"
                                    {{#js_compare "this.dateFormat === 'ssl'"}}selected="selected"{{/js_compare}}>
                                    SSL</option>
                                    <option value="tls"
                                    {{#js_compare "this.dateFormat === 'tls'"}}selected="selected"{{/js_compare}}>
                                    TLS</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4>IMAP</h4>
                            <div class="form-group">
                                <label>Host</label>
                                <input type="text" class="form-control imap-host" value="{{imapHost}}">
                            </div>

                            <div class="form-group">
                                <label>Port</label>
                                <input type="text" class="form-control imap-port" value="{{imapPort}}">
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control imap-user" value="{{imapUser}}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control imap-password" value="{{imapPassword}}">
                            </div>

                            <div class="form-group">
                                <label>Encryption</label>
                                <select class="form-control imap-encryption">
                                    <option value=""> - None -</option>
                                    <option value="ssl"
                                    {{#js_compare "this.dateFormat === 'tls'"}}selected="selected"{{/js_compare}}>
                                    SSL</option>
                                    <option value="tls"
                                    {{#js_compare "this.dateFormat === 'tls'"}}selected="selected"{{/js_compare}}>
                                    TLS</option>
                                </select>
                            </div>
                        </div>
                        </script>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

            <!-- site result and status class -->
            <div class="col-md-4">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-speech"></i>
                            <span class="caption-subject bold uppercase">Result Status And Class</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Results </h4>

                                <!-- show results status name and class for site -->
                                <div class="site-result-status"></div>
                                <script class="template-site-result-status" type="text/template7">

                                <!-- Win -->
                                <div class="row" data-status-id="1">
                                    <div class="col-md-2"><h4>Win</h4></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control statusName"
                                            value="{{#if status.1.statusName}}{{status.1.statusName}}{{/if}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control statusClass"
                                            value="{{#if status.1.statusClass}}{{status.1.statusClass}}{{/if}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Loss -->
                                <div class="row" data-status-id="2">
                                    <div class="col-md-2"><h4>Loss</h4></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control statusName"
                                            value="{{#if status.2.statusName}}{{status.2.statusName}}{{/if}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control statusClass"
                                            value="{{#if status.2.statusClass}}{{status.2.statusClass}}{{/if}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Draw -->
                                <div class="row" data-status-id="3">
                                    <div class="col-md-2"><h4>Draw</h4></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control statusName"
                                            value="{{#if status.3.statusName}}{{status.3.statusName}}{{/if}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control statusClass"
                                            value="{{#if status.3.statusClass}}{{status.3.statusClass}}{{/if}}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Postp. -->
                                <div class="row" data-status-id="4">
                                    <div class="col-md-2"><h4>Postp</h4></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control statusName"
                                            value="{{#if status.4.statusName}}{{status.4.statusName}}{{/if}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control statusClass"
                                            value="{{#if status.4.statusClass}}{{status.4.statusClass}}{{/if}}">
                                        </div>
                                    </div>
                                </div>
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

        </div>

        <!-- package section -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-social-dribbble font-purple-soft"></i>
                            <span class="caption-subject font-purple-soft bold uppercase">Packages</span>
                        </div>
                        <div class="actions">
                            <button class="btn green add-new-package">Add New</button>
                            <button class="btn red delete-package">Delete</button>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <!-- script for package tabs -->
                        <ul class="nav nav-tabs package-tab"></ul>
                        <script class="template-package-tab" type="text/template7">
                            {{#each packages}}
                            <li data-id="{{id}}">
                                <a href="#package-tab_{{id}}" data-toggle="tab">{{name}}</a>
                            </li>
                            {{/each}}
                        </script>

                        <!-- script for package tab contents -->
                        <div class="tab-content package-tab-content"></div>
                        <script class="template-package-tab-content" type="text/template7">
                            {{#each packages}}
                            <div class="tab-pane fade" id="package-tab_{{id}}">

                                <div class="package-wrapper">
                                    <!-- general package information -->
                                    <div class="row general-info" data-package-id="{{id}}">
                                        <div class="col-md-8">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Normal/Vip</label>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                        <input type="radio" name="isVip_{{id}}" value="0"
                                                            {{#js_compare "this.isVip === 0"}}checked="checked"{{/js_compare}}> Normal
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="isVip_{{id}}" value="1"
                                                            {{#js_compare "this.isVip === 1"}}checked="checked"{{/js_compare}}> Vip
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Subscription Type</label>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="subscriptionType_{{id}}" value="tips"
                                                            {{#js_compare "this.subscriptionType === 'tips'"}}checked="checked"{{/js_compare}}> Tips
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                        <input type="radio" name="subscriptionType_{{id}}" value="days"
                                                            {{#js_compare "this.subscriptionType === 'days'"}}checked="checked"{{/js_compare}}> Days
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Is recurring</label>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="isRecurring_{{id}}" value="0"
                                                            {{#js_compare "this.isRecurring === 0"}}checked="checked"{{/js_compare}}> No
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="isRecurring_{{id}}" value="1"
                                                            {{#js_compare "this.isRecurring === 1"}}checked="checked"{{/js_compare}}> Yes
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- text inputs -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control name" value="{{name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Package Identifier</label>
                                                    <input type="text" class="form-control identifier" value="{{identifier}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tip Identifier</label>
                                                    <input type="text" class="form-control tipIdentifier" value="{{tipIdentifier}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Table Identifier</label>
                                                    <input type="text" class="form-control tableIdentifier" value="{{tableIdentifier}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Payment Name</label>
                                                    <input type="text" class="form-control paymentName" value="{{paymentName}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Vip Flag</label>
                                                    <input type="text" class="form-control vipFlag" value="{{vipFlag}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Days/Tips</label>
                                                    <input type="text" class="form-control subscription" value="{{subscription}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tips/day</label>
                                                    <input type="text" class="form-control tipsPerDay" value="{{tipsPerDay}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control price" value="{{price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Old Price</label>
                                                    <input type="text" class="form-control oldPrice" value="{{oldPrice}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Alias Subs. Type</label>
                                                    <input type="text" class="form-control aliasSubscriptionType" value="{{aliasSubscriptionType}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Alias tips/day</label>
                                                    <input type="text" class="form-control aliasTipsPerDay" value="{{aliasTipsPerDay}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <input type="text" class="form-control discount" value="{{discount}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>Accepted Bets</h4>
                                    <br/>

                                    {{#each associatedPredictions}}
                                    <div class="row associated-predictions">
                                        <!-- bet group checkbox -->
                                        <div class="col-md-12">
                                            <label class="mt-checkbox mt-checkbox-outline">{{@key}} - Group
                                                <input type="checkbox" value="1" name="test">
                                                <span></span>
                                            </label>
                                        </div>

                                        <!-- sub elemts for same subgroup -->
                                        {{#each predictions}}
                                        <div class="col-md-3">
                                            <label class="mt-checkbox"> {{name}}
                                                <input type="checkbox" class="prediction" value="{{identifier}}" {{#if isAssociated}}checked="checked"{{/if}}>
                                                <span></span>
                                            </label>
                                        </div>
                                        {{/each}}
                                    </div>
                                    {{/each}}

                                    <h4>Email Configuration</h4>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" class="form-control" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Template</label>
                                                <textarea class="form-control" rows="5" readonly="readonly">Not use for moment</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{/each}}
                            </script>

                        <div class="clearfix margin-bottom-20"> </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bet Types -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-social-dribbble font-purple-soft"></i>
                            <span class="caption-subject font-purple-soft bold uppercase">Predictions Names</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <!-- iterate all site prediciton name -->
                        <div class="site-prediction-name"></div>
                        <script class="template-site-prediction-name" type="text/template7">
                            {{#each predictionGroup}}
                            <div class="row">

                                <!-- bet group checkbox -->
                                <div class="col-md-12"><p>{{@key}}</p></div>

                                {{#each predictions}}
                                <!-- sub elemts for same subgroup -->
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="mt-checkbox">{{name}}</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-sm prediction" name="{{identifier}}" value="{{siteName}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{/each}}
                            </div>
                            {{/each}}
                        </script>

                        <div class="clearfix margin-bottom-20"> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
