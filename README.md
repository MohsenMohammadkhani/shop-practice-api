<div dir="rtl">
<p>
   پایگاه داده پروژه مونگو است.
</p>
<hr />
<p>
    از آدرس زیر برای استفاده از swagger استفاده کنید.
</p>

<p dir="ltr">
     http://localhost:8000/api/documentation
</p>

<p>
برای تغییر swagger به مسیر storage/api-docs بروید و فایل های json را تغییر دهید اما به فایل api-docs.json دست نزنید و بعد از اعمال تغییرات و اضافه کردن , فایل  index.js  را با دستور node index.js در آن مسیر اجرا کنید
</p>

<p >
اگر قصد اضافه کردن فایل جدیدی  دارید ,  کد اتصال آن فایل را در فایل index.js بنویسید
</p>
<hr />
<p >
دستورات زیر را بعد از clone کردن پروژه وارد کنید.
</p>

<p dir="ltr">
composer install
</p>

<p dir="ltr">
cp .env.example .env
</p>

<p dir="ltr">
php artisan key:generate
</p>

<p dir="ltr">
php artisan migrate
</p>

<p dir="ltr">
php artisan test
</p>

<p dir="ltr">
php artisan serve
</p>
</div>
