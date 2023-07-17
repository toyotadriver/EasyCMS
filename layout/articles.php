<?php
// require_once 'php/db_login.php';

// try
// {
//     $article_load_pdo = new PDO ($db_attr, $db_user, $db_pass, $db_opts);
// }
// catch (PDOException $e)
// {
//     throw new PDOException($e->getMessage(), $e->getCode());
// }

// $query = <<<_article_load
// SELECT * FROM posts;
// _article_load;

// $al = $article_load_pdo->query($query);
// $al = $al->fetch();

$imgdir = './imgs/';
$od = opendir($imgdir);
$sb = scandir($imgdir);
//Удаляем точки ("." , "..")
unset($sb[0]);
unset($sb[1]);
//Чиним позиции в массиве
$sd = array_values($sb);
$articles_number = count($sd);


$articles_per_page = 10;
if (isset($_GET['page']))
{
    $articles_pointer = (($_GET['page'] - 1) * 10);
}
else
{
    $articles_pointer = 0;
}

$number_of_pages = ((INT) ($articles_number / $articles_per_page) + 1);
//Задаем массив статей на текущей странице
if (($articles_number - $articles_pointer) < $articles_per_page)
{
    $articles_current_number = $articles_number - $articles_pointer;
}
else
{
    $articles_current_number = $articles_per_page;
}
$articles_on_current_page = array_slice($sd, $articles_pointer, $articles_current_number);

// echo '<article>';
// echo $articles_number . '<br>';
// echo $articles_current_number . '<br>';
// print_r($articles_on_current_page);
// echo '</article>';

echo <<<_ADD_CONTENT
<article class='article_main' id='article_add_form' style='cursor: pointer;'>
    <span style='font-size: 30px; margin-left: 100px; margin-top: 100px;'>+</span>
    Добавить контент...
</article>
_ADD_CONTENT;
show_articles($articles_on_current_page,$imgdir);
show_pages($number_of_pages);

function show_articles($art_array,$dir)
{
    $num = 0;
    foreach ($art_array as $item)
    {  
        $imgsrc = $dir . $item;
        echo <<<_scandir_result
            <article class='article article_main'>
                <figure class='figure_article'>
                    <img id='dempic' src='$imgsrc' alt='./imgs/NOIMAGEJPG.jpg'>
                </figure>
                <figcaption>
                    <p class='article_text'>$item</p>
                </figcaption>
            </article>
        _scandir_result;
        $num++;
    };
    // echo '<br>' . $num;
};
function show_pages($p_num){
    
    echo "<nav id='menu_pages'>";
    for ($i = 1; $i < ($p_num + 1); $i++)
    {
        $curpage = isset($_GET['page'])? $_GET['page']: 1;

        if ($i != $curpage){
        echo <<<_show_pages
            <button class='pbtusual' onclick="location.href = 'index.php?page=$i';">$i</button>
        _show_pages;
        }
        else{
            echo <<<_show_pages
                <button class='pbtusual'>$i</button>
            _show_pages;
        }
    }
    };
    echo "</nav>";
closedir($od);
?>