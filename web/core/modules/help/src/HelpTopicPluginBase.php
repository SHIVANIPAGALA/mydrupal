<?php

namespace Drupal\help;

use Drupal\Core\Link;
use Drupal\Core\Plugin\PluginBase;
use Drupal\Core\Url;

/**
 * Base class for help topic plugins.
 *
 * @internal
 *   Plugin classes are internal.
 */
abstract class HelpTopicPluginBase extends PluginBase implements HelpTopicPluginInterface {

  /**
   * The name of the module or theme providing the help topic.
   */
  public function getProvider() {
    return $this->pluginDefinition['provider'];
  }

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->pluginDefinition['label'];
  }

  /**
   * {@inheritdoc}
   */
  public function isTopLevel() {
    return $this->pluginDefinition['top_level'];
  }

  /**
   * {@inheritdoc}
   */
  public function getRelated() {
    return $this->pluginDefinition['related'];
  }

  /**
   * {@inheritdoc}
   */
  public function toUrl(array $options = []) {
    return Url::fromRoute('help.help_topic', ['id' => $this->getPluginId()], $options);
  }

  /**
   * {@inheritdoc}
   */
  public function toLink($text = NULL, array $options = []) {
    if (!$text) {
      $text = $this->getLabel();
    }
    return Link::createFromRoute($text, 'help.help_topic', ['id' => $this->getPluginId()], $options);
  }

}
