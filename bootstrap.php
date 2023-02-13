<?php
function route($tag_name, $value = NULL, $callback = NULL)
{
    static $events;

    if ($callback !== NULL) {
        if ($callback) {
            $events[$tag_name][] = $callback;
        } else {
            unset($events[$tag_name]);
        }
    } elseif (isset($events[$tag_name])) {
        foreach ($events[$tag_name] as $function) {

            $value = call_user_func($function, $value);
        }
        return $value;
    }
   return 'Error 404';
}



route('profile', null, function ($name)
{
    echo "<b style='color:red;font-size:40px'>Welcome {$name}</b>";
});
route('product', null, function ($product_id)
{
    return "You wanna show product number {$product_id}";
});

route('profile',null,function(){
   echo "Your IP address: 5.10.13.33";
});
//در هوک فانشن ها به صورت استاتیک تعریف می شود و باعث میشود مقادیر حفظ شود
// و هرچند تا مسیر تعریف شود مقدار قبلی از بین نمی رود در مثال بالا دو مسیر هم نام تعریف شده
// ولی با دو مقدار متفاوت در مرورگر هر دو نمایش داده میشود
// این روش هسته برنامه نوشته میشود
// و میتوان با وارد کردن مسیر های منفاوت برنامه را توسعه داد مانند وردپرس پلاگین افزوده میشود.