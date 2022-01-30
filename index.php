<!DOCTYPE html>
<html>

<head>
    <title>吃掉校长</title>
    <meta itemprop="name" content="吃掉校长" />
    <meta itemprop="description" content="春节休闲不可错过" />
    <meta charset="utf-8" />
    <meta name="viewport"
        content="initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, width=device-width,target-densitydpi=device-dpi" />
    <link rel="icon" href="https://eafoo.github.io/eatcat/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="https://eafoo.github.io/eatcat/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./static/index.css" rel="stylesheet" type="text/css">
    <script src="https://pv.sohu.com/cityjson?ie=utf-8"></script>
    <script src="https://code.createjs.com/1.0.0/createjs.min.js"></script>
    <script src="https://passport.cnblogs.com/scripts/jsencrypt.min.js"></script>
    <script src="./static/index.js"></script>
</head>

<body onLoad="init()" oncontextmenu=self.event.returnValue=false>
    <div id="GameScoreLayer" class="BBOX SHADE bgc1" style="display:none;">
        <div style="padding:5%;margin-top: 200px;background-color: rgba(125, 181, 216, 0.8);">
            <div id="GameScoreLayer-text"></div>
            <div id="GameScoreLayer-score" style="margin:10px 0;">得分</div>
            <div id="GameScoreLayer-bast">最佳</div>
            <div id="now" style="font-size:0.9em;">键型</div>
            <div id="now" style="font-size:0.8em;">电脑端玩家按下R键可一键重开哦~</div>
            <button type="button" class="btn btn-secondary btn-lg" onclick="replayBtn()">重来</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="hideGameScoreLayer();showWelcomeLayer();gameRestart()">返回主页</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="window.location.href='https://github.com/Eafoo/eatcat'">源代码(改版后)</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="window.location.href='https://github.com/arcxingye/EatKano'">源代码(原版)</button>
            <button type="button" class="btn btn-secondary btn-lg"
        </div>
    </div>
    </div>
    <div id="welcome" class="SHADE BOX-M">
        <div class="welcome-bg FILL"></div>
        <div class="FILL BOX-M" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:5;">
            <div style="margin:0 8% 0 9%;">
                <div style="font-size:2.0em; color:#FEF002;" id="tt">吃掉小猫猫（支持高度自定义~）</div><br />
                <div style="font-size: 1.2em; color:#fff; line-height:1.5em;" id="ttt">
                    对杨校无恶意<br />
                    从最底下老杨开始<br />
                    看看您能吃多少校长~<br />
                    注：设置里有很多好东西哟！<br />
                    电脑玩家在默认设置下 <br />
                    键盘上的DFJK键<br />
                    可分别控制四个轨道哦！<br />
                </div>
                <br />
                <div id="btn_group" style="display: block;">
                    <button type="button" id="ready-btn" class="btn btn-primary loading btn-lg">点击开始</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="show_setting()">游戏设置</button>
                    <br /><br />
                    <button type="button" class="btn btn-secondary btn-lg"
                        onclick="foreach()">若游戏一直在加载或时间显示NaN请点击此按钮后刷新界面</button>
                    <br /><br />
                </div>

                <div id="btn_group2" style="display: block;">
                    <h2 style="font-size:1.2em; color:#fff; line-height:1.5em;">一键设置特殊键型（若按键全部消失请刷新界面）：</h2>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('!')">纯随机</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@')">无纵连的随机</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@#')">短纵</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('2')">全纵连</button>
                    <br><br>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('32')">交互</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('123432')">楼梯</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@##')">三纵</button>
                </div>
                <div id="setting" style="display: none;">
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入四个 英文字母 <br />
                        以绑定键盘上对应的四个按键哦（不区分大小写,手机端玩家请忽略按键设置）！<br />
                        电脑默认为DFJK哦！<br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="keyboard" class="form-control" maxlength=4>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入您想要设置的时间限制哦~ （单位：秒） <br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="timeinput" class="form-control" maxlength=4>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入您想要设置的键型哦~ <a href="https://docs.qq.com/doc/DYVNMQ0pEWm12VGpv/" target="_blank">
                            <br>（注意：键型设置有改动，详细说明请点击这里）</a> <br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="note" class="form-control" maxlength=99999>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        隐藏结算后显示的评语
                    </h3>
                    <input type="checkbox" id="hide" class="form-control">
                    <br>
                    <button type="button" class="btn btn-secondary btn-lg"
                        onclick="show_btn();save_cookie();">完成</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
