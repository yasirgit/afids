<?php

/**
 * widgetFormInputZipcode represents an HTML input tag.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class widgetFormInputZipcode extends sfWidgetForm
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * type: The widget type (text by default)
   *  * mask: Pattern for phone (see http://www.meiocodigo.com/projects/meiomask/)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('type', 'text');
    $this->addOption('mask', '99999-9999');

    $this->setOption('is_hidden', false);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $value = (string)$value;
    if (isset($attributes['id'])) $id = $attributes['id']; else $id = $this->generateId($name);
    
    $output = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes))
              .sprintf(<<<EOF
<script type="text/javascript">
//<![CDATA[
$(function() {
  $('#%s').setMask({ autoTab: false, mask: '%s' });
});
//]]>
</script>
EOF
      ,
      $id,
      $this->getOption('mask')
    );
    
    return $output;
  }
  
  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/js/jquery.meio.mask.min.js');
  }
}
