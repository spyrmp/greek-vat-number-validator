<?php
namespace Spyrmp\GreekVatNumberValidator;

use Illuminate\Support\ServiceProvider;
use Spyrmp\GreekVatNumberValidator\Rules\VatValidation;
use Validator;

class GreekVatNumberValidatorProvider extends ServiceProvider
{
    public function boot(){
        $this->loadTranslations();
        $this->registerRules();
    }

    private function registerRules()
    {
        Validator::replacer('greek_vat_validator', function () {
            return (new VatValidation())->message();
        });
        Validator::extend('greek_vat_validator', function ($attribute, $value) {
            return (new VatValidation)->passes($attribute, $value);
        });
    }

    private function loadTranslations()
    {
        $translationsPath = $this->packagePath('resources/lang');
        $this->loadTranslationsFrom($translationsPath, 'greek-vat-number-validator');
        $this->publishes([$translationsPath => resource_path('lang/vendor/greek-vat-number-validator')], "greek-vat-number-validator");
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

}
