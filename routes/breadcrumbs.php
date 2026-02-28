<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Адмін-панель', route('dashboard'));
});

Breadcrumbs::for('list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Адміни', route('list'));
});

Breadcrumbs::for('add', function (BreadcrumbTrail $trail) {
    $trail->parent('list');
    $trail->push('Додати адміна', route('add'));
});

// Admins  
Breadcrumbs::for('edit', function (BreadcrumbTrail $trail) {

    $id = request()->route('id');
    $trail->parent('list');
    $trail->push('Редагувати адміна', route('edit', ['id' => $id]));
});

//Customers
Breadcrumbs::for('admin.customer_list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Кліенти', route('admin.customer_list'));
});

// Orders List
Breadcrumbs::for('orders.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Замовлення', route('orders.list'));
});

// Order Detail
Breadcrumbs::for('orders.detail', function (BreadcrumbTrail $trail) {
    $trail->parent('orders.list');
    $id = request()->route('id');
    $trail->push('Деталі замовлення', route('orders.detail', ['id' => $id]));
});

// Category List
Breadcrumbs::for('category.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Категорії', route('category.list'));
});

// Category Add
Breadcrumbs::for('category.add', function (BreadcrumbTrail $trail) {
    $trail->parent('category.list');

    $trail->push('Додати категорію', route('category.add'));
});
// Category Edit
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('category.list');
    $id = request()->route('id');
    $trail->push('Редагувати категорію', route('category.edit', ['id' => $id]));
});

// SubCategory List
Breadcrumbs::for('sub_category.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Категорії', route('category.list'));
});

// SubCategory Add
Breadcrumbs::for('sub_category.add', function (BreadcrumbTrail $trail) {
    $trail->parent('sub_category.list');

    $trail->push('Додати категорію', route('sub_category.add'));
});
// SubCategory Edit
Breadcrumbs::for('sub_category.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('sub_category.list');
    $id = request()->route('id');
    $trail->push('Редагувати категорію', route('sub_category.edit', ['id' => $id]));
});

// Brands List
Breadcrumbs::for('brand.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Бренди', route('brand.list'));
});

// Brands Add
Breadcrumbs::for('brand.add', function (BreadcrumbTrail $trail) {
    $trail->parent('brand.list');

    $trail->push('Додати бренд', route('brand.add'));
});
// Brands Edit
Breadcrumbs::for('brand.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('brand.list');
    $id = request()->route('id');
    $trail->push('Редагувати бренд', route('brand.edit', ['id' => $id]));
});

// Color List
Breadcrumbs::for('color.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Кольори', route('color.list'));
});

// Color Add
Breadcrumbs::for('color.add', function (BreadcrumbTrail $trail) {
    $trail->parent('color.list');

    $trail->push('Додати колір', route('color.add'));
});
// Color Edit
Breadcrumbs::for('color.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('color.list');
    $id = request()->route('id');
    $trail->push('Редагувати колір', route('color.edit', ['id' => $id]));
});

// Product List
Breadcrumbs::for('product.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Продукція', route('product.list'));
});

// Product Add
Breadcrumbs::for('product.add', function (BreadcrumbTrail $trail) {
    $trail->parent('product.list');

    $trail->push('Додати продукцію', route('product.add'));
});
// Product Edit
Breadcrumbs::for('product.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('product.list');
    $id = request()->route('id');
    $trail->push('Редагувати продукцію', route('product.edit', ['id' => $id]));
});
// Product Index Export/import Exel
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('product.list');
    $trail->push('Імпорт/Експорт Exel', route('product.index'));
});

// Discount List
Breadcrumbs::for('discount_code.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Код знижки', route('discount_code.list'));
});

// Discount Add
Breadcrumbs::for('discount_code.add', function (BreadcrumbTrail $trail) {
    $trail->parent('discount_code.list');

    $trail->push('Додати код знижки', route('discount_code.add'));
});
// Discount Edit
Breadcrumbs::for('discount_code.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('discount_code.list');
    $id = request()->route('id');
    $trail->push('Редагувати код знижки', route('discount_code.edit', ['id' => $id]));
});

// Shipping Charge list
Breadcrumbs::for('shipping_charge.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Доставка', route('shipping_charge.list'));
});

// Shipping Charge Add
Breadcrumbs::for('shipping_charge.add', function (BreadcrumbTrail $trail) {
    $trail->parent('shipping_charge.list');

    $trail->push('Додати доставку', route('shipping_charge.add'));
});

// Shipping Charge Edit
Breadcrumbs::for('shipping_charge.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('shipping_charge.list');
    $id = request()->route('id');
    $trail->push('Редагувати доставку', route('shipping_charge.edit', ['id' => $id]));
});

// ContactUs
Breadcrumbs::for('admin.contactus', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Повідомлення', route('admin.contactus'));
});

// Review
Breadcrumbs::for('review.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Відгуки', route('review.list'));
});

// Page list
Breadcrumbs::for('page.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Сторінки', route('page.list'));
});
// PageEdit
Breadcrumbs::for('page.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('page.list');
    $id = request()->route('id');
    $trail->push('Редагувати cторінку', route('page.edit', ['id' => $id]));
});

// Slider List
Breadcrumbs::for('slider.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Слайдери', route('slider.list'));
});

// Slider Add
Breadcrumbs::for('slider.add', function (BreadcrumbTrail $trail) {
    $trail->parent('slider.list');
    $trail->push('Додати слайдер', route('slider.add'));
});
// Slider Edit
Breadcrumbs::for('slider.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('slider.list');
    $id = request()->route('id');
    $trail->push('Редагувати слайдер', route('slider.edit', ['id' => $id]));
});


// Logo List
Breadcrumbs::for('partner.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Логотипи', route('partner.list'));
});

// LogoAdd
Breadcrumbs::for('partner.add', function (BreadcrumbTrail $trail) {
    $trail->parent('partner.list');
    $trail->push('Додати лого', route('partner.add'));
});
// Logo Edit
Breadcrumbs::for('partner.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('partner.list');
    $id = request()->route('id');
    $trail->push('Редагувати лого', route('partner.edit', ['id' => $id]));
});

Breadcrumbs::for('admin.system_setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Налаштування', route('admin.system_setting'));
});
Breadcrumbs::for('admin.home_setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Головна сторінка', route('admin.home_setting'));
});

Breadcrumbs::for('admin.smtp_setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('SMTP-Налаштування', route('admin.smtp_setting'));
});

Breadcrumbs::for('admin.card_setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Банківська картка', route('admin.card_setting'));
});

// Blog_Category List
Breadcrumbs::for('blog_category.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Категорії блогу', route('blog_category.list'));
});

// Blog_Category Add
Breadcrumbs::for('blog_category.add', function (BreadcrumbTrail $trail) {
    $trail->parent('blog_category.list');

    $trail->push('Додати категорію блогу', route('blog_category.add'));
});
// Blog_Category Edit
Breadcrumbs::for('blog_category.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('blog_category.list');
    $id = request()->route('id');
    $trail->push('Редагувати категорію блогу', route('blog_category.edit', ['id' => $id]));
});


// Blog List
Breadcrumbs::for('blog.list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Блог', route('blog.list'));
});

// Blog Add
Breadcrumbs::for('blog.add', function (BreadcrumbTrail $trail) {
    $trail->parent('blog.list');

    $trail->push('Додати блог', route('blog.add'));
});

// Blog Edit
Breadcrumbs::for('blog.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('blog.list');
    $id = request()->route('id');
    $trail->push('Редагувати блог', route('blog.edit', ['id' => $id]));
});

// FrontEnd - Home, pages, product, categories etc...

//Homepage

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Головна', route('home'));
});
// Blog 
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Блог', route('blog'));
    if (request()->has('search')) {
        $trail->push('Пошук', url('blog'));
    }
});

// Blog Category
Breadcrumbs::for('blog_category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog'); // Родитель - "Блог"
    $trail->push($category->name, route('blog_category', $category->slug));
});

Breadcrumbs::for('blog_detail', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('home');
    $trail->push('Блог', route('blog'));

    if ($blog->category) {
        $trail->push($blog->category->name, route('blog_category', $blog->category->slug));
    }

    $trail->push($blog->title, route('blog_detail', $blog->slug));

    if (request()->has('search')) {
        $trail->push('Пошук', url('blog'));
    }
});


//Pages
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакти', route('contact'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Про нас', route('about'));
});

Breadcrumbs::for('privacy_policy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Політика конфіденційності', route('privacy_policy'));
});

Breadcrumbs::for('payment_method', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Способи оплати', route('payment_method'));
});

Breadcrumbs::for('shipping_method', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Способи доставки', route('shipping_method'));
});
Breadcrumbs::for('return_policy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Повернення товару', route('return_policy'));
});
Breadcrumbs::for('money_back', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Повернення коштів', route('money_back'));
});
Breadcrumbs::for('terms_and_condition', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Правила та умови', route('terms_and_condition'));
});
Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});
Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Магазин', null); // Неклікабельний "Магазин"
    $trail->push('Кошик', route('cart'));
});
Breadcrumbs::for('checkout', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Магазин', null); // Неклікабельний "Магазин"
    $trail->push('Оплата', route('checkout'));
});

Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Пошук', route('search'));

    if (request()->has('search')) {
        $searchQuery = request()->get('q');
        $trail->push("Результати для: '{$searchQuery}'", url('search?search=' . $searchQuery));
    }
});

// Category, Subcategory, product

Breadcrumbs::for('category', function ($trail, $category) {
    if ($category) {
        $trail->parent('home');
        $trail->push($category->name, route('category', $category->slug));
    }
});

Breadcrumbs::for('subcategory', function ($trail, $category, $subcategory) {
    if ($category && $subcategory) {
        $trail->parent('category', $category);
        $trail->push($subcategory->name, route('category', [$category->slug, $subcategory->slug]));
    }
});

Breadcrumbs::for('product', function ($trail, $category, $subcategory, $product) {
    if ($category && $subcategory && $product) {
        $trail->parent('subcategory', $category, $subcategory);
        $trail->push($product->name, route('category', [$category->slug, $subcategory->slug, $product->slug]));
    }
});





