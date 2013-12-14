<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Workspace</title>
        <script src="//code.jquery.com/jquery.js"></script>
        <style>
            li {
                height: 20px;
                overflow: hidden;
            }
            li>span {
                display : inline-block;
                height: 20px;
                width: 20px;
                cursor: pointer;
            }
            li>span:hover {
                background-color: lightgray;
            }
            a.file {
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <?php
        echo "<h1>Online</h1>";
        $dirname = './';

        listeDir($dirname);

        function listeDir($dirname) {
            $noList = array('.', '..', 'nbproject', '.git');
            echo "<ul>";
            $dir = opendir($dirname);
            while ($file = readdir($dir)) {
                if (!in_array($file, $noList)) {
                    if (is_dir($dirname . $file)) {
                        echo '<li><span>></span><a class="dir" href="' . $dirname . $file . '">' . $file . '</a><br/>';
                        listeDir($dirname . $file . '/');
                        echo "</li>";
                    } else {
                        echo '<li><a class="file" href="' . $dirname . $file . '">' . $file . '</a></li>';
                    }
                }
            }
            echo "</ul>";
            closedir($dir);
        }
        ?>
        <script>
            $(document).ready(function(){
                $("li>span").click(function(){
                    if( $(this).html() == "V" ) {
                        $(this).html(">");
                        $(this).parent("li").css("height","20px");
                    }
                    else {
                        $(this).html("V");
                        $(this).parent("li").css("height","auto");
                    }
                });
            });
        </script>
    </body>
</head>
