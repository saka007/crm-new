<?php
include_once("head.php");
?>

 <!-- Begin Page Content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Meetings</h1>

          <div class="row">
             <div class="col-lg-12">

             <a href="#" onclick="new_task(); return false;" class="btn btn-info pull-left new">Book Meeting</a>
             <br/>
             <hr/>

             <div class="row">
      <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">12</h3>
      <p style="color:#989898" class="font-medium no-mbot">
        Not Started      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 5      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">10</h3>
      <p style="color:#03A9F4" class="font-medium no-mbot">
        In Progress      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 1      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">12</h3>
      <p style="color:#2d2d2d" class="font-medium no-mbot">
        Testing      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 4      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">11</h3>
      <p style="color:#adca65" class="font-medium no-mbot">
        Awaiting Feedback      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 4      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">18</h3>
      <p style="color:#84c529" class="font-medium no-mbot">
        Complete      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 7      </p>
    </div>
      </div>

      <table data-last-order-identifier="tasks" data-default-order="" class="table table-tasks dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"><thead><tr role="row"><th class="sorting_disabled not-export" rowspan="1" colspan="1" aria-label=" - "><span class="hide"> - </span><div class="checkbox mass_select_all_wrap"><input type="checkbox" id="mass_select_all" data-to-table="tasks"><label></label></div></th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="# activate to sort column ascending">#</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name activate to sort column ascending">Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start Date activate to sort column ascending">Start Date</th><th class="duedate sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Due Date activate to sort column descending">Due Date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Assigned to activate to sort column ascending">Assigned to</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tags activate to sort column ascending">Tags</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Priority activate to sort column ascending">Priority</th></tr></thead><tbody><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="1"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/1" onclick="init_task_modal(1); return false;">1</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/1" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(1); return false;">HIS time of life. The King's.</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="" href="https://perfexcrm.com/demo/admin/invoices/list_invoices/9" data-original-title="Related To">INV-000009</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,1); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(1); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/1" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-1"><li>
                  <a href="#" onclick="task_mark_as(1,1); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,1); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,1); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,1); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">31/08/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/8"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Toney Boyle" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/10"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Dereck Koss" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Toney Boyle, Dereck Koss, Trystan Johns</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-1"><li>
                  <a href="#" onclick="task_change_priority(1,1); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,1); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,1); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="2"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/2" onclick="init_task_modal(2); return false;">2</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/2" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(2); return false;">Mind now!' The poor little thing sat down.</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/leads/index/10">Alvena Harvey - sboyle@example.org</a><div class="row-options"><span>
        <a href="#" class="text-success bold tasks-table-start-timer" onclick="timer_action(this,2); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(2); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/2" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-2"><li>
                  <a href="#" onclick="task_mark_as(1,2); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,2); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,2); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,2); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">01/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/1"><img data-toggle="tooltip" data-title="Percy Towne" src="https://perfexcrm.com/demo/uploads/staff_profile_images/1/small_1.png" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/4"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Quinn Jacobs" class="staff-profile-image-small mright5"></a><span class="hide">Percy Towne, Quinn Jacobs</span></td><td></td><td><span style="color:#fc2d42;" class="inline-block">Urgent<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-2"><li>
                  <a href="#" onclick="task_change_priority(1,2); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,2); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,2); return false;">
                     High
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="25"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/25" onclick="init_task_modal(25); return false;">25</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/25" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(25); return false;">Summarize your Experience in GCI</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="" href="https://perfexcrm.com/demo/admin/projects/view/2" data-original-title="Related To">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;" data-original-title="" title="">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,25); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(25); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/25" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-25" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-25"><li>
                  <a href="#" onclick="task_mark_as(1,25); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,25); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,25); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,25); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">14/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#fc2d42;" class="inline-block">Urgent<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-25" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-25"><li>
                  <a href="#" onclick="task_change_priority(1,25); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,25); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,25); return false;">
                     High
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="27"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/27" onclick="init_task_modal(27); return false;">27</a></td><td><span class="pull-left text-danger"><i class="fa fa-clock-o fa-fw"></i></span><a href="https://perfexcrm.com/demo/admin/tasks/view/27" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(27); return false;">Fix an open issue in our software</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><a href="#" class="text-danger tasks-table-stop-timer" onclick="timer_action(this,27,6); return false;">Stop Timer</a><span class="text-dark"> | </span><a href="#" onclick="edit_task(27); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/27" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#adca65;border:1px solid #adca65" task-status-table="2">Awaiting Feedback<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-27" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-27"><li>
                  <a href="#" onclick="task_mark_as(1,27); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,27); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,27); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,27); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">14/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/1"><img data-toggle="tooltip" data-title="Percy Towne" src="https://perfexcrm.com/demo/uploads/staff_profile_images/1/small_1.png" class="staff-profile-image-small mright5"></a><span class="hide">Percy Towne</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-27" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-27"><li>
                  <a href="#" onclick="task_change_priority(1,27); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,27); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,27); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="37"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/37" onclick="init_task_modal(37); return false;">37</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/37" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(37); return false;">Research commonly asked questions and write a FAQ</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/3">#3 - Brochure Design - Monahan-Monahan</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,37); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(37); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/37" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-37" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-37"><li>
                  <a href="#" onclick="task_mark_as(1,37); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,37); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,37); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,37); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">14/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td><div class="tags-labels"><span class="label label-tag tag-id-6"><span class="tag">review</span><span class="hide">, </span></span><span class="label label-tag tag-id-5"><span class="tag">important</span><span class="hide"></span></span></div></td><td><span style="color:#03a9f4;" class="inline-block">Medium<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-37" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-37"><li>
                  <a href="#" onclick="task_change_priority(1,37); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,37); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,37); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="46"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/46" onclick="init_task_modal(46); return false;">46</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/46" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(46); return false;">Use CSS to create mw-ui-icon-arrow-down from mw-ui-icon-arrow-up</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/3">#3 - Brochure Design - Monahan-Monahan</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,46); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(46); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/46" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-46" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-46"><li>
                  <a href="#" onclick="task_mark_as(4,46); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,46); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,46); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,46); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">14/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/4"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Quinn Jacobs" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns, Quinn Jacobs</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-46" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-46"><li>
                  <a href="#" onclick="task_change_priority(2,46); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,46); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,46); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="54"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/54" onclick="init_task_modal(54); return false;">54</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/54" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(54); return false;">Reword and clarify some API help messages</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/4">#4 - Website Redesign - Sawayn PLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,54); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(54); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/54" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-54" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-54"><li>
                  <a href="#" onclick="task_mark_as(1,54); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,54); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,54); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,54); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">14/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/3"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Davin Heathcote" class="staff-profile-image-small mright5"></a><span class="hide">Davin Heathcote</span></td><td><div class="tags-labels"><span class="label label-tag tag-id-5"><span class="tag">important</span><span class="hide">, </span></span><span class="label label-tag tag-id-6"><span class="tag">review</span><span class="hide"></span></span></div></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-54" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-54"><li>
                  <a href="#" onclick="task_change_priority(2,54); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,54); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,54); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="5"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/5" onclick="init_task_modal(5); return false;">5</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/5" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(5); return false;">Add a Test Case for the GCI Website</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/1">#1 - Build Website - Boehm LLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,5); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(5); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/5" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#adca65;border:1px solid #adca65" task-status-table="2">Awaiting Feedback<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-5"><li>
                  <a href="#" onclick="task_mark_as(1,5); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,5); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,5); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,5); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td></td><td></td><td><span style="color:#fc2d42;" class="inline-block">Urgent<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-5"><li>
                  <a href="#" onclick="task_change_priority(1,5); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,5); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,5); return false;">
                     High
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="18"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/18" onclick="init_task_modal(18); return false;">18</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/18" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(18); return false;">Make Wallpapers</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,18); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(18); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/18" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-18" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-18"><li>
                  <a href="#" onclick="task_mark_as(1,18); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,18); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,18); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,18); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/3"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Davin Heathcote" class="staff-profile-image-small mright5"></a><span class="hide">Davin Heathcote</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-18" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-18"><li>
                  <a href="#" onclick="task_change_priority(2,18); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,18); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,18); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="19"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/19" onclick="init_task_modal(19); return false;">19</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/19" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(19); return false;">Fix mimetype declaration on Android</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,19); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(19); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/19" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-19" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-19"><li>
                  <a href="#" onclick="task_mark_as(1,19); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,19); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,19); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,19); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/4"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Quinn Jacobs" class="staff-profile-image-small mright5"></a><span class="hide">Quinn Jacobs</span></td><td></td><td><span style="color:#03a9f4;" class="inline-block">Medium<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-19" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-19"><li>
                  <a href="#" onclick="task_change_priority(1,19); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,19); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,19); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="24"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/24" onclick="init_task_modal(24); return false;">24</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/24" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(24); return false;">Reword and clarify some API help messages</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,24); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(24); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/24" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-24" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-24"><li>
                  <a href="#" onclick="task_mark_as(1,24); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,24); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,24); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,24); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/4"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Quinn Jacobs" class="staff-profile-image-small mright5"></a><span class="hide">Quinn Jacobs</span></td><td><div class="tags-labels"><span class="label label-tag tag-id-3"><span class="tag">logo</span><span class="hide">, </span></span><span class="label label-tag tag-id-8"><span class="tag">tomorrow</span><span class="hide"></span></span></div></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-24" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-24"><li>
                  <a href="#" onclick="task_change_priority(1,24); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,24); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,24); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="31"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/31" onclick="init_task_modal(31); return false;">31</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/31" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(31); return false;">Use CSS to create mw-ui-icon-arrow-down from mw-ui-icon-arrow-up</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,31); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(31); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/31" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-31" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-31"><li>
                  <a href="#" onclick="task_mark_as(4,31); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,31); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,31); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,31); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/5"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Ewald Hintz" class="staff-profile-image-small mright5"></a><span class="hide">Ewald Hintz</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-31" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-31"><li>
                  <a href="#" onclick="task_change_priority(2,31); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,31); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,31); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="36"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/36" onclick="init_task_modal(36); return false;">36</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/36" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(36); return false;">Find/fix 10 broken links in the RTEMS Wiki</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/3">#3 - Brochure Design - Monahan-Monahan</a><div class="row-options"><span>
        <a href="#" class="text-success bold tasks-table-start-timer" onclick="timer_action(this,36); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(36); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/36" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-36" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-36"><li>
                  <a href="#" onclick="task_mark_as(4,36); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,36); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,36); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,36); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/3"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Davin Heathcote" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/1"><img data-toggle="tooltip" data-title="Percy Towne" src="https://perfexcrm.com/demo/uploads/staff_profile_images/1/small_1.png" class="staff-profile-image-small mright5"></a><span class="hide">Davin Heathcote, Percy Towne</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-36" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-36"><li>
                  <a href="#" onclick="task_change_priority(2,36); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,36); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,36); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="40"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/40" onclick="init_task_modal(40); return false;">40</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/40" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(40); return false;">Summarize your Experience in GCI</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/3">#3 - Brochure Design - Monahan-Monahan</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,40); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(40); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/40" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-40" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-40"><li>
                  <a href="#" onclick="task_mark_as(4,40); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,40); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,40); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,40); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/4"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Quinn Jacobs" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns, Quinn Jacobs</span></td><td></td><td><span style="color:#03a9f4;" class="inline-block">Medium<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-40" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-40"><li>
                  <a href="#" onclick="task_change_priority(1,40); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,40); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,40); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="51"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/51" onclick="init_task_modal(51); return false;">51</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/51" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(51); return false;">Find/fix 10 broken links in the RTEMS Wiki</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/4">#4 - Website Redesign - Sawayn PLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,51); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(51); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/51" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-51" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-51"><li>
                  <a href="#" onclick="task_mark_as(1,51); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,51); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,51); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,51); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/3"><img src="https://perfexcrm.com/demo/assets/images/user-placeholder.jpg" data-toggle="tooltip" data-title="Davin Heathcote" class="staff-profile-image-small mright5"></a><span class="hide">Davin Heathcote</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-51" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-51"><li>
                  <a href="#" onclick="task_change_priority(2,51); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,51); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,51); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="52"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/52" onclick="init_task_modal(52); return false;">52</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/52" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(52); return false;">Research commonly asked questions and write a FAQ</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/4">#4 - Website Redesign - Sawayn PLC</a><div class="row-options"><span>
        <a href="#" class="text-success bold tasks-table-start-timer" onclick="timer_action(this,52); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(52); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/52" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-52" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-52"><li>
                  <a href="#" onclick="task_mark_as(1,52); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,52); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,52); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,52); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/1"><img data-toggle="tooltip" data-title="Percy Towne" src="https://perfexcrm.com/demo/uploads/staff_profile_images/1/small_1.png" class="staff-profile-image-small mright5"></a><span class="hide">Percy Towne</span></td><td><div class="tags-labels"><span class="label label-tag tag-id-3"><span class="tag">logo</span><span class="hide">, </span></span><span class="label label-tag tag-id-4"><span class="tag">todo</span><span class="hide"></span></span></div></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-52" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-52"><li>
                  <a href="#" onclick="task_change_priority(2,52); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,52); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,52); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="55"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/55" onclick="init_task_modal(55); return false;">55</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/55" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(55); return false;">Summarize your Experience in GCI</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/4">#4 - Website Redesign - Sawayn PLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,55); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(55); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/55" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-55"><li>
                  <a href="#" onclick="task_mark_as(4,55); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,55); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,55); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,55); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">21/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-55"><li>
                  <a href="#" onclick="task_change_priority(1,55); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,55); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,55); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="3"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/3" onclick="init_task_modal(3); return false;">3</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/3" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(3); return false;">Make Wallpapers</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/1">#1 - Build Website - Boehm LLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,3); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(3); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/3" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#adca65;border:1px solid #adca65" task-status-table="2">Awaiting Feedback<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-3"><li>
                  <a href="#" onclick="task_mark_as(1,3); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,3); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,3); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,3); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td></td><td></td><td><span style="color:#03a9f4;" class="inline-block">Medium<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-3"><li>
                  <a href="#" onclick="task_change_priority(1,3); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,3); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,3); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="6"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/6" onclick="init_task_modal(6); return false;">6</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/6" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(6); return false;">Find/fix 10 broken links in the RTEMS Wiki</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/1">#1 - Build Website - Boehm LLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,6); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(6); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/6" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#03A9F4;border:1px solid #03A9F4" task-status-table="4">In Progress<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-6"><li>
                  <a href="#" onclick="task_mark_as(1,6); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,6); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,6); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,6); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-6"><li>
                  <a href="#" onclick="task_change_priority(2,6); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,6); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,6); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="8"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/8" onclick="init_task_modal(8); return false;">8</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/8" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(8); return false;">Research on improved audio latency in Android</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/1">#1 - Build Website - Boehm LLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,8); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(8); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/8" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#989898;border:1px solid #989898" task-status-table="1">Not Started<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-8"><li>
                  <a href="#" onclick="task_mark_as(4,8); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,8); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,8); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,8); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td></td><td></td><td><span style="color:#03a9f4;" class="inline-block">Medium<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-8"><li>
                  <a href="#" onclick="task_change_priority(1,8); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,8); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,8); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="12"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/12" onclick="init_task_modal(12); return false;">12</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/12" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(12); return false;">Fix an open issue in our software</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/1">#1 - Build Website - Boehm LLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,12); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(12); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/12" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#adca65;border:1px solid #adca65" task-status-table="2">Awaiting Feedback<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-12"><li>
                  <a href="#" onclick="task_mark_as(1,12); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,12); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,12); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,12); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#777;" class="inline-block">Low<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-12"><li>
                  <a href="#" onclick="task_change_priority(2,12); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,12); return false;">
                     High
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,12); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="21"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/21" onclick="init_task_modal(21); return false;">21</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/21" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(21); return false;">Find/fix 10 broken links in the RTEMS Wiki</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,21); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(21); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/21" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#adca65;border:1px solid #adca65" task-status-table="2">Awaiting Feedback<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-21" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-21"><li>
                  <a href="#" onclick="task_mark_as(1,21); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,21); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(3,21); return false;">
                     Mark as Testing
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,21); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#fc2d42;" class="inline-block">Urgent<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-21" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-21"><li>
                  <a href="#" onclick="task_change_priority(1,21); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,21); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(3,21); return false;">
                     High
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="23"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/23" onclick="init_task_modal(23); return false;">23</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/23" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(23); return false;">Research on improved audio latency in Android</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/2">#2 - SEO Optimization - Ward and Sons</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,23); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(23); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/23" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-23" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-23"><li>
                  <a href="#" onclick="task_mark_as(1,23); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,23); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,23); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,23); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-23" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-23"><li>
                  <a href="#" onclick="task_change_priority(1,23); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,23); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,23); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options even" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="35"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/35" onclick="init_task_modal(35); return false;">35</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/35" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(35); return false;">Add a Test Case for the GCI Website</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/3">#3 - Brochure Design - Monahan-Monahan</a><div class="row-options"><span>
        <a href="#" class="text-success bold tasks-table-start-timer" onclick="timer_action(this,35); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(35); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/35" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-35" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-35"><li>
                  <a href="#" onclick="task_mark_as(1,35); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,35); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,35); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,35); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/1"><img data-toggle="tooltip" data-title="Percy Towne" src="https://perfexcrm.com/demo/uploads/staff_profile_images/1/small_1.png" class="staff-profile-image-small mright5"></a><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Percy Towne, Trystan Johns</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-35" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-35"><li>
                  <a href="#" onclick="task_change_priority(1,35); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,35); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,35); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr><tr class="has-row-options odd" role="row"><td tabindex="0"><div class="checkbox"><input type="checkbox" value="48"><label></label></div></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/48" onclick="init_task_modal(48); return false;">48</a></td><td><a href="https://perfexcrm.com/demo/admin/tasks/view/48" class="display-block main-tasks-table-href-name mbot5" onclick="init_task_modal(48); return false;">Make Wallpapers</a><span class="hide"> - </span><a class="text-muted task-table-related" data-toggle="tooltip" title="Related To" href="https://perfexcrm.com/demo/admin/projects/view/4">#4 - Website Redesign - Sawayn PLC</a><div class="row-options"><span data-toggle="tooltip" data-title="You need to be assigned on this task to start timer!" style="opacity:0.6;cursor: not-allowed;">
        <a href="#" class="text-dark disabled tasks-table-start-timer" onclick="timer_action(this,48); return false;">Start Timer</a>
        </span><span class="text-dark"> | </span><a href="#" onclick="edit_task(48); return false">Edit </a><span class="text-dark"> | </span><a href="https://perfexcrm.com/demo/admin/tasks/delete_task/48" class="text-danger _delete task-delete">Delete </a></div></td><td><span class="inline-block label" style="color:#2d2d2d;border:1px solid #2d2d2d" task-status-table="3">Testing<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskStatus-48" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Change Status"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskStatus-48"><li>
                  <a href="#" onclick="task_mark_as(1,48); return false;">
                     Mark as Not Started
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(4,48); return false;">
                     Mark as In Progress
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(2,48); return false;">
                     Mark as Awaiting Feedback
                  </a>
               </li><li>
                  <a href="#" onclick="task_mark_as(5,48); return false;">
                     Mark as Complete
                  </a>
               </li></ul></div></span></td><td>31/08/2020</td><td class="sorting_1">28/09/2020</td><td><a href="https://perfexcrm.com/demo/admin/profile/2"><img data-toggle="tooltip" data-title="Trystan Johns" src="https://perfexcrm.com/demo/uploads/staff_profile_images/2/small_2.png" class="staff-profile-image-small mright5"></a><span class="hide">Trystan Johns</span></td><td></td><td><span style="color:#ff6f00;" class="inline-block">High<div class="dropdown inline-block mleft5 table-export-exclude"><a href="#" style="font-size:14px;vertical-align:middle;" class="dropdown-toggle text-dark" id="tableTaskPriority-48" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-toggle="tooltip" title="Priority"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="tableTaskPriority-48"><li>
                  <a href="#" onclick="task_change_priority(1,48); return false;">
                     Low
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(2,48); return false;">
                     Medium
                  </a>
               </li><li>
                  <a href="#" onclick="task_change_priority(4,48); return false;">
                     Urgent
                  </a>
               </li></ul></div></span></td></tr></tbody></table>



             </div>
          </div>

        </div>
     </div>
 </div>
<?php include_once("foot.php"); ?>