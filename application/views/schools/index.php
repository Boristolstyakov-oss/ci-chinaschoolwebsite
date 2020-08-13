
       <div id="content"><!--内容开始-->
           <section class="one">
               <div class="wrapper">
                   <h2><?=$schools['0']['School_Province']?></h2>
                   <div class="hr"></div>
                   <p class="sub-heading">Lorem ipsum dolor sit  quasi minus laboriosam sit doloremque. Repellendus sint voluptatem illum, maiores in atque quaerat aspernatur ad alias!</p>
              </div>
              <article class="card-group clearfix">
                    <?php foreach ($schools as $schoolInfo): ?>
                    <div class="card">
                       <h3><a href="<?=site_url("../../../school/".$schoolInfo['ID'])?>"><?=$schoolInfo['SchoolName']?></a></h3>
                       <p>
                         <table>
                            <tr><td class="forum"><a id="forum" href="<?=site_url("../../../forum/".$schoolInfo['ID'])?>">进入论坛</a></td></tr>
                           <tr>
                             <td><?=$schoolInfo['SchoolIntro']?></td>
                           </tr>
                            <tr style="color:#0C2715">
                                <td class="more"><a href="<?=site_url("../../../school/".$schoolInfo['ID'])?>">more...</a></td>
                            </tr>
                         </table>
                      </p>
                    </div>
                    <?php endforeach; ?>

              </article>
               <div id="page">
                   <a href="<?=site_url('../../../location/'.$loc.'/'.$page_p)?>"><= 上一页</a>
                   <?php foreach ($page as $page_num): ?>
                   <a href="<?=site_url('../../../location/'.$loc.'/'.$page_num)?>">&nbsp;<?=$page_num?>&nbsp;</a>
                   <?php endforeach; ?>
                   <a href="<?=site_url('../../../location/'.$loc.'/'.$page_n)?>">下一页 =></a>
               </div>
           </section>
       </div><!--内容结束-->
