<?php /*a:4:{s:30:"./../view/member\register.html";i:1670219548;s:21:"./../view/layout.html";i:1670489317;s:28:"./../view/public\member.html";i:1670489220;s:25:"./../view/public\nav.html";i:1669855884;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlentities($site['sitetitle']); ?></title>
    <link rel="stylesheet" href="/static/theme/default/css/index.css?t=<?php echo time(); ?>" />
    
  </head>
  <body>
    <header>
      <?php if($member): ?>
<div>
  <span>你好，<?php echo htmlentities($member['username']); ?></span>
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
<form
  action="<?php echo url('index/member/register'); ?>"
  method="post"
  onsubmit="return formcallback();"
>
  <div>
    <div>账号</div>
    <div><input type="text" name="username" /></div>
  </div>
  <div>
    <div>密码</div>
    <div><input type="password" name="password" /></div>
  </div>
  <div>
    <div>确认密码</div>
    <div><input type="password" name="confirm_pasword" /></div>
  </div>
  <div>
    <div></div>
    <div><button type="submit">注册</button></div>
  </div>
</form>
</main>
    <footer>
      <div class="footer">版权所有</div>
    </footer>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    
<script>
  function formcallback() {
    var params = $("form").serialize();
    $.ajax({
      type: "post",
      url: $("form").attr("action"),
      data: params,
      dataType: "json",
      success: function (response) {
        alert(response.msg);
        if (response.data.url) {
          window.location.href = response.data.url;
        }
      },
      error: function (e) {
        alert(e.responseJSON.message);
      },
    });
    return false;
  }
</script>

  </body>
</html>
