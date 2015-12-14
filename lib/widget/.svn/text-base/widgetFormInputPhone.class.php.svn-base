<?php

/**
 * sfWidgetFormInputPhone represents an HTML input tag.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class widgetFormInputPhone extends sfWidgetForm
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * type:         The widget type (text by default)
   *  * mask:         Pattern for phone (see http://digitalbush.com/projects/masked-input-plugin/)
   *  * ok_class:     Class for ok note
   *  * holder_class: Class for field holder
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('type', 'text');
    $this->addOption('mask', '(999) 999-9999');
    $this->addOption('ok_class', null);
    $this->addOption('holder_class', null);

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
    if (isset($attributes['id'])) $id = $attributes['id']; else $id = $this->generateId($name);
    if (isset($attributes['ok_class'])) $ok_class = 'class="'.$attributes['ok_class'].'"'; else $ok_class = ($this->getOption('ok_class') ? 'class="'.$this->getOption('ok_class').'"' : '');

    unset($attributes['ok_class']);

    $output = '<span '.($this->getOption('holder_class') ? 'class="'.$this->getOption('holder_class').'"' : '').'>'
              .$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes))
              .sprintf(<<<EOF
  <span id="%1\$s_mask_ok" %3\$s></span>
</span>
<script type="text/javascript">
//<![CDATA[
$(function() {
  $('#%1\$s').setMask({ autoTab: false, mask: '%2\$s', onValid: function () { $('#%1\$s_mask_ok').html($('#%1\$s').val().length == %4\$s ? 'ok' : ''); }, onInvalid: function () { $('#%1\$s_mask_ok').html('invalid'); } });
});
//]]>
</script>
EOF
      ,
      $id,
      $this->getOption('mask'),
      $ok_class,
      strlen($this->getOption('mask'))
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
//    return array('/js/jquery.maskedinput.js');
    return array('/js/jquery.meio.mask.min.js');
  }
}
