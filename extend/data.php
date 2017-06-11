<?php
/**
 *  php 中时间函数date及常用的时间计算
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 * */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Data</title>
</head>
<body>

<?php
$times = [];

/**
*获取时间的函数
* @return Array 时间数组
*/
function makeTime()
{
    //获取今日开始时间戳和结束时间戳
    $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
    $times['today']['begin'] = $beginToday;
    $times['today']['end'] = $endToday;

    //获取昨日起始时间戳和结束时间戳
    $beginYesterday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
    $endYesterday = mktime(0, 0, 0, date('m'), date('d'), date('Y')) - 1;
    $times['yesterday']['begin'] = $beginYesterday;
    $times['yesterday']['end'] = $endYesterday;

    //获取上周起始时间戳和结束时间戳
    $beginLastweek = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
    $endLastweek = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));
    $times['lastWeek']['begin'] = $beginLastweek;
    $times['lastWeek']['end'] = $endLastweek;

    //获取本月起始时间戳和结束时间戳
    $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
    $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
    $times['thisMonth']['begin'] = $beginThismonth;
    $times['thisMonth']['end'] = $endThismonth;

    //获取本周开始时间和结束时间，此例中开始时间为周一
    $defaultDate = date('Y-m-d');
    $first = 1;
    $w = date('w', strtotime($defaultDate));
    $beginWeek = strtotime("$defaultDate-" . ($w ? $w - $first : 6) . 'days');
    $endWeek = $beginWeek + 6 * 24 * 3600 - 1;
    $times['thisWeek']['begin'] = $beginWeek;
    $times['thisWeek']['end'] = $endWeek;

    //获取上月的起始时间戳和结束时间戳
    $beginLastmonth = mktime(0, 0, 0, date('m') - 1, 1, date('Y'));
    $endLastmonth = mktime(23, 59, 59, date('m') - 1, date('t'), date('Y'));
    $times['LastMonth']['begin'] = $beginLastmonth;
    $times['LastMonth']['end'] = $endLastmonth;

    //获取今年的起始时间和结束时间
    $beginThisyear = mktime(0, 0, 0, 1, 1, date('Y'));
    $endThisyear = mktime(23, 59, 59, 12, 31, date('Y'));
    $times['thisYear']['begin'] = $beginThisyear;
    $times['thisYear']['end'] = $endThisyear;

    //获取上年的起始时间和结束时间
    $beginLastyear = mktime(0, 0, 0, 1, 1, date('Y') - 1);
    $endLastyear = mktime(23, 59, 59, 12, 31, date('Y') - 1);
    $times['lastYear']['begin'] = $beginLastyear;
    $times['lastYear']['end'] = $endLastyear;

    //获取本季度开始时间和结束时间
    $season = ceil((date('n')) / 3);//当月是第几季度
    $beginThisSeason = mktime(0, 0, 0, $season * 3 - 3 + 1, 1, date('Y'));
    $endThisSeason = mktime(23, 59, 59, $season * 3, date('t', mktime(0, 0, 0, $season * 3, 1, date("Y"))), date('Y'));
    $times['thisSeason']['begin'] = $beginThisSeason;
    $times['thisSeason']['end'] = $endThisSeason;

    //获取上季度的起始时间和结束时间
    $beginLastSeason = mktime(0, 0, 0, ($season - 1) * 3 - 3 + 1, 1, date('Y'));
    $endLastSeason = mktime(23, 59, 59, ($season - 1) * 3, date('t', mktime(0, 0, 0, $season * 3, 1, date("Y"))), date('Y'));
    $times['lastSeason']['begin'] = $beginLastSeason;
    $times['lastSeason']['end'] = $endLastSeason;

    return $times;
}

$times = makeTime();

?>
</body>
</html>