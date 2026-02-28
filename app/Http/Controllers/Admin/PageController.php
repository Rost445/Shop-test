<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use App\Models\NotificationModel;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SMTPModel;
use App\Models\SystemSettingModel;
use App\Models\CardSettingModel;
use App\Models\HomeSettingModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;


class PageController extends Controller
{

    public function notification()
    {
        $data['getRecord'] = NotificationModel::getRecord();
        $data['header_title'] = 'Сповіщення';
        return view('admin.notification.list', $data);
    }

    public function contactus()
    {
        $data['getRecord'] = ContactUsModel::getRecord();
        $data['header_title'] = 'Повідомлення';
        return view('admin.contactus.list', $data);
    }

    public function contactus_delete($id)
    {
        ContactUsModel::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Повідомлення успішно видалено!');
    }

    public function list()
    {
        $data['getRecord'] = PageModel::getRecord();
        $data['header_title'] = 'Сторінки';
        return view('admin.page.list', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = PageModel::getSingle($id);
        $data['header_title'] = 'Редагувати сторінку';
        return view('admin.page.edit', $data);
    }


    // Update Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page = PageModel::getSingle($id);
        $page->name = trim($request->name);
        $page->title  = trim($request->title);
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

        if (!empty($request->file('image'))) {

            $file = $request->file('image');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = $page->id . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/page/', $filename);

            $page->image_name = trim($filename);
            $page->save();
        }

        return redirect('admin/page/list')->with('success', 'Сторінку успішно оновлено!');
    }



    public function system_setting()
    {
        $data['getRecord'] = SystemSettingModel::getSingle();
        $data['header_title'] = 'Налаштування';
        return view('admin.setting.system_setting', $data);
    }

    public function update_system_setting(Request $request)
    {
        $save = SystemSettingModel::getSingle();
        $save->website_name =       trim($request->website_name);
        $save->footer_description = trim($request->footer_description);
        $save->address =            trim($request->address);
        $save->phone =              trim($request->phone);
        $save->phone_two =          trim($request->phone_two);
        $save->submit_email =       trim($request->submit_email);
        $save->email =              trim($request->email);
        $save->email_two =          trim($request->email_two);
        $save->working_hours =      trim($request->working_hours);
        $save->facebook_link =      trim($request->facebook_link);
        $save->instagram_link =     trim($request->instagram_link);
        $save->youtube_link =       trim($request->youtube_link);
        $save->tiktok_link =        trim($request->tiktok_link);

        if (!empty($request->file('logo'))) {

            $file = $request->file('logo');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->logo = trim($filename);
        }
        if (!empty($request->file('favicon'))) {

            $file = $request->file('favicon');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->favicon = trim($filename);
        }

        if (!empty($request->file('footer_payment_icon'))) {

            $file = $request->file('footer_payment_icon');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->footer_payment_icon = trim($filename);
        }


        $save->save();

        return redirect()->back()->with('success', 'Налаштування успішно оновлено!');
    }



    public function home_setting()
    {
        $data['getRecord'] = HomeSettingModel::getSingle();
        $data['header_title'] = 'Головна сторінка';
        return view('admin.setting.home_setting', $data);
    }

    public function update_home_setting(Request $request)
    {
        $save = HomeSettingModel::getSingle();
        $save->trendy_product_title = trim($request->trendy_product_title);
        $save->shop_category_title = trim($request->shop_category_title);
        $save->recent_arival_title = trim($request->recent_arival_title);
        $save->blog_title = trim($request->blog_title);
        $save->payment_delivery_title = trim($request->payment_delivery_title);
        $save->payment_delivery_description = trim($request->payment_delivery_description);
        $save->refind_delivery_title = trim($request->refind_delivery_title);
        $save->refind_description = trim($request->refind_description);
        $save->support_title     = trim($request->support_title);
        $save->support_description = trim($request->support_description);
        $save->signup_title     = trim($request->signup_title);
        $save->signup_description = trim($request->signup_description);


        if (!empty($request->file('payment_delivery_image'))) {
            $file = $request->file('payment_delivery_image');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);
            $save->payment_delivery_image = trim($filename);
        }
        $save->save();

        if (!empty($request->file('refind_image'))) {
            $file = $request->file('refind_image');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);
            $save->refind_image = trim($filename);
        }
        $save->save();

        if (!empty($request->file('support_image'))) {
            $file = $request->file('support_image');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);
            $save->support_image = trim($filename);
        }
        $save->save();

        if (!empty($request->file('signup_image'))) {
            $file = $request->file('signup_image');
            $ext =  $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);
            $save->signup_image = trim($filename);
        }
        $save->save();

        return redirect()->back()->with('success', 'Головна сторінка успішно оновлена!');
    }

    public function smtp_setting()
    {
        $data['getRecord'] = SMTPModel::getSingle();
        $data['header_title'] = 'SMTP-Налаштування';
        return view('admin.setting.smtp_setting', $data);
    }


    public function update_smtp_setting(Request $request)
{
    $save = SMTPModel::getSingle();
    $save->name = trim($request->name);
    $save->mail_mailer = trim($request->mail_mailer);
    $save->mail_host = trim($request->mail_host);
    $save->mail_port = trim($request->mail_port);
    $save->mail_username = trim($request->mail_username);
    $save->mail_password = trim($request->mail_password);
    $save->mail_encryption = trim($request->mail_encryption);
    $save->mail_from_address = trim($request->mail_from_address);
    $save->save();

    // Обновление .env
    $this->updateEnv([
        'MAIL_MAILER' => $save->mail_mailer,
        'MAIL_HOST' => $save->mail_host,
        'MAIL_PORT' => $save->mail_port,
        'MAIL_USERNAME' => $save->mail_username,
        'MAIL_PASSWORD' => $save->mail_password,
        'MAIL_ENCRYPTION' => $save->mail_encryption,
        'MAIL_FROM_ADDRESS' => $save->mail_from_address,
    ]);

    // Очистка кеша конфигурации
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    return redirect()->back()->with('success', 'SMTP налаштування успішно оновлені!');
}

// Метод для обновления .env
private function updateEnv(array $data)
{
    $envPath = base_path('.env');
    if (!file_exists($envPath)) {
        return;
    }

    $envContent = file_get_contents($envPath);

    foreach ($data as $key => $value) {
        $pattern = "/^$key=.*$/m";
        $replacement = "$key=\"$value\"";
        $envContent = preg_replace($pattern, $replacement, $envContent);
    }

    file_put_contents($envPath, $envContent);
}

public function card_setting()
    {
        $data['getRecord'] = CardSettingModel::getSingle();
        $data['header_title'] = 'Банківська картка';
        return view('admin.setting.card_setting', $data);
    }

    public function update_card_setting(Request $request)
{
    $save = CardSettingModel::getSingle();

    if (!$save) {
        return back()->with('error', 'Налаштування картки не знайдено.');
    }

    $save->card_number = trim($request->card_number);
    $save->name_owner  = trim($request->name_owner); // Fixed typo: $request->ame_owner
    $save->surname     = trim($request->surname);
    $save->bank        = trim($request->bank);

    $save->save();

    return back()->with('success', 'Налаштування картки успішно оновлено.');
}
}
