<?=view("public/top")?>
<?=view("public/home-css")?>
    <style>
        .layui-layer-title{background:url(<?=site_url('weblib/')?>images/righttitlebig.png) repeat-x;font-weight:bold;color:#46647e; border:1px solid #c1d3de;height: 33px;line-height: 33px;}
    </style>
</head>
<body>
<div id="container">
    <div id="hd">
        <div class="hd-wrap ue-clear">
            <div class="top-light"></div>
            <h1 class="logo"></h1>
            <div class="login-info ue-clear">
                <div class="welcome ue-clear"><span>欢迎您,</span><a href="javascript:void(0)" class="user-name">Admin</a></div>
                <div class="login-msg ue-clear">
                    <a href="javascript:void(0)" class="msg-txt">消息</a>
                    <a href="javascript:void(0)" class="msg-num">10</a>
                </div>
            </div>
            <div class="toolbar ue-clear">
                <a href="<?=site_url('Home/home')?>" class="home-btn" target="right">首页</a>
                <a href="javascript:void(0)" class="home-btn1" target="right" onclick="openlayer()">修改密码</a>
                <a href="javascript:void(0)" class="quit-btn exit home-btn">退出</a>
            </div>
        </div>
    </div>
    <div id="bd">
        <div class="wrap ue-clear">
            <?=view("public/left")?>
            <div class="content">
                <iframe src="<?=site_url('Home/home')?>" id="iframe" width="100%" height="100%" frameborder="0" name="right" style="min-width: 1100px"></iframe>
            </div>
        </div>
    </div>
    <!--<div id="ft" class="foot_div">
        <span>xxxxxx</span>
        <em>Office&nbsp;System</em>
    </div>-->
    <?=view("public/footer-copy")?>
</div>
<div class="exitDialog">
    <div class="dialog-content">
        <div class="ui-dialog-icon"></div>
        <div class="ui-dialog-text">
            <p class="dialog-content">你确定要退出系统？</p>
            <p class="tips">如果是请点击“确定”，否则点“取消”</p>

            <div class="buttons">
                <input type="text" style="display: none" value="<?=site_url('Login/logout')?>" id="logoutUrl" />
                <input type="button" class="button long2 ok" value="确定" />
                <input type="button" class="button long2 normal" value="取消" />
            </div>
        </div>

    </div>
</div>
</body>

<?=view("public/home-js")?>
<script type="text/javascript">
    function openlayer(id){
        layer.open({
            type: 2,
            title: '修改密码',
            shadeClose: false,
            shade: 0.5,
            skin: 'layui-layer-rim',
//            maxmin: true,
            closeBtn:2,
            area: ['35%', '40%'],
            content: 'password.html'
            //iframe的url
        });
    }
</script>
</html>