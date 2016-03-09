<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.2/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.1.2/material.min.js"></script>
    <title>Login Facebook</title>
</head>
<body>
<!-- Uses a header that contracts as the page scrolls down. -->
<style>
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
        padding-right: 0;
    }
</style>

<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Facebook</span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Login Facebook</span>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <h1 class="mdl-layout__header-row">Login</h1>
            <!-- Simple Textfield -->
            <form action="Controller/Login.php" method="post" style="text-align: center;">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="Name" name="Name">
                    <label class="mdl-textfield__label" for="sample1">Name</label>
                </div>
                <br/>

            <!-- Simple Textfield -->

                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="LastName" name="LastName">
                    <label class="mdl-textfield__label" for="sample1">Last Name</label>
                </div>
                <br/>

            <!-- Simple Textfield -->

                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" id="Password" name="Password">
                    <label class="mdl-textfield__label" for="sample1">Password</label>
                </div>
                <br/>

            <!-- Simple Textfield -->

                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="email" id="usrEmail" name="usrEmail">
                    <label class="mdl-textfield__label" for="sample1">E-mail</label>
                </div>
                <br/>

            <!-- Simple Textfield -->

                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="date" id="birthday" name="birthday">
                    <label class="mdl-textfield__label" for="sample1"></label>
                </div>
                <br/>
                <br/>
                <label class="mdl-radio mdl-js-radio" for="option1">
                    <input type="radio" id="option1" name="gender" value="Male" class="mdl-radio__button" checked>
                    <span class="mdl-radio__label">Male</span>
                </label>
                <br/>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option2">
                        <input type="radio" id="option2" name="gender" value="Female" class="mdl-radio__button" >
                        <span class="mdl-radio__label">Female</span>
                    </label>
                <br/>
                <br/>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Send
                </button>
            </form>


        </div>
    </main>
</div>


</body>
</html>