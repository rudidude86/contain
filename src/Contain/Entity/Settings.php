<?php
namespace Contain\Entity;

use Contain\Entity\AbstractEntity;
use Contain\Entity\Property\Property;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;

/**
 * Settings Entity (auto-generated by the Contain module)
 *
 * This instance should not be edited directly. Edit the definition file instead
 * and recompile.
 */
class Settings extends AbstractEntity
{
    protected $inputFilter = 'Contain\Entity\Filter\Settings';
    protected $messages = array();

    /**
     * Initializes the properties of this entity.
     *
     * @return  $this
     */
    public function init()
    {
        $this->properties['settings'] = array('type' => '\Contain\Entity\Property\Type\ListType', 'options' => array (
  'type' => 'entity',
  'className' => 'Contain\\Entity\\Setting',
));
            }

    /**
     * Searches for a value and returns its index or FALSE if not found.
     *
     * @param   mixed                           Value to search for
     * @param   boolean                         Strict type checking
     * @return  integer|false
     */
    public function indexOfSettings($value, $strict = false)
    {
        return $this->indexOf('settings', $value, $strict);
    }

    /**
     * Fetches a list item by its numerical index position.
     *
     * @param   string                          Property name
     * @param   integer                         Index
     * @return  mixed|null                      Value or null if unset
     */
    public function atSettings($index)
    {
        return $this->at('settings', $index);
    }

    /**
     * Prepends a value to a list property.
     *
     * @param   mixed                           Value to prepend
     * @return  $this
     */
    public function unshiftSettings($value)
    {
        return $this->unshift('settings', $value);
    }

    /**
     * Appends a value to a list property.
     *
     * @param   mixed                           Value to append
     * @return  $this
     */
    public function pushSettings($value)
    {
        return $this->push('settings', $value);
    }
  
    /**
     * Removes a property from the end of a list and returns it.
     *
     * @return  mixed                           List item (now removed)
     */
    public function popSettings($value)
    {
        return $this->pop('settings', $value);
    }

    /**
     * Removes a property from the beginning of a list and returns it.
     *
     * @return  mixed                           List item (now removed)
     */
    public function shiftSettings($value)
    {
        return $this->shift('settings', $value);
    }

    /**
     * Extracts a slice of the list.
     *
     * @param   integer                         Offset
     * @param   integer|null                    Length
     * @return  array
     */
    public function sliceSettings($offset, $length = null)
    {
        return $this->slice('settings', $offset, $length);
    }

    /**
     * Merges the list with another array.
     *
     * @param   array                           Array to merge with
     * @param   boolean                         True if existing list is the source vs. target
     * @return  array
     */
    public function mergeSettings($arr, $source = true)
    {
        return $this->merge('settings', $arr, $source);
    }

    /**
     * Removes a single item from the list by value if it exists.
     *
     * @param   mixed                           Value to remove
     * @return  array
     */
    public function removeSettings($value)
    {
        return $this->remove('settings', $value);
    }

    /**
     * Adds an item to the list if it doesn't already exist.
     *
     * @param   mixed                           Value to add
     * @param   boolean                         True for prepend, false for append
     * @return  $this
     */
    public function addSettings($value, $prepend = true)
    {
        return $this->add('settings', $value, $prepend);
    }

    /**
     * Accessor getter for the settings property
     *
     * @return  See: Contain\Entity\Property\Type\ListType::getValue()
     */
    public function getSettings()
    {
        return $this->get('settings');
    }

    /**
     * Accessor setter for the settings property
     *
     * @param   See: Contain\Entity\Property\Type\ListType::parse()
     * @return  $this
     */
    public function setSettings($value)
    {
        return $this->set('settings', $value);
    }

    /**
     * Accessor existence checker for the settings property
     *
     * @return  boolean
     */
    public function hasSettings()
    {
        $property = $this->property('settings');
        return !($property->isUnset() || $property->isEmpty());
    }

    /**
     * Gets a site setting value by name.
     *
     * @param   string                      Name
     * @return  mixed
     */
    public function getSetting($name)
    {
        if ($settings = $this->getSettings()) {
            foreach ($settings as $setting) {
                if ($setting->getName() == $name) {
                    return $setting->getValue();
                }
            }
        }

        return null;
    }

    /**
     * Verifies that a setting key exists.
     *
     * @param   string                      Name
     * @return  boolean
     */
    public function hasSetting($name)
    {
        if ($settings = $this->getSettings()) {
            foreach ($settings as $setting) {
                if ($setting->getName() == $name) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Sets a site setting.
     *
     * @param   string                      Name
     * @param   mixed                       Value
     * @return  $this
     */
    public function addSetting($name, $value)
    {
        return $this->setSetting($name, $value);
    }

    /**
     * Removes a setting by key.
     *
     * @param   string                      Name
     * @return  $this
     */
    public function removeSetting($name)
    {
        if ($settings = $this->getSettings()) {
            foreach ($settings as $index => $setting) {
                if ($setting->getName() == $name) {
                    unset($settings[$index]);
                    break;
                }
            }
        }

        $this->setSettings(array_merge(array(), $settings));

        return $this;
    }

    /**
     * Sets a site setting.
     *
     * @param   string                      Name
     * @param   mixed                       Value
     * @return  $this
     */
    public function setSetting($name, $value)
    {
        if ($settings = $this->getSettings()) {
            foreach ($settings as $setting) {
                if ($setting->getName() == $name) {
                    $setting->setValue($value);
                    return $this;
                }
            }
        } else {
            $settings = array();
        }

        $setting = new \Contain\Entity\Setting(array(
            'name' => $name,
            'value' => $value,
        ));

        $settings[] = $setting;
        $this->setSettings($settings);

        return $this;
    }

}
