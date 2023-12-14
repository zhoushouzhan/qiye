<?php /*a:4:{s:31:"./../view/home/index/index.html";i:1701774703;s:26:"./../view/home/layout.html";i:1670489317;s:33:"./../view/home/public/member.html";i:1670489220;s:30:"./../view/home/public/nav.html";i:1669855884;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>首页</title>
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
    <main>中部</main>
    <footer>
      <div class="footer">版权所有</div>
    </footer>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    
  </body>
</html>
