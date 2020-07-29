<?php

namespace Marshmallow\Nova\Fields\Size;

use Laravel\Nova\Fields\Number;
use Marshmallow\HelperFunctions\Facades\Size as SizeFacade;

class Size extends Number
{
	protected $to = 'Auto';
	protected $from = 'bytes';
	protected $precision = 2;

	public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->help('The value shown in this field is a size in <strong>Bytes</strong/>.');
        $this->setResolveUsing();
    }

    public function isStoredAs($from)
    {
    	$this->from = $from;
    	$this->help('The value shown in this field is a size in <strong>'. $from .'</strong/>.');
    	$this->setResolveUsing();
    	return $this;
    }

    public function displayAs($to)
    {
    	$this->to = $to;
    	$this->setResolveUsing();
    	return $this;
    }

    public function precision($precision)
    {
    	$this->precision = $precision;
    	$this->setResolveUsing();
    	return $this;
    }

    protected function setResolveUsing()
    {
    	$this->displayUsing(function ($value, $model, $column) {
        	return SizeFacade::of($value)
		        				->from($this->from)
		        				->to($this->to)
		        				->convert($this->precision);
        });
    }
}
