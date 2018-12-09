<?php

class Context
{
    private $suffix;

    const FRONT_OFFICE = 'front';
    const BACK_OFFICE = 'back';

	public function Init($appMode = self::FRONT_OFFICE)
    {
        $this->suffix = $appMode != '' ? '_'.$appMode : '';
        $this->setAppMode($appMode);
    }

    public function SessionKey($prefix)
    {
        return $prefix.$this->suffix;
    }

    public function SetAppMode($appMode)
    {
        $CI =& get_instance();
        $CI->session->set_userdata('AppMode', $appMode);
    }

    public function GetAppMode()
    {
        $CI =& get_instance();
        return $CI->session->userdata('AppMode') ?
            $CI->session->userdata('AppMode') : self::FRONT_OFFICE;
    }

    /** lang is already defined in the session? **/
    public function IsLangCodeDefined()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('LangCode')) ? TRUE : FALSE;
    }

    public function SetLangCode($langCode)
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('LangCode'), $langCode);
    }

    /** lang defined with the last call of Base_controller:setcontext during the navigation*/
    public function GetLangCode()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('LangCode')) ?
            $CI->session->userdata($this->SessionKey('LangCode')) : 'es';
    }

    public function SetTranslationId($transID)
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('TransID'), $transID);
    }

    /** Magazine defined with the last call of Base_controller:setcontext during the navigation*/
    public function GetTranslationId()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('TransID')) ?
            $CI->session->userdata($this->SessionKey('TransID')) : NULL;
    }

    public function SetParamsUrl($paramsURL)
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('ParamsURL'), $paramsURL);
    }

    /** params defined with the last call of Base_controller:setcontext during the navigation*/
    public function GetParamsUrl()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('ParamsURL')) ?
            $CI->session->userdata($this->SessionKey('ParamsURL')) : '';
    }

    public function SetParamsList($paramsList)
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('ParamsList'), $paramsList);
    }

    /** params defined with the last call of Base_controller in array form:setcontext during the navigation*/
    public function GetParamsList()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('ParamsList')) ?
            $CI->session->userdata($this->SessionKey('ParamsList')) : array();
    }

    public function RemoveParams()
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('ParamsURL'), '');
        $CI->session->set_userdata($this->SessionKey('ParamsList'), array());
    }

    public function SetQueryString($queryString)
    {
        $CI =& get_instance();
        $CI->session->set_userdata($this->SessionKey('QueryString'), $queryString);
    }

    public function GetQueryString()
    {
        $CI =& get_instance();
        return $CI->session->userdata($this->SessionKey('QueryString')) ?
            $CI->session->userdata($this->SessionKey('QueryString')) : '';
    }
}