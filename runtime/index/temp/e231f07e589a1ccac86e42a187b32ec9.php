<?php /*a:4:{s:26:"./../view/member\edit.html";i:1670505168;s:21:"./../view/layout.html";i:1670489317;s:28:"./../view/public\member.html";i:1670489220;s:25:"./../view/public\nav.html";i:1669855884;}*/ ?>
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
<div class="member_paner">
  <div class="menu">
    <div class="header">
      <div>账号</div>
      <div><?php echo htmlentities($member['username']); ?></div>
    </div>
    <div class="item">
      <a href="<?php echo url('index/member/index'); ?>">基础资料</a>
    </div>
    <div class="item">
      <a href="<?php echo url('index/member/safe'); ?>">账号安全</a>
    </div>
    <div class="item">
      <a href="<?php echo url('index/member/safe'); ?>">文章中心</a>
    </div>
  </div>
  <div class="main" id="container">
    <div class="mtit">
      <div>编辑-基础资料</div>
    </div>
    <hr />
    <form
      action="<?php echo url('index/member/edit'); ?>"
      method="post"
      onsubmit="return formcallback()"
    >
      <table border="1px">
        <tr>
          <td>ID：</td>
          <td><?php echo htmlentities($member['id']); ?></td>
        </tr>
        <tr>
          <td>账号：</td>
          <td><?php echo htmlentities($member['username']); ?></td>
        </tr>
        <tr>
          <td>注册时间：</td>
          <td><?php echo htmlentities($member['create_time']); ?></td>
        </tr>
        <tr>
          <td>手机：</td>
          <td>
            <input type="text" name="mobile" value="<?php echo htmlentities($member['mobile']); ?>" />
          </td>
        </tr>
        <tr>
          <td>邮箱：</td>
          <td><input type="text" name="email" value="<?php echo htmlentities($member['email']); ?>" /></td>
        </tr>
        <tr>
          <td>头像：</td>
          <td>
            <?php if($member['avatar']): ?>
            <img
              src="<?php echo htmlentities($member['userpic']['filepath']); ?>"
              width="70"
              height="70"
              id="avatar"
            />
            <br />
            <button type="button" id="upload">重新上传</button>
            <?php else: ?> <button type="button" id="upload">点我上传</button> <?php endif; ?>
          </td>
        </tr>
      </table>
      <div>
        <button type="submit">保存</button>
        <a href="javascript:history.go(-1)">返回</a>
      </div>
    </form>
  </div>
</div>
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
<script src="/static/theme/default/js/plupload.js"></script>
<script>
  var uploader = new plupload.Uploader({
    runtimes: "html5",
    browse_button: "upload",
    container: document.getElementById("container"),
    multipart_params: { tag: "userpic" },
    url: "<?php echo url('index/member/upload'); ?>",
    filters: {
      max_file_size: "2mb",
      mime_types: [{ title: "Image files", extensions: "jpg,gif,png" }],
    },
    init: {
      PostInit: function () {},
      FilesAdded: function (up, files) {
        uploader.start();
      },
      UploadProgress: function (up, file) {},
      FileUploaded: function (up, file, res) {
        let d = JSON.parse(res.response);
        console.log(res.response);
        if (document.getElementById("avatar")) {
          document.getElementById("avatar").src = d.data.url;
        }
        alert(d.msg);
      },
      Error: function (up, err) {},
    },
  });
  uploader.init();
</script>

  </body>
</html>
