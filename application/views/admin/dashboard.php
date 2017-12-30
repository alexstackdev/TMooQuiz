<div id="page-wrapper">
    <div class="container-fluid">    
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header title">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#" onclick="return false;">Admin</a>
                      </li>
                      <li class="breadcrumb-item active">My Dashboard</li>
                    </ol>
                </h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $total['quiz'] ?></div>
                                <div>Quiz</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $total['user']; ?></div>
                                <div>User</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $total['vip']; ?></div>
                                <div>User Vip!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=base_url()?>admin/manager_user.html">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lịch sử hoạt động</h3>
            </div>
            <div class="panel-body">
                <ul  class="nav nav-tabs nav-vip" role="tablist" data-user="<?=base_url()?>admin/profile/preview">
                      <li class="active"><a href="#quiz" role="tab" data-toggle="tab" class=""><i class="fa fa-fw fa-book"></i> Quiz</a></li>
                      <li><a href="#user" role="tab" data-toggle="tab" class=""><i class="fa fa-user"></i> User</a></li>
                      <li><a href="#vip" role="tab" data-toggle="tab" class=""><i class="fa fa-money"></i> VIP</a></li>
                    </ul>
                <div class="tab-content">                    
                    <!-- tab panel -->
                    <div class="tab-pane fade in active" id="quiz">
                        <div class="table">
                            <table width="100%" class="table table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="65px">Device</th>
                                        <th >Action</th>
                                        <th width="120px">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($history_quiz as $item): ?>                                        
                                        <?php if ($item->type == 4 ): ?>
                                            <tr class="history-item">
                                                <td class="text-center">
                                                    <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                                </td>
                                                <td>
                                                    <?php if ($item->vip == 1): ?>
                                                        <span class="meta-user">
                                                          <i class="fa fa-user"></i>  <a href="#" onclick="InfoUser(<?php echo $item->user_id ?>)">
                                                            <?php if ($item->avatar): ?>
                                                              <span class="icon-avt"><img class="img-responsive" width="15" height="15" src="<?=base_url().$item->avatar?>" ></span>
                                                            <?php endif ?>
                                                            <?php echo $item->fullname; ?>
                                                           <img src="<?=base_url()?>uploads/2.png" width="10" height="10" class="icon-vip">
                                                       </a>
                                                      </span>
                                                    <?php else: ?>
                                                        <span class="meta-user">
                                                            <i class="fa fa-user"></i> Thành viên: <?php echo $item->fullname; ?>
                                                        </span>
                                                    <?php endif ?>
                                                    <span>
                                                        tạo quiz <a href="<?=base_url().'quiz/'.$item->quiz_id.'/'.$item->quiz_slug?>.html">
                                                            <?php echo $item->title; ?>
                                                        </a>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="meta-time">
                                                        <?php echo $this->mcode->convertTime($item->created_at); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                        <?php if ($item->type == 5 ): ?>
                                            <tr class="history-item">
                                                <td class="text-center">
                                                    <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->content; ?>
                                                </td>
                                                <td>
                                                    <span class="meta-time">
                                                        <?php echo $this->mcode->convertTime($item->created_at); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user">
                        <div class="table">
                            <table width="100%" class="table table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="65px">Device</th>
                                        <th >Action</th>
                                        <th width="120px">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($history_action as $item): ?>
                                        <tr class="history-item">
                                            <td class="text-center" style="font-size: 20px">
                                                <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                            </td>
                                            <td>                                                    
                                                <?php if ($item->vip == 1): ?>
                                                <span class="meta-user">
                                                  <a href="#" onclick="InfoUser(<?php echo $item->user_id ?>)">
                                                    <?php if ($item->avatar): ?>
                                                      <span class="icon-avt"><img class="img-responsive" src="<?=base_url().$item->avatar?>" width="15" height="15"></span>
                                                    <?php endif ?>
                                                    <?php echo $item->fullname; ?>
                                                   <img src="<?=base_url()?>uploads/2.png" width="10" height="10" class="icon-vip">
                                               </a>
                                              </span>
                                            <?php else: ?>
                                                <span class="meta-user">
                                                    <i class="fa fa-user"></i> Thành viên: <?php echo $item->fullname; ?>
                                                </span>
                                            <?php endif ?>
                                            <span>
                                                đã làm đề thi <a href="<?=base_url().'quiz/'.$item->quiz_id.'/'.$item->quiz_slug?>.html">
                                                            <?php echo $item->title; ?>
                                                        </a>
                                            </span>
                                            </td>
                                            <td>
                                                <span class="meta-time">
                                                    <?php echo $this->mcode->convertTime($item->created_at); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="vip">
                        <div class="table">
                            <table width="100%" class="table table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="65px">Device</th>
                                        <th >Action</th>
                                        <th width="120px">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($history_vip as $item): ?>                                        
                                        <tr class="history-item">
                                            <td class="text-center" style="font-size: 20px">
                                                <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                            </td>
                                            <td>                                                    
                                                <span class="meta-user">
                                                    <i class="fa fa-user"></i> 
                                                    <?php 
                                                        echo "$item->fullname "; 
                                                        echo $item->type==2 ? $item->content : "đã nạp vào tài khoản $item->content VNĐ";
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="meta-time">
                                                    <?php echo $this->mcode->convertTime($item->created_at); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>