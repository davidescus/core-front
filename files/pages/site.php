<!-- BEGIN CONTENT -->
<div class="page-content-wrapper site hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <select class="form-control site-selection select2"></select>
                    <script class="template-site-selection" type="text/template7">
                        <option value=" ">Select Website</option>
                        {{#each sites}}
                        <option value="{{id}}">{{name}}</option>
                        {{/each}}
                    </script>
                </div>
                <div class="col-sm-6">
                    <div class="actions pull-right">
                        <button class="btn green">Add New</button>
                        <button class="btn red">Delete</button>
                        <button class="btn green">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="page-title">GetMyBet.com</h1>

        <div class="row">
            <div class="col-md-8">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-speech"></i>
                            <span class="caption-subject bold uppercase"> General Settings</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>General</h4>
                                <div class="form-group">
                                    <label>Website name</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Website URL</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Default Select</label>
                                    <select class="form-control">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Thank you page parameter</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>SMTP</h4>
                                <div class="form-group">
                                    <label>Host</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Encryption</label>
                                    <select class="form-control">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
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
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="">Win</h4>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="">Loss</h4>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="">Draw</h4>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="">Postpone</h4>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                         <div class="form-group">
                                            <label>Class</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-social-dribbble font-purple-soft"></i>
                            <span class="caption-subject font-purple-soft bold uppercase">Packages</span>
                        </div>
                        <div class="actions">
                            <button class="btn green">Add New</button>
                            <button class="btn red">Delete</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">Package 1</a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">Package 2</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">

                                <div class="row">
                                    <div class="col-md-8">
                                        <br/>
                                        <!-- radio buttons -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Normal/Vip</label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Normal
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Vip
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
                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Tips
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Days
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
                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Tes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- text inputs -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Package Identifier</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tip Identifier</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Table Identifier</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vip Flag</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Days/Tips</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tips/day</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Old Price</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alias Subs. Type</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alias tips/day</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4>Accepted Bets</h4>
                                <br/>
                                <div class="row">
                                    <!-- bet group checkbox -->
                                    <div class="col-md-12">
                                        <label class="mt-checkbox mt-checkbox-outline"> Over/Under
                                            <input type="checkbox" value="1" name="test">
                                            <span></span>
                                        </label>
                                    </div>

                                    <!-- sub elemts for same subgroup -->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /. row -->

                                <div class="row">
                                    <!-- bet group checkbox -->
                                    <div class="col-md-12">
                                        <label class="mt-checkbox mt-checkbox-outline"> Over/Under
                                            <input type="checkbox" value="1" name="test">
                                            <span></span>
                                        </label>
                                    </div>

                                    <!-- sub elemts for same subgroup -->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="mt-checkbox"> Over/Under
                                                    <input type="checkbox" value="1" name="test">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-sm" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /. row -->

                                <h4>Email Configuration</h4>
                                <br/>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Template</label>
                                            <textarea class="form-control" rows="5">Not use for moment</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab_1_2">

                            </div>
                        </div>
                        <div class="clearfix margin-bottom-20"> </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
