<!DOCTYPE HTML >
<html>
<head>
    <title> New Document </title>
    <meta charset="utf-8">
    <script src="images/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#Submit").click(function get_mobile() {
                var mcode = Math.round(Math.random() * 10000);
                $.get("index.php?mobile=" + $("#mobile").val() + "&mcode=" + mcode, function (data) {
                });

                $("#yanzheng").click(function get_code() {
                    $.get("index.php?code=" + $("#code").val(), function (data) {
                        if (mcode == $("#code").val()) {
                            alert('验证码正确，请继续！');
                        } else {
                            alert('验证码错误');
                        }
                    });
                });
            });
            var test = {
                node: null,
                count: 60,
                start: function () {
                    if (this.count > 0) {
                        this.node.innerHTML = this.count--;
                        var _this = this;
                        setTimeout(function () {
                            _this.start();
                        }, 1000);
                    } else {
                        this.node.removeAttribute("disabled");
                        this.node.innerHTML = "再次发送";
                        this.count = 60;
                    }
                },
                init: function (node) {
                    this.node = node;
                    this.node.setAttribute("disabled", true);
                    this.start();
                }
            };
            var btn = document.getElementById("Submit");
            btn.onclick = function () {
                alert("验证信息会发送到" + $("#mobile").val());
                test.init(btn);
            };
        });
        /*
         *检测电话号码是否正确的函数
         * @param tel
         */
        function check_mobile(tel) {
            var tel = tel.replace(/^\s*|\s*$/g, '');
            var length = tel.length;
            if (length == 0) {
                alert('手机号码不能为空...');
                $('#Submit').attr('disabled', 'disabled');
                return;
            }
            $a = preg_match('/^((1[3|4|5|8])[0-9]{9})$/', tel);
            if ($a) {
                $('#Submit').attr('disabled', '');
                return;
            }
            else {
                alert('手机号码格式不正确请重新输入...');
                $('#Submit').attr('disabled', 'dosabled');
                return;
            }
        }
    </script>

    <?php
    session_start();
    if (isset($_SESSION['time'])) {
        session_id();
        $_SESSION['time'];
    } else {
        $_SESSION['time'] = date("Y-m-d H:i:s");
    }
    $_SESSION['mcode'] = $_GET['mcode'];
    if ((strtotime($_SESSION['time']) + 60) < time()) {
        session_destroy();
        unset($_SESSION);
        header('content-type:text/html; charset=utf-8;');
        echo '<script>alert("验证码已过期，请重新获取！");</script>';
    } else {
        $mcode = $_SESSION['mcode'];
        $post_data = array();
        $post_data['username'] = "test";
        $post_data['password'] = "test";
        $post_data['mobile'] = $mobile;
        $post_data['content'] = urlencode("您本次的验证码是：" . $mcode);
        $post_data['extcode'] = "";
        $post_data['senddate'] = "";
        $post_data['batchID'] = "";
        $url = 'http://116.213.72.20/SMSHttpService/send.aspx';
        $o = "";
        foreach ($post_data as $k => $v) {
            $o .= "$k=" . $v . "&";
        }
        $post_data = substr($o, 0, -1);
        $this_header = array("content-type: application/x-www-form-urlencoded;charset=UTF-8");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this_header);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    } ?>
</head>
<body>
<p>手机号：<input type="text" name="mobile" value="" id="mobile" onblur="check_mobile(this.value)"/><span
        id="mobile_notice"></span></p>
<p>验证码：<input type="text" name="code" value="" id="code"/>
    <button id="Submit">获取验证码</button>
</p>
<input type="submit" name="yanzheng" value="下一步" id="yanzheng"/>
</body>
</html>