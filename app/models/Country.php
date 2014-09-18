<?php

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use LaravelBook\Ardent\Ardent;

class Country extends Ardent {
	
	use Translatable {
        Translatable::save as translatableSave;
    }
	
	/**
     * Array with the fields translated in the Translation table
     *
     * @var array
     */
    public $translatedAttributes = array('name');
 
    /**
     * Set $translationModel if you want to overwrite the convention
     * for the name of the translation Model. Use full namespace if applied.
     *
     * The convention is to add "Translation" to the name of the class extending Translatable.
     * Example: Country => CountryTranslation
     */
    public $translationModel;
 
    /**
     * This is the foreign key used to define the translation relationship.
     * Set this if you want to overwrite the laravel default for foreign keys.
     *
     * @var
     */
    public $translationForeignKey;
 
    /**
     * Add your translated attributes here if you want
     * fill them with mass assignment
     *
     * @var array
     */
    public $fillable = array('iso','name');
 
    /**
     * The database field being used to define the locale parameter in the translation model.
     * Defaults to 'locale'
     *
     * @var string
     */
    public $localeKey;
 
    public function save(array $rules = array(),
                         array $customMessages = array(),
                         array $options = array(),
                         Closure $beforeSave = null,
                         Closure $afterSave = null)
    {
        if ($this->translatableSave($options))
        {
            return parent::save($rules, $customMessages, $options, $beforeSave, $afterSave);
        }
        return false;
    }
}	