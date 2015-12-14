<?php

/**
 * sfWidgetFormDateTimeCustom represents a datetime widget.
 *
 * @package    angelflight
 * @subpackage widget
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class widgetFormDateTimeCustom extends sfWidgetForm
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
   *  * hours:     Options for the hours widget (see sfWidgetFormChoice)
   *  * minutes:   Options for the minutes widget (see sfWidgetFormChoice)
   *  * period:    Options for the period widget (see sfWidgetFormChoice)
   *  * format:    The format string for the datetime widget (default to %date% %hours% %minutes% %period%)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('format_date', array('js' => 'ISO_8601', 'php' => 'Y-m-d H:i:s'));
    $this->addOption('date', array());
    $this->addOption('hours', array('choices' => parent::generateTwoCharsRange(1, 12)));
    $this->addOption('minutes', array('choices' => parent::generateTwoCharsRange(0, 59)));
    $this->addOption('period', array('choices' => array('AM' => 'AM', 'noon' => 'Noon', 'PM' => 'PM', 'midnight' => 'Midnight')));
    $this->addOption('format', '%date% %hours% %minutes% %period%');
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
    $date_format = $this->getOption('format_date');
    
    // convert value to an array
    $default = array('date1' => null, 'date2' => null, 'hour' => null, 'minute' => null, 'period' => null);
    if (is_array($value)){
      $value = array_merge($default, $value);
    }else{
      $value = (string)$value == (string)(integer)$value ? (integer)$value : strtotime($value);
      if (false === $value){
        $value = $default;
      }else{
        $value = array(
          'date1' => 'new Date('.date('Y', $value).', '.(date('n', $value) - 1).', '.date('j', $value).')',
          'date2' => date($date_format['php'], $value),
          'hour' => date('g',$value),
          'minute' => (int)date('i', $value),
          'period' => date('A', $value),
        );
      }
    }
    
    $date = $this->getDateWidget($attributes)->render($name.'[date]', $value['date2']).sprintf(<<<EOF
<script type="text/javascript">
//<![CDATA[
$(function() {
  $("#%s").datepicker({ dateFormat: '%s'%s });
});
//]]>
</script>
EOF
      ,
      $this->generateId($name.'[date]'),
      $date_format['js'],
      ($value['date1']?', defaultDate:'.$value['date1']:'')
    );

    return strtr($this->getOption('format'), array(
      '%date%' => $date,
      '%hours%' => $this->getHoursWidget($attributes)->render($name.'[hour]', $value['hour']),
      '%minutes%' => $this->getMinutesWidget($attributes)->render($name.'[minute]', $value['minute']),
      '%period%' => $this->getPeriodWidget($attributes)->render($name.'[period]', $value['period']),
    ));
  }

  /**
   * Returns the input widget.
   *
   * @param  array $attributes  An array of attributes
   * @return sfWidgetForm A Widget representing the input
   */
  protected function getDateWidget($attributes = array())
  {
    return new sfWidgetFormInput($this->getOptionsFor('date'), $this->getAttributesFor('date', $attributes));
  }

  /**
   * Returns the choice widget for hour.
   *
   * @param  array $attributes  An array of attributes
   * @return sfWidgetForm A Widget representing the hours
   */
  protected function getHoursWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('hours'), $this->getAttributesFor('hours', $attributes));
  }
  
  /**
   * Returns the choice widget for minute.
   *
   * @param  array $attributes  An array of attributes
   * @return sfWidgetForm A Widget representing the minutes
   */
  protected function getMinutesWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('minutes'), $this->getAttributesFor('minutes', $attributes));
  }
  
  /**
   * Returns the choice widget for period.
   *
   * @param  array $attributes  An array of attributes
   * @return sfWidgetForm A Widget representing the period
   */
  protected function getPeriodWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('period'), $this->getAttributesFor('period', $attributes));
  }

  /**
   * Returns an array of options for the given type.
   *
   * @param  string $type  The type (date or time)
   *
   * @return array  An array of options
   *
   * @throws InvalidArgumentException when option date|time type is not array
   */
  protected function getOptionsFor($type)
  {
    $options = $this->getOption($type);
    if (!is_array($options))
    {
      throw new InvalidArgumentException(sprintf('You must pass an array for the %s option.', $type));
    }

    return $options;
  }

  /**
   * Returns an array of HTML attributes for the given type.
   *
   * @param  string $type        The type (date or time)
   * @param  array  $attributes  An array of attributes
   *
   * @return array  An array of HTML attributes
   */
  protected function getAttributesFor($type, $attributes)
  {
    $defaults = isset($this->attributes[$type]) ? $this->attributes[$type] : array();

    return isset($attributes[$type]) ? array_merge($defaults, $attributes[$type]) : $defaults;
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
