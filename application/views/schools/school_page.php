<div class="rightdiv">
       <div id="content"><!--内容开始-->
           <div id="back_to">
               <button>
                   <a href="<?=site_url('../../location/'.$province_id)?>">回到上页</a>
               </button>
           </div>
           <section class="one">
               <div class="wrapper">
                <?php
                 // var_dump($schools); 
                // var_dump($list);
                ?>
                   <h2 style=" text-align: center;"><?=$schools['0']['SchoolName']?></h2>
                   <div class="hr"></div>
                   <p class="sub-heading"><?=$schools['0']['SchoolIntro']?></p>
              </div>   
              <article>  
                  <p>
                      <?=$schools['0']['schoolCon']?>
                    </p> 
                 
              </article>
           </section>    
       </div><!--内容结束-->
