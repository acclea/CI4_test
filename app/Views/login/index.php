<?=view("public/top")?>
<?=view("public/login-css")?>
</head>
<body>
<div class="div_top">OA日常办公管理系统</div>
<div class="login">
    <div class="message">用户登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post">
        <input name="action" value="login" type="hidden">
        <input name="username" placeholder="用户名" required="" type="text" id="user">
        <hr class="hr15">
        <input name="password" placeholder="密码" required="" type="password" id="pass">
        <hr class="hr15">
        <input value="登录" style="width:100%;" type="button" id="login_btn">
<!--        <hr class="hr20">-->
<!--        <a onClick="alert('请联系管理员')">忘记密码</a>-->
    </form>
</div>
<?=view("public/footer-copy")?>
<?=view("public/footer-jq")?>
<script >
    $(function(){
        $("#login_btn").click(function(){

            var selectuser = $("#user").val();
            var pword = $("#pass").val();

            if (selectuser == "" || selectuser.length <= 1) {
                alert("用户名不能为空");
                $("#user").focus();
                return false;
            }
            if (pword == "" || pword.length < 1) {
                alert("密码不能为空");
                $("#pass").focus();
                return false;
            }
            //getUserDep(selectuser,pword);
            loginFunc(selectuser,pword);

        });

        function getUserDep(v1,v2){
            $.ajax({
                type: "post",
                url: "LoginServlet",
                data:{adid:v1,mima:v2},
                success: function(message){
                    if(message=="1"){
                        window.location.href='index.html';
                    }
                    else{
                        alter("密码错误");
                    }
                }

            });
        }

        var loginFunc   = function (name,pass) {
            if(!name || !pass){return false;}
            $.post("<?=site_url('Ajax/loginDo')?>",{name:name,pass:pass},function (ref) {
                console.log(ref);return false;
                if(!ref){return false;}
                var re = JSON.parse(ref);

                if(re['code'] != 0){alert(re['msg']);return false;}
                window.location.href    = re['data'].url;
            });
        }
    });

</script>
</body>
</html>