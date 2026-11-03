<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Settings\SettingModel;
use App\Models\Banners\BannerModel;

class ExampleTest extends TestCase
{
    public function test_setting_model_uses_correct_database_table(): void
    {
        $model = new SettingModel();

        $this->assertSame('cl_settings', $model->getTable());
    }

    public function test_banner_model_uses_correct_database_table(): void
    {
        $model = new BannerModel();

        $this->assertSame('cl_banner', $model->getTable());
    }

    public function test_setting_model_has_expected_fillable_fields(): void
    {
        $model = new SettingModel();

        $this->assertContains('site_name', $model->getFillable());
        $this->assertContains('logo', $model->getFillable());
    }
}
