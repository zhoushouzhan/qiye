<?php /*a:4:{s:32:"./../view/home/member\check.html";i:1681564773;s:26:"./../view/home/layout.html";i:1670489317;s:33:"./../view/home/public\member.html";i:1670489220;s:30:"./../view/home/public\nav.html";i:1669855884;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($site['sitetitle']); ?></title>
    <link rel="stylesheet" href="/static/theme/default/css/index.css?t=<?php echo time(); ?>" />
    
  </head>
  <body>
    <header>
      <?php if($member): ?>
<div>
  <span>你好，<?php echo htmlspecialchars($member['username']); ?></span>
  <a href="<?php echo url('index/member/index'); ?>">用户中心</a>
  <a
    href="<?php echo url('index/member/loginout'); ?>"
    onclick="return confirm('确定要退出吗？')"
    >退出</a
  >
</div>

<?php else: ?>
<div>
  <a href="<?php echo url('index/member/login'); ?>">登录</a>
  <a href="<?php echo url('index/member/register'); ?>">注册</a>
</div>

<?php endif; ?>
 <nav class="yp-nav">
  <ul>
    <li><a href="/index.html">首页</a></li>
    <?php echo $nav; ?>
  </ul>
</nav>

    </header>
    <main>

    <table border="1px">
        <tr>
          <td>ID：</td>
          <td><?php echo htmlspecialchars($member['id']); ?></td>
        </tr>
        <tr>
          <td>账号：</td>
          <td><?php echo htmlspecialchars($member['username']); ?></td>
        </tr>
        <tr>
          <td>注册时间：</td>
          <td><?php echo htmlspecialchars($member['create_time']); ?></td>
        </tr>
        <tr>
          <td>手机：</td>
          <td><?php echo htmlspecialchars((isset($member['mobile']) && ($member['mobile'] !== '')?$member['mobile']:"未填写")); ?></td>
        </tr>
        <tr>
          <td>邮箱：</td>
          <td><?php echo htmlspecialchars((isset($member['email']) && ($member['email'] !== '')?$member['email']:"未填写")); ?></td>
        </tr>
        <tr>
          <td>头像：</td>
          <td>
            <?php if($member['avatar']): ?>
            <img src="<?php echo htmlspecialchars($member['userpic']['filepath']); ?>" width="70" height="70" />
            <?php else: ?> <?php echo $member['avatar']==0 ? "未上传" : htmlspecialchars($member['avatar']); ?> <?php endif; ?>
          </td>
        </tr>
      </table>

      <div>
        <?php echo htmlspecialchars((isset($member['enabled_text']) && ($member['enabled_text'] !== '')?$member['enabled_text']:"审核中")); ?>
      </div>



</main>
    <footer>
      <div class="footer">版权所有</div>
    </footer>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    
  </body>
</html>
