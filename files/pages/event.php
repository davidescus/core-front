<!-- BEGIN CONTENT -->
<div class="page-content-wrapper event hidden">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN EVENT -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Events</h1>
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
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{#each events}}
                                <tr data-id="{{id}}">
                                    <td>{{id}}</td>
                                    <td>{{country}}</td>
                                    <td>{{league}}</td>
                                    <td>{{homeTeam}} - {{awayTeam}}</td>
                                    <td>{{predictionId}}</td>
                                    <td>{{odd}}</td>
                                    <td>{{result}}</td>
                                    <td>{{statusId}}</td>
                                    <td>
                                        <button class="btn blue edit">Edit</button>
                                    </td>
                                </tr>
                                {{else}}
                                <tr>
                                    <td colspan="9">--- No events distributed in packages ---</td>
                                </tr>
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

