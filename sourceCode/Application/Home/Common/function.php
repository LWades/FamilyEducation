<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/7
 * Time: 14:26
 */

function isLogin(){
    if (session('?user_id'))
        return true;
    else
        return false;
}

function saveUrl(){
    session('back_url', "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}

function getFaceKey(){
    return '67cd5f20bf254f3988fa4a6229058219';
}

function isFour($n){
    if ($n % 3 == 1)
        return true;
    else
        return false;
}

function isThree($n){
    if ($n % 3 == 0)
        return true;
    else
        return false;
}

function bootstrap_page_style($page_html){
    if ($page_html) {
        $page_show = str_replace('<div>','<nav><ul class="pagination">',$page_html);
        $page_show = str_replace('</div>','</ul></nav>',$page_show);
        $page_show = str_replace('<span class="current">','<li class="active"><a>',$page_show);
        $page_show = str_replace('</span>','</a></li>',$page_show);
        $page_show = str_replace(array('<a class="num"','<a class="prev"','<a class="next"','<a class="end"','<a class="first"'),'<li><a',$page_show);
        $page_show = str_replace('</a>','</a></li>',$page_show);
    }
    return $page_show;
}