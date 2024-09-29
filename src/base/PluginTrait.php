<?php
namespace verbb\readability\base;

use verbb\readability\Readability;
use verbb\readability\services\Service;

use Craft;

use yii\log\Logger;

use verbb\base\BaseHelper;

trait PluginTrait
{
    // Static Properties
    // =========================================================================

    public static Readability $plugin;


    // Public Methods
    // =========================================================================

    public static function log(string $message, array $attributes = []): void
    {
        if ($attributes) {
            $message = Craft::t('readability', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'readability');
    }

    public static function error(string $message, array $attributes = []): void
    {
        if ($attributes) {
            $message = Craft::t('readability', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'readability');
    }


    // Public Methods
    // =========================================================================

    public function getService(): Service
    {
        return $this->get('service');
    }


    // Private Methods
    // =========================================================================

    private function _setPluginComponents(): void
    {
        $this->setComponents([
            'service' => Service::class,
        ]);

        BaseHelper::registerModule();
    }

    private function _setLogging(): void
    {
        BaseHelper::setFileLogging('readability');
    }

}