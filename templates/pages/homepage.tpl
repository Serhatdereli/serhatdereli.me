{extends file="pages/_inc/master.tpl"}
{block name=head}{/block}

{block name=body}
<div id="wrapper">
    <div id="bg"></div>
    <div id="overlay"></div>
    <div id="main">

        <!-- Header -->
            <header id="header">
                <h1>{$name}</h1>
                <p>Computer Scientist &nbsp;&bull;&nbsp; Help &nbsp;&bull;&nbsp; Get me out</p>
                <nav>
                    <ul>
                        <li>
                            <a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a>
                        </li>
                        <li>
                            <a href="www.facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a>
                        </li>
                        <li>
                            <a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/Serhatdereli" class="icon fa-github"><span class="label">Github</span></a>
                        </li>
                        <li>
                            <a href="mailto:sdereli1993@gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a>
                        </li>
                    </ul>
                </nav>
            </header>

        <!-- Footer -->
            <footer id="footer">
                <span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
            </footer>

    </div>
</div>
{/block}

{block name=js}{/block}
