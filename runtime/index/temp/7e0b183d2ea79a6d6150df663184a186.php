<?php /*a:4:{s:34:"./../view/member\article_post.html";i:1673060881;s:21:"./../view/layout.html";i:1670489317;s:28:"./../view/public\member.html";i:1670489220;s:25:"./../view/public\nav.html";i:1669855884;}*/ ?>
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
      <a href="<?php echo url('index/member/article'); ?>">文章中心</a>
    </div>
  </div>
  <div class="main">
    <div class="mtit">
      <div>文章发布</div>
    </div>
    <hr />
    <form action="<?php echo url('index/member/article'); ?>" method="post">
      <table width="100%">
        <tr>
          <td>标题</td>
          <td>
            <input type="text" name="title" value="<?php echo htmlentities((isset($r['title']) && ($r['title'] !== '')?$r['title']:'')); ?>" />
          </td>
        </tr>
        <tr>
          <td>描述</td>
          <td>
            <textarea name="intro" rows="4" style="width: 100%">
<?php echo htmlentities((isset($r['intro']) && ($r['intro'] !== '')?$r['intro']:'')); ?></textarea>
          </td>
        </tr>
        <tr>
          <td>详情</td>
          <td>
            <div id="editor"></div>
            <div id="btn">获取内容</div>
            <div id="content"></div>
          </td>
        </tr>
      </table>
      <div>
        <button type="submit">提交</button>
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
    
<script src="/static/theme/default/ckeditor5/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector("#editor"), {
    simpleUpload: {
      uploadUrl: '<?php echo url("index/member/upload"); ?>'
    },
    language: "zh-cn",
  })
    .then((editor) => {
      window.editor = editor;
      let btn = document.querySelector("#btn");
      btn.onclick = () => {
        let content = editor.getData();
        document.getElementById("content").innerHTML = content;
      };
    })
    .catch((error) => {
      console.error("There was a problem initializing the editor.", error);
    });
</script>

  </body>
</html>
