<!— BEGIN: ACCOUNT/LOGO-CROP-MODAL  —>
<div class="modal fade c-content-login-form" id="crop-logo-form1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="max-width:810px">
        <div class="modal-content c-square" style="padding:15px">
            <div class="modal-header c-no-border" style="font-size:24px;"><?php echo $lang_crop_image;?>
                <button type="button" class="close crop_close1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 responsive-1024">
                        <!— This is the image we're attaching Jcrop to —>
                        <img src="" id="dem82" alt="Jcrop Example" class="img-responsive"/>                                                   
                    </div>
                    <div class="col-md-3 col-sm-12 responsive-1024 margin-top-20">
                        
                        <input type="hidden" id="crop2_x" name="crop2[x]" />
                        <input type="hidden" id="crop2_y" name="crop2[y]" />
                        <input type="hidden" id="crop2_w" name="crop2[w]" />
                        <input type="hidden" id="crop2_h" name="crop2[h]" />
                        <input type="button" value="<?php echo $lang_crop_img;?>" class="btn btn-large green btn-block" style="margin:20px;margin-left:0px" id="crplogo1"/> 
                        
                    </div>

                </div>
            </div>
            <div style="padding:15px;border-top:1px solid #e5e5e5">
                <div class=row>
                    <small><?php echo $lang_notes;?></small>
                </div>
            </div>
        </div>
    </div>
</div> 
<!— END: ACCOUNT/LOGO-CROP-MODAL  —>