<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

	require 'MomentPHP/src/FormatsInterface.php';
	require 'MomentPHP/src/Moment.php';
	require 'MomentPHP/src/MomentException.php';
	require 'MomentPHP/src/MomentFromVo.php';
	require 'MomentPHP/src/MomentHelper.php';
	require 'MomentPHP/src/MomentLocale.php';
	require 'MomentPHP/src/MomentPeriodVo.php';
	require 'MomentPHP/src/CustomFormats/MomentJs.php';

if(!function_exists('moment'))
{
	/**
	 * @param string $dateTime
	 * @param string|null $timezone
	 * @param bool $immutableMode
	 */

	function moment($dateTime = 'now', $timezone = null, $immutableMode = false)
	{
		try{
			$moment =  new Moment($dateTime, $timezone, $immutableMode);
			$moment->setLocale('fr_FR');
			return $moment;
		}
		catch (Exception $ex) {
			return new Moment();
		}
	}
}

if(!function_exists('fromNow'))
{
    /**
     * @param string $dateTime
     * @param string|null $timezone
     * @param bool $immutableMode
     */

    function fromNow($dateTime = 'now', $timezone = null, $immutableMode = false)
    {
        try{
            $moment =  moment($dateTime, $timezone, $immutableMode);
            
            if($moment->fromNow()->getDays()>0 And $moment->fromNow()->getDays()<=7)
            {
                return $moment->fromNow()->getRelative();
            }elseif($moment->fromNow()->getDays()<0 And $moment->fromNow()->getDays()>=-7)
            {
                return $moment->fromNow()->getRelative();
            }else{
				$time = (int)$moment->getHour()*60*60 + (int)$moment->getHour()*60 + (int)$moment->getHour();
				if($time == 0)
					return 'le '.$moment->format('l, jS F Y');
				else
					return 'le '.$moment->format('l, jS F Y à H:i:s');
            }
        }catch (MomentException $ex)
        {
            return null;
        }
    }
}


define('NO_TZ_MYSQL', 'Y-m-d H:i:s');
define('NO_TZ_NO_SECS', 'Y-m-d H:i');
define('NO_TIME', 'Y-m-d');
define('NO_TZ_FR', 'd/m/Y H:i:s');
define('NO_TZ_FR_SECS', 'd/m/Y H:i');