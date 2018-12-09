<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* Form Class for Admin */
class Base_Controller extends CI_Controller
{
    var $data;
    protected static $CI;

    function __construct()
    {
        parent::__construct();
        self::$CI = &get_instance();

        $this->data = array();

        $this->data['alerts'] = Alerts::GetAlerts();
    }

    function SetContext($args = array())
    {
        if (count($args) >= 0)
        {            
            $langs = Tools::GetLangs();
                
            if (count($args) >= 1)
            {
                $lang = $args[count($args)-1];
                $params = array();
                
                if(in_array($lang, $langs))
                {
                    $this->data['langCode'] = $lang;
                    $this->context->SetLangCode($this->data['langCode']);
                    
                    for($i = 0; $i<count($args)-1; $i++)
                    {
                        $params[] = $args[$i];
                    }
                }
                else
                {
                    for($i = 0; $i<count($args); $i++)
                    {
                        $params[] = $args[$i];
                    }
                }

                $this->data['paramsList'] = $params;
                $this->context->SetParamsList($params);

                $params = !empty($params) ? implode('/', $params) : '';
                $this->data['paramsURL'] = $params;
                $this->context->SetParamsUrl($params);
            }
            else
            {
                $this->context->SetParamsUrl('');
                $this->context->SetParamsList(array());
            }
        }
        
        switch($this->context->GetLangCode())
        {
            case 'es':
                setlocale(LC_TIME,'es_ES');
                $this->lang->load('dynaflux', 'spanish'); 
            break;
            case 'en':
                setlocale(LC_TIME,'en_US');
                $this->lang->load('dynaflux', 'english'); 
            break;
        }   
    }
    
}
