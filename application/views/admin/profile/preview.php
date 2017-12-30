<div class="modal fade user-preview" id="modalUser">
    <div class="modal-dialog user-content">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> <?php echo $user_preview['fullname']; ?></h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default profile">
                    <div class="avatar">
                        <?php if ($user_preview['avatar']): ?>
                            <img src="<?=base_url().$user_preview['avatar']?>" alt="Avatar" class="img-responsive">
                        <?php else: ?>
                            <span class="icon-avatar" style="font-size: 100px; color: #fff;"><i class="fa fa-user"></i></span> 
                        <?php endif ?>                                              
                    </div><!-- 
                    <div class="info-action">
                        <button type="button" class="btn btn-primary btn-like"><i class="fa fa-thumbs-up"></i>
                            </button>
                        <button type="button" class="btn btn-danger btn-love"><i class="fa fa-heart"></i>
                            </button>
                    </div> -->
                    <div class="img-hubt">
                        <img  src="<?=base_url()?>uploads/hubt1.jpg" alt="Ảnh bìa">
                    </div>
                </div>
                <div class="data-footer">
                    <?php if ($user_preview['fb']): ?>
                        <div class="col-md-3 col-sm-3 col-xs-3 info text-center">
                            <img src="<?=base_url()?>uploads/1.png" alt="Vip" title="Vip" class="img-vip" >
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 info text-center">
                            <h5><?php echo $quiz['total_quiz'];  ?></h5>
                            <p class="info-description"><i class="fa fa-book" aria-hidden="true"></i> QUIZ</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 info text-center">
                            <h5><?php echo $quiz['total_view']; ?></h5>
                            <p class="info-description"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 info text-center" style="height: 65px;padding: 15px;">
                            <a href="<?php echo $user_preview['fb'] ?>" title="Facebook" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    <?php else: ?>
                        <div class="col-md-4 col-sm-4 col-xs-4 info text-center">
                            <img src="<?=base_url()?>uploads/1.png" alt="Vip" title="Vip" class="img-vip" >
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 info text-center">
                            <h5><?php echo $quiz['total_quiz'];  ?></h5>
                            <p class="info-description"><i class="fa fa-book" aria-hidden="true"></i> QUIZ</p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 info text-center">
                            <h5><?php echo $quiz['total_view']; ?></h5>
                            <p class="info-description"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</p>
                        </div>
                    <?php endif ?>
                    
                    <div class="clearfix">            
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>