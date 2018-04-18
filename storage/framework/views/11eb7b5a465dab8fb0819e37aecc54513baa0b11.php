<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
                            <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li ><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user text-danger"></i>
                <span>Account</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.account.form')); ?>"><i class="fa fa-circle-o"></i> Add </a></li>
                <li><a href="<?php echo e(route('admin.account.list')); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="<?php echo e(route('admin.userClass.list')); ?>"><i class="fa fa-circle-o"></i> User + Class</a></li>                
            </ul>
        </li> 
        <?php if(Auth::guard('admin')->user()->minus()->where('minu_id',1)->first()->status == 1): ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user text-warning"></i>
                <span>Student</span>
                <span class="pull-right-container">
                  
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.student.form')); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                
                <li><a href="<?php echo e(route('admin.student.show')); ?>"><i class="fa fa-circle-o"></i> Show</a></li>
                <li><a href="<?php echo e(route('admin.student.excel.import')); ?>"><i class="fa fa-circle-o"></i> Excel Import</a></li>
            </ul>
        </li>
         <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note text-primary"></i>
                <span>Report</span>
                <span class="pull-right-container">
                  
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.student.report')); ?>"><i class="fa fa-circle-o"></i> Student Report</a></li>

                
            </ul>
        </li>
        <?php endif; ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs text-danger"></i>
                <span>Manage</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>            
            <ul class="treeview-menu">
                <?php if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->status == 1): ?>
                <li><a href="<?php echo e(route('admin.class.list')); ?>"><i class="fa fa-circle-o"></i> Add Class</a></li>
                <li><a href="<?php echo e(route('admin.section.list')); ?>"><i class="fa fa-circle-o"></i> Add Section</a></li>
                <?php endif; ?>
                
                <li><a href="<?php echo e(route('admin.manageSection.list')); ?>"><i class="fa fa-circle-o"></i> Manage Section</a></li>
            </ul>
        </li>      
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book text-info"></i>
                <span>Subject</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.subjectType.list')); ?>"><i class="fa fa-circle-o"></i> Subject Type </a></li>               
                <li><a href="<?php echo e(route('admin.subject.manageSubject')); ?>"><i class="fa fa-circle-o"></i> Manage Subject </a></li>            
                
            </ul>
        </li>
         
        <li class="treeview">
            <a href="#">                
                <i class="fa fa-users text-warning"></i>
                <span>User Activity</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.activity.list')); ?>"><i class="fa fa-circle-o"></i> Activity List </a></li>              
                
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note text-primary"></i>
                <span>Homework</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.homework.list')); ?>"><i class="fa fa-circle-o"></i> List </a></li>  
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note text-danger"></i>
                <span>Certificate Issue</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo e(route('admin.student.certificateIssu.apply')); ?>"><i class="fa fa-circle-o"></i> Apply </a></li>
                <li><a href="<?php echo e(route('admin.student.certificateIssu.list')); ?>"><i class="fa fa-circle-o"></i> Apply List </a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-rupee text-danger"></i>                
                <span>Finance</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li></li>
                <li><a href="<?php echo e(route('admin.feeAcount.list')); ?>"><i class="fa fa-circle-o"></i>Fee Accounts </a></li>
                <li><a href="<?php echo e(route('admin.feeStructure.list')); ?>"><i class="fa fa-circle-o"></i>Fee Structure </a></li> 
                <li><a href="<?php echo e(route('admin.feeStructureLastDate.list')); ?>"><i class="fa fa-circle-o"></i>Fee Fine Scheme </a></li>                 
                <li><a href="<?php echo e(route('admin.fineScheme.list')); ?>"><i class="fa fa-circle-o"></i>Fee Structure Last Date </a></li> 
                <li><a href="<?php echo e(route('admin.classFeeStructure.list')); ?>"><i class="fa fa-circle-o"></i> Class Fee Structure </a></li> 
            </ul>
        </li>
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
