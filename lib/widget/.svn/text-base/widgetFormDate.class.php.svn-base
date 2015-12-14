<?php

/**
 * sfWidgetFormDateTimeCustom represents a datetime widget.
 *
 * @package    angelflight
 * @subpackage widget
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class widgetFormDate extends sfWidgetForm
{
  /**
   * Configures the current widget.
   *
   * The attributes are passed to both the date and the time widget.
   *
   * If you want to pass HTML attributes to one of the two widget, pass an
   * attributes option to the date or time option (see below).
   *
   * Available options:
   *
   *  * format_date: The format string in js and php for date. (see http://docs.jquery.com/UI/Datepicker/formatDate) (see http://www.php.net/date)
   *  * date:      Options for the date widget (see sfWidgetFormDate)
   *  * format:    The format string for the datetime widget (default to %date% %hours% %minutes% %period%)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('format_date', array('js' => 'ISO_8601', 'php' => 'Y-m-d H:i:s'));
    $this->addOption('change_month', null);
    $this->addOption('change_year', null);
    $this->addOption('button', false);
    $this->addOption('min_date', null);
    $this->addOption('max_date', null);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The date and time displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $options = $this->getOptions();
    $date_format = $options['format_date'];
    
    $value = (string)$value == (string)(integer)$value ? (integer)$value : strtotime($value);
    if ($value === false){
      $value = array('date1' => null, 'date2' => null);
    }else{
      $value = array(
        'date1' => 'new Date('.date('Y', $value).', '.(date('n', $value) - 1).', '.date('j', $value).')',
        'date2' => date($date_format['php'], $value),
      );
    }
    
    $add = '';
    if ($value['date1']) $add .= ', defaultDate:'.$value['date1'];
    if ($options['change_year']) $add .= ', changeYear: true';
    if ($options['change_month']) $add .= ', changeMonth: true';
    if ($options['button']) $add .= ", showOn: 'both', buttonImage: '".$options['button']."', buttonImageOnly: true";
    if ($options['min_date']) $add .= ", minDate: '".$options['min_date']."'";
    if ($options['max_date']) $add .= ", maxDate: '".$options['max_date']."'";

    unset($options['format_date'], $options['change_month'], $options['change_year'], $options['min_date'], $options['max_date'], $options['button']);

    $input_widget = new sfWidgetFormInput($options, $this->getAttributes());
    if (isset($attributes['id'])) $id = $attributes['id']; else $id = $this->generateId($name);

    $date = $input_widget->render($name, $value['date2'], $attributes).sprintf(<<<EOF
<script type="text/javascript">
//<![CDATA[
jQuery(function() {
  jQuery("#%s").datepicker({ dateFormat: '%s'%s });
});
//]]>
</script>
EOF
      ,
      $id,
      $date_format['js'],
      $add
    );

    return $date;
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/js/jquery-ui.custom.min.js');
  }
  
  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array('/css/jquery-ui.custom.css' => 'all');
  }
}
