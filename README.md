# 微信小程序微信支付服务端程序

本程序是在官方的微信公众号的微信支付demo基础上修改完成的，用于微信小程序微信支付服务端的程序。

有关这个程序的应用参考：WordPress版微信小程序 https://github.com/iamxjb/winxin-app-watch-life.net 

# 技术支持网站：https://www.watch-life.net

# 技术支持微信：iamxjb

# 注意

 在使用小程序赞赏支付功能时候，小程序要申请微信支付，这个申请可以把小程序和已有的支付微信商户关联，也可以重新申请一个微信商户，如果不做这个关联，是无法支付成功。

# 讨论微信群：

由于微信群超过100人，无法再扫描二维码加入。如果你想加入，请先加我的微信：iamxjb ，我拉你入群。

# 开源协议：GPL v3

# 镜像地址下载

如果因为某些原因github无法访问，请通过如下镜像地址下载：

https://gitee.com/iamxjb/weixin-app-wxpay


# 安装的方法：

1、程序wp-wxpay目录需要放置在网站的根目录。程序的wp-wxpay目录是一级目录，目录结构如下：

├── wp-wxpay

├──────lib

├──────────WxPay.Api.php

├──────────WxPay.Config.php（配置文件）

├──────────WxPay.Data.php

├──────────WxPay.Exception.php

├──────────WxPay.Notify.php

├──────logs

├──────pay

├──────────app.php （微信小程序调用调用程序）

├──────────log.php

├──────────notify.php

├──────────WxPay.JsApiPay.php


2、修改lib目录下的WxPay.Config.php相关配置

const APPID = ‘wx************’;       （小程序appid）

const MCHID = ‘*********’;                （微信支付商户号）

const KEY = ‘********’;                         （商户支付密钥）

const NOTIFY_URL=’https://******/wp-wxpay/pay/notify.php’;          （支付回调地址，修改域名即可）

const BODY =’守望轩Live’;               （消息体的内容，自行随便给定）

商户支付密钥的获取参见微信支付官方文档：https://pay.weixin.qq.com/index.php/account/api_cert


