<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title></title>
    <!-- Bootstrap -->
    <link href="/wkb/Public/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/wkb/Public/css/main.css" rel="stylesheet">

    <style type="text/css">
      .mblack
      {
        padding-top: 4px;
        padding-left: 8px;
        vertical-align: top;
        white-space: nowrap;
      }

      .checked {
        background:url("./true.png") no-repeat center center;
      }
    </style>
  </head>
  <body>
    <header class="navbar" id="top">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="../" class="navbar-brand">
            <img src="/wkb/Public/images/logo.png" height="48" width="135" >
          </a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://<?php echo C('HOST_HOME');?>" >首页</a></li>
            <li><a href="http://<?php echo C('HOST_HOME');?>#log" >交易记录</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="jumbotron masthead" style="background: url(/wkb/Public/images/toppic.png) bottom;" >
      <div class="container">
        <h1 class="text-center " style="margin-top: 100px">Top up prepaid mobile phones with bitcoin in <br> China and around the world</h1>
      </div>
    </div>
    <div class="container-fluid border-bottom">
      <div class="container">
        <div class="wrap mcb-wrap one box-shadow column-margin-0px valign-top clearfix" style="padding:40px 5%; background-color:#ffffff; margin-top:-136px; margin-bottom: 60px;box-shadow: 0 30px 30px 0 rgba(0, 0, 0, 0.05);">
          <div class="mcb-wrap-inner">
            <div class="column mcb-column one column_column ">
              <div class="column_attr clearfix align_center">
                <div class="row text-center ">
                  <h2 class="text-center border-bottom choes">请选择BTC交易</h2>
                  <ul class="nav nav-pills text-center pillcenter">
                    <li role="presentation" class="active"><a href="#buybtc" aria-controls="buybtc" role="tab" data-toggle="tab">买入BTC</a></li>
                    <li role="presentation"><a href="#sellbtc" aria-controls="sellbtc" role="tab" data-toggle="tab">卖出BTC</a></li>
                    <!--<li role="presentation"><a href="#buylist" class="lastchild" aria-controls="buylist" role="tab" data-toggle="tab">交易记录</a></li>-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div>
          <!-- Nav tabs -->
          
          <!-- Tab panes -->
          <div class="wrap mcb-wrap one box-shadow column-margin-0px valign-top clearfix" style="padding:40px 5%; background-color:#ffffff; margin-top:-136px; margin-bottom: 60px;box-shadow: 0 30px 30px 0 rgba(0, 0, 0, 0.05);">
            <div class="tab-content mb40 " style="margin-top: 25px;">
              <div class="linered"> <span>&nbsp;</span></div>
              <div role="tabpanel" class="tab-pane active" id="buybtc">
                <div class="row" >
                  <div class="col-sm-6 col-sm-offset-3 ">
                    <form action=<?php echo U('Index/check');?> id="buy" method="post">
                      <div class="row">
                        <div class="col-sm-6 ">
                          <div class="form-group">
                            <label>购买比特币</label>
                            <input type="text" class="form-control number" id="buybitnum" name="num" type="number" maxlength="9" placeholder="请输入购买数量" required >
                            <input type="hidden" class="form-control" id="buyhiddenprice"  name="price" value="" >
                            <p class="help-block">买入价：<span class="runcolor"><?php echo ($price); ?></span> /个</p>
                          </div>
                        </div>
                        <div class="col-sm-6 ">
                          <div class="form-group">
                            <label>邮箱</label>
                            <input type="text" class="form-control email" name="email"  type="email" placeholder="请输入您的邮箱" maxlength="32"  required >
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>价格</label>
                        <input type="text" class="form-control" name="total"   id="buybitprice" value="0元" readonly  >
                      </div>
                      <div class="form-group">
                        <label>接收地址</label>
                        <input type="text" class="form-control" name="receive_address" placeholder="请填写BTC接收地址" minlength="10" maxlength="50" required>

                      </div>
                      <div class="form-group">
                        <label >账户名称</label>
                        <input type="text" class="form-control"   minlength="2" name="name" placeholder="请填写您的付款账户的用户名（微信无需填写）" minlength="2" maxlength="6">
                      </div>
                      <div class="form-group">
                        <label id="buycard">您的卡号</label>
                        <input type="text" class="form-control"  name="card_number" placeholder="请填写您的付款账号（银行卡或支付宝微信账号）" minlength="2" maxlength="36" required>
                      </div>
                      <div class="form-group">
                        <label>支付方式</label>
                        <ul class="form-group select-package amount-item-container">
                          <li class="amount-item">
                            <input type="radio" name="amount" id="unpay" value="unpay" class="pricelist_item">
                            <label for="unpay" class="amount-item-label">
                              <img src="/wkb/Public/images/unpay.png" alt="">
                              <var class="amount-btc">银行卡支付</var>
                            </label>
                          </li>
                          <li class="amount-item">
                            <input type="radio" name="amount" id="alipay" value="alipay" class="pricelist_item">
                            <label for="alipay" class="amount-item-label">
                              <img src="/wkb/Public/images/alpay.png" alt="">
                              <var class="amount-btc">支付宝支付</var>
                            </label>
                          </li>
                          <li class="amount-item">
                            <input type="radio" name="amount" id="wxpay" value="wxpay" class="pricelist_item">
                            <label for="wxpay" class="amount-item-label">
                              <img src="/wkb/Public/images/wxpay.png" alt="">
                              <var class="amount-btc">微信支付</var>
                            </label>
                          </li>
                        </ul>
                      </div>
                      <input type="hidden" class="form-control" name="token" value="<?php echo ($token); ?>">
                      <input type="hidden" class="form-control" name="type" value=true>
                      <button type="submit" class="btn btn-danger btn-lg btn-block btnmar">买入</button>
                    </form>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="sellbtc">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 ">
                    <form action=<?php echo U('Index/check');?> method="post"  id="sell">
                      <div class="row">
                        <div class="col-sm-6 ">
                          <div class="form-group">
                            <label>卖出比特币</label>
                            <input type="hidden" class="form-control" id="sellhiddenprice"  name="price" value="" >
                            <input type="text" class="form-control" name="num" id="sellbitnum" placeholder="请输入卖出数量" required >
                            <p class="help-block">卖出价：<span class="runcolor"><?php echo ($price); ?></span> /个</p>
                          </div>
                        </div>
                        <div class="col-sm-6 ">
                          <div class="form-group">
                            <label>邮箱</label>
                            <input type="text" class="form-control" name="email" type="email" placeholder="请输入您的邮箱" maxlength="32" required  >
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <label>价格</label>
                        <input type="text" class="form-control" name="total" id="sellbitprice" value="0元" readonly>
                      </div>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane tavba" id="yhk">
                          <div class="row">
                            <div class="col-sm-12 ">
                              <div class="form-group">
                                <label>姓名</label>
                                <input type="text" name="yhk_name" minlength="2" maxlength="6"  class="form-control name"  >
                              </div>
                              <div class="form-group">
                                <label>卡号</label>
                                <input type="text" name="yhk_card" class="form-control card" minlength="2" maxlength="36"  >
                              </div>
                              <div class="form-group">
                                <label>开户行</label>
                                <input type="text" name="yhk_bank" class="form-control bank"  maxlength="32" >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane tavba" id="zfb">
                          <div class="row">
                            <div class="col-sm-12 ">

                              <div class="form-group">
                                <label>姓名</label>
                                <input type="text" name="zfb_name" class="form-control name" maxlength="6"  >
                              </div>
                              <div class="form-group">
                                <label>支付宝账号</label>
                                <input type="text" name="zfb_card" class="form-control card" minlength="2" maxlength="36"  >
                              </div>

                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane tavba" id="wxzf">
                          <div class="row">

                            <div class="col-sm-12 ">
                              <div class="form-group">
                                <label>姓名</label>
                                <input type="text" name="wxzf_name"  class="form-control name" maxlength="6"  >
                              </div>
                              <div class="form-group">
                                <label>微信账号</label>
                                <input type="text" name="wxzf_card" class="form-control card" minlength="2" maxlength="36"  >
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>支付方式</label>
                        <ul class="form-group select-package amount-item-container" id="sellamount">
                          <li class="amount-item">
                            <input type="radio" name="amount" id="unpays" value="unpays" class="pricelist_item" data-way="yhk">
                            <label for="unpays" class="amount-item-label">
                              <img src="/wkb/Public/images/unpay.png" alt="">
                              <var class="amount-btc">银行卡支付</var>
                            </label>
                          </li>
                          <li class="amount-item">
                            <input type="radio" name="amount" id="alipays" value="alipays" class="pricelist_item" data-way="zfb">
                            <label for="alipays" class="amount-item-label">
                              <img src="/wkb/Public/images/alpay.png" alt="">
                              <var class="amount-btc">支付宝支付</var>
                            </label>
                          </li>
                          <li class="amount-item">
                            <input type="radio" name="amount" id="wxpays" value="wxpays" class="pricelist_item" data-way="wxzf">
                            <label for="wxpays" class="amount-item-label">
                              <img src="/wkb/Public/images/wxpay.png" alt="">
                              <var class="amount-btc">微信支付</var>
                            </label>
                          </li>
                        </ul>
                      </div>
                      <input type="hidden" class="form-control" name="type" value="false">
                      <input type="hidden" class="form-control" name="token" value="<?php echo ($token); ?>">
                      <button type="submit" class="btn btn-success btn-lg btn-block btnmar">卖出</button>
                    </form>
                  </div>
                </div>
              </div>
              <!--<div role="tabpanel" class="tab-pane" id="buylist">-->
                <!--<div class="row">-->
                  <!--<div class="col-sm-10 col-sm-offset-1 ">-->
                    <!--<table class="table table-striped">-->
                      <!--<thead>-->
                        <!--<tr>-->
                          <!--<th>成交时间</th>-->
                          <!--<th class="text-center">类型</th>-->
                          <!--<th class="text-center">成交价格(¥)</th>-->
                          <!--<th class="text-center">成交数量</th>-->
                          <!--<th class="text-center">成交额(¥)</th>-->
                          <!--<th class="text-center">btc地址</th>-->
                        <!--</tr>-->
                      <!--</thead>-->
                      <!--<tbody>-->
                        <!--<tr>-->
                          <!--<th>2017-09-09</th>-->
                          <!--<td class="text-center"><span class="label label-danger">买入</span></td>-->
                          <!--<td class="text-center">50000</td>-->
                          <!--<td class="text-center">2</td>-->
                          <!--<td class="text-center">50000</td>-->
                          <!--<td class="text-center"><a href=""  style="color:#b3b3b3; text-decoration: none">17AQ5558p4p49xALAHPf9NHQ8PLoYDtUsw</a></td>-->
                        <!--</tr>-->
                    <!---->
                      <!--</tbody>-->
                    <!--</table>-->
                    <!--<a href="" class="btn btn-default btn-block btnmar">查看更多交易记录</a>-->
                  <!--</div>-->
                <!--</div>-->
              <!--</div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid pt60  pb60 border-bottom cd-fixed-bg" id="log" style="background-image: url(/wkb/Public/images/bgsesson.jpg); padding-bottom: 188px;">
      <div class="container colorw">
        <h2 class="text-center colorw">交易查询</h2>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 ">
            <form action=<?php echo U('Index/findOrder');?> method="post">
              <div class="form-group">
                <label></label>
                <div class="input-group">
                  <input type="text" class="form-control" id="order_number" name="order_number" placeholder="请输入订单编号">
                  <span class="input-group-btn" id="father">
                  <?php if($clickNum >= 2 ): ?><button class="btn btn-danger" id="showow" type="button" style="width: 100px"><i class="fa fa-search"></i></button>
                    <?php else: ?>
                    <button class="btn btn-danger showoo"  type="submit" style="width: 100px"><i class="fa fa-search"></i></button><?php endif; ?>


                  </span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid pt60  pb60 border-bottom">
      <div class="container">
        <h2 class="text-center">使用说明</h2>
        <div class="row">
          <div class="col-sm-4 text-center">
            <!--  <i class="fa fa-btc  fa-circle" style="font-size: 40px; color: #F66C79"></i> -->
            <span class="fa-stack fa-lg " style="font-size: 70px ;">
              <i class="fa fa-circle fa-stack-2x" style="color: #F66C79"></i>
              <i class="fa fa-btc fa-stack-1x fa-inverse"></i>
            </span>
            <h3>1. 选择买入或卖出</h3>
            <p>We can top up prepaid SIM cards from over 600 operators in 150 countries. Is your phone supported? Select your operator and find out!</p>
          </div>
          <div class="col-sm-4 text-center">
            <!--  <i class="fa fa-btc  fa-circle" style="font-size: 40px; color: #F66C79"></i> -->
            <span class="fa-stack fa-lg " style="font-size: 70px ;">
              <i class="fa fa-circle fa-stack-2x" style="color: #47C9FD"></i>
              <i class="fa fa-tasks fa-stack-1x fa-inverse"></i>
            </span>
            <h3>2. 填写买入或卖出信息</h3>
            <p>We can top up prepaid SIM cards from over 600 operators in 150 countries. Is your phone supported? Select your operator and find out!</p>
          </div>
          <div class="col-sm-4 text-center">
            <!--  <i class="fa fa-btc  fa-circle" style="font-size: 40px; color: #F66C79"></i> -->
            <span class="fa-stack fa-lg " style="font-size: 70px ;">
              <i class="fa fa-circle fa-stack-2x" style="color: #F7A600"></i>
              <i class="fa fa-hand-pointer-o   fa-stack-1x fa-inverse"></i>
            </span>
            <h3>3. 核对信息并确认提交</h3>
            <p>We can top up prepaid SIM cards from over 600 operators in 150 countries. Is your phone supported? Select your operator and find out!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid pt60 mb60">
      <div class="container">
        <h2 class="text-center">关于BTC</h2>
        <div class="row">
          <div class="col-sm-12 text-center">
            <!--  <i class="fa fa-btc  fa-circle" style="font-size: 40px; color: #F66C79"></i> -->
            <p>We can top up prepaid SIM cards from over 600 operators in 150 countries. Is your phone supported? Select your operator and find out!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid paysupport pt50 mt100 cd-fixed-bg" style="background-image: url(/wkb/Public/images/bgsection.jpg);">
      <div class="container">
        <p class="small-title">支付支持</p>
        <div class="row">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <img src="/wkb/Public/images/unpay.png" alt="">
              <p class="colorw">银行卡支付</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <img src="/wkb/Public/images/alpay.png" alt="">
              <p class="colorw">支付宝支付</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <img src="/wkb/Public/images/wxpay.png" alt="">
              <p class="colorw">微信支付</p>
            </div>
          </div>
          
          <!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img src="__public__/images/morepay.png" alt="">
            <p class="colorw">更多支付，即将支持</p>
          </div> -->
        </div>
      </div>
    </div>
    <footer id="footer">
      <div class="container-fluid text-center">
        <p class="footpad">Copyright © BTC 2017. All Rights Reserved</p>
      </div>
    </footer>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="form-horizontal" action=<?php echo U('Index/findOrder');?> method="post">
            <div class="modal-body" style="text-align: center; margin-top: 30px">
              <div class="" style="display: inline-block;    margin: 20px 0;">
                <div class="clickcode">
                  <input type="text" id="clickcode" class="form-control" name="code" placeholder="请输入验证码" value="">
                  <input type="hidden" name ="order_number" id="order_num_hidd">
                </div>
                <div class="addonon right success"><i class="fa fa-check-circle "></i></div>
                <div class="addonon wrong waring"><i class="fa fa-times-circle "></i></div>
                <div class="input-group-btn pull-left" style=" margin-left: 10px;">
                  <img src="<?php echo U('Index/vcode');?>"  onclick="this.src='/Home/Index/vcode.html?k='+Math.random()"/>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">确认</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/wkb/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/wkb/Public/js/bootstrap.min.js"></script>
    <script src="/wkb/Public/js/bootstrap.min.js"></script>
    <script src="/wkb/Public/js/jquery.validate.min.js"></script>
    <script src="/wkb/Public/js/messages_zh.js"></script>
    <script type="text/javascript">
    $(function(){


      $("#clickcode").on('input', function() {

        $('.right').attr("disabled","false")
        var clickcode = $("#clickcode").val().length;
        $('.wrong').removeClass('show');
        $('.right').removeClass('show');
        $('#submitbtn').attr("disabled",true);
//            $('#submitbtn').on("click",function(){
//               $('#submitbtn').attr("disabled",true);
//            })
        if (clickcode == '4') {
          $.ajax({
            type: "post",
            url: "<?php echo U('Index/checkVcode');?>",//这里填写url
            data: {
              code: $("#clickcode").val(),
            },
            success: function(data) {
              if (data) {

                $('.right').addClass('show');
                $('.wrong').removeClass('show');
                $('#submitbtn').attr("disabled",false);

              } else {

                $('.wrong').addClass('show');
                $('.right').removeClass('show')
              }

            },
            error: function(){
              $('.wrong').addClass('show');
              $('.right').removeClass('show')
            }
          });
        }
      });


      $("#order_number").change(function(){
        var val = $("#order_number").val();
        $('#order_num_hidd').val(val);
      });


      $('#showow').on('click',function(){


      })
      $().ready(function() {
        $("#buy").validate({
          errorClass: "error",
          success: 'valid',
          unhighlight: function (element, errorClass, validClass) { //验证通过
            $(element).tooltip('destroy').removeClass(errorClass);
          },
          //highlight: function (element, errorClass, validClass) { //未通过验证
          //    // TODO
          //}
          //,
          errorPlacement: function (error, element) {

            if ($(element).next("div").hasClass("tooltip")) {
              $(element).attr({"data-original-title": $(error).text(),"data-placement":"bottom"}).tooltip("show");
            } else {
              $(element).attr({"title":
                      $(error).text(),"data-placement":"bottom"}).tooltip("show");
            }
          }

        });
      });
      $().ready(function() {
        $("#sell").validate({
          errorClass: "error",
          success: 'valid',
          unhighlight: function (element, errorClass, validClass) { //验证通过
            $(element).tooltip('destroy').removeClass(errorClass);
          },
          //highlight: function (element, errorClass, validClass) { //未通过验证
          //    // TODO
          //}
          //,
          errorPlacement: function (error, element) {
            if ($(element).next("div").hasClass("tooltip")) {
              $(element).attr({"data-original-title": $(error).text(),"data-placement":"bottom"}).tooltip("show");
            } else {
              $(element).attr({"title":
                      $(error).text(),"data-placement":"bottom"}).tooltip("show");
            }
          },

        });
      });

      $('#buybitnum').bind('input propertychange', function() {
        var pricetotle = $(this).val()* <?php echo ($price); ?>;

        pricetotle=pricetotle.toFixed(2);
        if (pricetotle =="NaN") {
          pricetotle = "0";
        }
        $('#buybitprice').val(pricetotle+'元');
        $('#buyhiddenprice').val(<?php echo ($price); ?>);
      })
        $('#sellbitnum').bind('input propertychange', function() {
          var pricetotle = $(this).val()* <?php echo ($price); ?>;

          pricetotle=pricetotle.toFixed(2);
          if (pricetotle =="NaN") {
            pricetotle = "0";
          }
          $('#sellbitprice').val(pricetotle +'元');

          $('#sellhiddenprice').val(<?php echo ($price); ?>);
        })

      if (<?php echo ($clickNum); ?> >= 2) {
        $("#father").on("click","button",function(){
          $("#myModal").modal('show');
        });
      }

      $("#sellamount>.amount-item>input").on("click",function(){
      var clais= $(this).attr('data-way');

      $(".tab-content .tavba").removeClass("active");
      $(".tab-content .tavba input").removeAttr("required");
      $("#"+clais).addClass("active");
      $("#"+clais+" "+"input").attr("required", "true");
      });
    })
    </script>
  </body>
</html>