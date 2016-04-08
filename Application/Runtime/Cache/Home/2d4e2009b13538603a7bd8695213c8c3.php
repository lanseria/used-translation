<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="柠檬工作室 LimonPlayer Studio">
  <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
  <meta name="author" content="作者：张超 <limonplayer.cn>"
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>背包客Backpacker-校园二手商品信息发布平台</title>
  <link rel="stylesheet" href="/Public/css/font-awesome.min.css">
  <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/css/owl.carousel.css" rel="stylesheet">
  <link href="/Public/css/owl.theme.css" rel="stylesheet">
  <link href="/Public/css/owl.transitions.css" rel="stylesheet">
  <link href="/Public/css/style.css" rel="stylesheet">
  <link href="/Public/css/config.css" rel="stylesheet">
  <link href="/Public/css/docs.min.css" rel="stylesheet">
  <link rel="icon" href="/Public/favicon.ico">
</head>
<body>
  <header id="header" class="navbar-fixed-top">
    <div id="top-bar">
      <div class="container">
        <nav id="language-selector">
          <ul class="nav nav-pills">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chinese <b class="caret"></b></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">English</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <nav id="shopping-cart">
          <a href="#">
            <i class="icon-shopping-cart"></i> 爱包
            <span class="fa-stack">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-stack-1x fa-inverse" id="icnum"><?php echo ($cartnum); ?></i>
            </span>
          </a>
        </nav>
        <nav id="top-nav" role="navigation" class="navbar">
          <div class="navbar-header">
            <button data-target=".top-nav" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse top-nav">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo U('Home/Index/about');?>">关于</a></li>
              <!--<li><a href="<?php echo U('Home/Index/blog');?>">博客</a></li>-->
              <li><a href="<?php echo U('Home/Index/contact');?>">联系我们</a></li>
              
              <?php if(isset($_SESSION['logineduser'])): ?><li><a href="<?php echo U('/Dashboard/Index/index');?>?uid=<?php echo (session('logineduserid')); ?>">欢迎您,<?php echo (session('logineduser')); ?>!</a></li>
               <li><a href="/Home/User/logout">注销</a></li>
               <?php else: ?>
               <li><a href="#" data-toggle="modal" data-target="#login_register">登录 / 注册</a></li><?php endif; ?>
           </ul>
         </div>
       </nav>
     </div>
   </div>
   <nav id="main-nav">
    <div class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>"><img src="/Public/img/logo-hword.png" alt="backpacker" class="img-responsive img-config"></a>
        </div>
        <div class="navbar-collapse collapse main-nav">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">学习资料<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=1">语言类</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=2">理工科类</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=3">文学类</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=4">闲暇类</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">衣服/化妆 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=5">男生</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=6">女生</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=7">宝宝</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=8">大叔</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">数码配件 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=9">笔记本</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=10">通讯类</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=11">摄影</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=12">配件</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">娱乐售出 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=13">电影票</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=14">演唱会门票</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=15">免费票</a></li>
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=16">其他</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">其他</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo U('/Home/Goods/category');?>?tid=17">其他</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

</header>

<!-- ========== MENU END ========== -->
<!-- ========== CONTENT START ========== -->
<section id="content">
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="<?php echo U('Home/Index/index');?>">背包客</a></li>
      <li><a href="<?php echo U('Home/Goods/category');?>?tid=<?php echo ($goodsmsg["gtypeid"]); ?>"><?php echo ($typename); ?></a></li>
    </ol>

    <div class="row">
      <div class="col-sm-3 sidebar">

        <aside class="widget widget_product_categories">
          <h3 class="widget-title">Categories:</h3>
          <ul>
            <li>
              <a href="#">学习资料</a>
              <ul>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=1">语言类</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=2">理工科类</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=3">文学类</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=4">闲暇类</a></li>
              </ul>
            </li>
            <li>
              <a href="#">衣服/化妆</a>
              <ul>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=5">男生</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=6">女生</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=7">宝宝</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=8">大叔</a></li>
              </ul>
            </li>
            <li>
              <a href="#">数码配件</a>
              <ul>
              <li><a href="<?php echo U('Home/Goods/category');?>?tid=9">笔记本</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=10">通讯类</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=11">摄影</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=12">配件</a></li>
              </ul>
            </li>
            <li>
            <a href="#">娱乐售出</a>
             <ul>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=13">电影票</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=14">演唱会门票</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=15">免费票</a></li>
                <li><a href="<?php echo U('Home/Goods/category');?>?tid=16">其他票</a></li>
              </ul>
            </li>
            <li><a href="<?php echo U('Home/Goods/category');?>?tid=17">其他</a></li>
          </ul>
        </aside>
      </div>

      <div class="col-sm-9">

        <ul class="products row">
          <?php if(is_array($goodsmsg)): $i = 0; $__LIST__ = $goodsmsg;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="col-sm-4 first">
              <div class="product">
                <div class="thumbnail">
                  <a href="<?php echo U('/Home/Goods/product');?>?gid=<?php echo ($vo["gid"]); ?>"><img src="/Public/pic/<?php echo ($vo["gimgarray"]); ?>" alt=""></a>
                  <a href="javascript:addCart(<?php echo ($vo["gid"]); ?>);" class="add-to-cart" title="Add to Cart">
                    <span class="fa-stack fa-2x">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </div>
                <hr>
                <div class="title">
                  <h3><a href="#"><?php echo ($vo["gname"]); ?></a></h3>
                  <p>by <?php echo ($vo["gadname"]); ?></p>
                </div>
                <span class="price">￥<?php echo ($vo["gprice"]); ?></span>
              </div>
            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
        </ul>
        
      </div>

    </div>

  </div>
</section>

<!-- ========== CONTENT END ========== -->
<!-- ========== FOOTER START ========== -->


<div id="copyright">
<div class="container">&copy; Copyright Limonplayer 2016 | All Rights Reserved | Designed by Lanseria</a></div>
  <ul class="bs-docs-footer-links text-muted">
    <li><a href="<?php echo U('Home/Index/index');?>">Home</a></li>
    <li>·</li>
    <li><a href="<?php echo U('Home/Index/about');?>">About Us</a></li>
    <li>·</li>
    <li><a href="#">What’s New</a></li>
    <li>·</li
      <li><a href="<?php echo U('Home/Goods/category');?>">category</a></li>
      <li>·</li>
      <li><a href="<?php echo U('Home/Goods/product');?>">product</a></li>
      <li>·</li>
      <li><a href="http://limonplayer.cn">实例精选</a></li>
      <li>·</li>
      <li><a href="http://blog.limonplayer.cn/">官方博客</a></li>
    </ul>
  </div>

</footer>

<!-- ========== FOOTER END ========== -->

<div id="cart-panel" class="panel-left">
  <aside class="widget_shopping_cart">
    <h3>爱包</h3>
    <ul class="cart_list">
      <?php if(is_array($cartmsg)): $i = 0; $__LIST__ = $cartmsg;if( count($__LIST__)==0 ) : echo "暂时没有货物" ;else: foreach($__LIST__ as $key=>$cartvo): $mod = ($i % 2 );++$i;?><li>
          <a href="<?php echo U('/Home/Goods/product');?>?gid=<?php echo ($cartvo["gid"]); ?>">
            <img alt="" style="width: 60px;" src="/Public/pic/<?php echo ($cartvo["gimgarray"]); ?>">
            <?php echo ($cartvo["gname"]); ?>
          </a>
          <span class="quantity"><?php echo ($cartvo["cnum"]); ?> × <span class="amount">￥<?php echo ($cartvo["gprice"]); ?></span></span>
        </li><?php endforeach; endif; else: echo "暂时没有货物" ;endif; ?>
    </ul>
    <p class="total"><strong>预计:</strong> <span class="amount" id="sumspan">￥<?php echo ($sumPrice); ?></span></p>
    <p class="buttons">
      <a class="btn btn-default btn-lg btn-block" href="<?php echo U('Home/Goods/cart');?>">看爱包</a>
    </p>
  </aside>
</div>
<div class="model">
  <div class="modal fade" id="login_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">登录</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?php echo U('Home/User/login');?>" method="post">
            <div class="form-group">
              <input type="email" class="form-control input-lg" id="exampleInputEmail" name="uemail" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="exampleInputPassword" name="upwd" placeholder="Password">
            </div>
            <div class="checkbox pull-left">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
            <a href="#" class="pull-left" id="forgot-password">Forgot Your Password?</a>
            <div class="pull-right">
              <button type="submit" class="btn btn-lg btn-config">Log In</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#register">Register</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">注册</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?php echo U('Home/User/register');?>" method="post">
            <div class="form-group">
              <input type="nickname" class="form-control input-lg" id="exampleInputEmail" name="uname" placeholder="Nickname">
            </div>
            <div class="form-group">
              <input type="email" class="form-control input-lg" id="exampleInputEmail" name="uemail" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="exampleInputPassword" name="upwd" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="exampleInputPassword" name="ucpwd" placeholder="Confirm_The_Password">
            </div>
            <div class="checkbox pull-left">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-lg btn-config">Sign In</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#login_register">Log in</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/owl.carousel.min.js"></script>
<script src="/Public/js/jquery.jpanelmenu.min.js"></script>
<script src="/Public/js/main.js"></script>
<script type="text/javascript">
  jQuery(function($){
    var imglogo=$(".img-config"); 
    var win=$(window); 
    var sc=$(document);
    win.scroll(function(){
      if(sc.scrollTop()>=60){
        imglogo.removeClass("img-config");
        imglogo.addClass("small-logo"); 
        $("ul.navbar-right>li").addClass("navtext");
        $("ul.navbar-right>li>a").height(70);
        $("ul.navbar-right>li>a").css({"line-height":"70px"});
      }else{
       imglogo.removeClass("small-logo");
       imglogo.addClass("img-config");
       $("ul.navbar-right>li").removeClass("navtext");
       $("ul.navbar-right>li>a").height(110);
       $("ul.navbar-right>li>a").css({"line-height":"110px"});
     }
   })
  });
</script>
<script type="text/javascript">
  function addCart($gid){
    //ajax请求php脚本完成书库的添加 b_cart
    var url = "<?php echo U('Home/Ajax/addCart');?>";
    var data = {"gid":$gid,"cnum":isNaN(parseInt($("#Qty").val())) ? 1 : parseInt($("#Qty").val())};
    var success = function(response){
      if(response=='Nouser'){
        alert(response+'请先登录注册');
      }
      else{
        if(response)
        {
          alert('加入爱包成功');
        //添加ajax请求更新爱包
        $.ajax({
          url: "<?php echo U('Home/Ajax/seeCart');?>",
          type: "post",
          dataType: "json",
          success: function (data) {
            $('#icnum').html(data['cartnum']);
            $('.amount').html(data['sumPrice']);
          }
        });
      }
      else{
        alert('加入失败');
      }
    }
  }
  $.post(url, data ,success, "json");
}
</script>
</body>
</html>