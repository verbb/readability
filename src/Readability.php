<?php
/**
 * Readability plugin for Craft CMS 3.x
 *
 * Get statistics on your text.
 *
 * @link      https://github.com/mikestecker
 * @copyright Copyright (c) 2017 Mike Stecker
 */

namespace mikestecker\readability;

use mikestecker\readability\services\ReadabilityService as ReadabilityServiceService;
use mikestecker\readability\variables\ReadabilityVariable;
use mikestecker\readability\twigextensions\ReadabilityTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class Readability
 *
 * @author    Mike Stecker
 * @package   Readability
 * @since     1.0.0
 *
 * @property  ReadabilityServiceService $readabilityService
 */
class Readability extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Readability
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new ReadabilityTwigExtension());

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('readability', ReadabilityVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'readability',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
