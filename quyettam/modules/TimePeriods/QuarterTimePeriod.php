<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/


require_once('modules/TimePeriods/TimePeriodInterface.php');
/**
 * Implements the calendar quarter representation of a time period where the monthly
 * leaves are split by the calendar month
 * @api
 */
class QuarterTimePeriod extends TimePeriod implements TimePeriodInterface {

    public function __construct() {
        //Override module_name to distinguish bean for BeanFactory
        $this->module_name = 'QuarterTimePeriods';

        parent::__construct();

        //The time period type
        $this->type = TimePeriod::QUARTER_TYPE;

        //The leaf period type
        $this->leaf_period_type = TimePeriod::MONTH_TYPE;

        //The number of leaf periods
        $this->leaf_periods = 3;

        //The number of periods in a year
        $this->periods_in_year = 4;

        //Fiscal is 52-week based, chronological is year based
        $this->is_fiscal = false;

        $this->is_fiscal_year = false;

        //The next period modifier
        $this->next_date_modifier = '3 month';

        //The previous period modifier
        $this->previous_date_modifier = '-3 month';

        //The name template
        global $app_strings;
        $this->name_template = $app_strings['LBL_QUARTER_TIMEPERIOD_FORMAT'];

        //The leaf name template
        $this->leaf_name_template = $app_strings['LBL_MONTH_TIMEPERIOD_FORMAT'];

        //The chart label
        $this->chart_label = "F Y";

        //The date formatting key for chart labels
        $this->chart_data_key = "m-Y";

        //The chart data interval modifier
        $this->chart_data_modifier = '+1 month';
    }

    /**
     * Returns the timeperiod name
     *
     * @param $count int value of the time period count (not used in MonthTimePeriod class)
     * @return string The formatted name of the timeperiod
     */
    public function getTimePeriodName($count)
    {
        global $sugar_config;
        $timedate = TimeDate::getInstance();
        $start = $timedate->fromDbDate($this->start_date)->format($sugar_config['datef']);
        $end = $timedate->fromDbDate($this->end_date)->format($sugar_config['datef']);
        return string_format($this->name_template, array($count, $start, $end));
    }


    /**
     * Returns the formatted chart label data for the timeperiod
     *
     * @param $chartData Array of chart data values
     * @return formatted Array of chart data values where the labels are broken down by the TimePeriod's increments
     */
    public function getChartLabels($chartData)
    {
        if(!empty($_SESSION['authenticated_user_language'])) {
            $list_strings = return_mod_list_strings_language($_SESSION['authenticated_user_language'], 'Calendar');
        } else {
            global $current_language;
            $list_strings = return_mod_list_strings_language($current_language, 'Calendar');
        }

        $timedate = TimeDate::getInstance();
        $months = array();
        $startDate = $timedate->fromDbDate($this->start_date);
        $nextDate = $timedate->fromDbDate($this->start_date);
        $endDate = $timedate->fromDbDate($this->end_date);
        $startDay = $startDate->format('j');
        $isFirst = $startDay == 1;
        $isLastDayOfMonth = $startDay == $startDate->format('t');
        $count = 0;

        while($count < 3) {
            $val = $chartData;

            $nextDate->modify($this->chart_data_modifier);
            $startDay = $startDate->format('j');
            $nextDay = $nextDate->format('j');

            //If the startDay was greater than the 28th and the nextDay is less than the 4th we know we have skipped a month
            //and so we subtract out the number of days we have gone over
            if($startDay > 28 && $nextDay < 4) {
                $nextDate->modify("-{$nextDay} day");
            } else if($isLastDayOfMonth) {
                $nextDate->setDate($nextDate->format('Y'), $nextDate->format('n'), $endDate->format('t'));
            }

            if($isFirst) {
                $month = $startDate->format('n');
                if(isset($list_strings['dom_cal_month_long'][$month])) {
                    $val['label'] = $list_strings['dom_cal_month_long'][$month] . ' ' . $startDate->format('Y');
                } else {
                    $val['label'] = $startDate->format($this->chart_label);
                }
            } else if ($count == 2) {
                $val['label'] = $startDate->format('n/j') . '-' . $timedate->fromDbDate($this->end_date)->format('n/j');
            } else {
                $val['label'] = $startDate->format('n/j') . '-' . $timedate->fromDbDate($nextDate->asDbDate())->modify('-1 day')->format('n/j');
            }

            $startDate = $timedate->fromDbDate($nextDate->asDbDate());
            $months[$count++] = $val;
        }
        return $months;
    }


    /**
     * Returns the key for the chart label data for the date closed value
     *
     * @param String The date_closed value in db date format
     * @return String value of the key to use to map to the chart labels
     */
    public function getChartLabelsKey($dateClosed)
    {
        $key = $this->id . ':keys';
        $keys = sugar_cache_retrieve($key);
        $timedate = TimeDate::getInstance();
        $ts = $timedate->fromDbDate($dateClosed)->getTimestamp();

        if(!empty($keys)) {
            foreach($keys as $timestamp=>$count) {
               if($ts <= $timestamp) {
                   return $count;
               }
            }
            return 2;
        }

        $keys = array();
        $startDate = $timedate->fromDbDate($this->start_date);
        $nextDate = $timedate->fromDbDate($this->start_date);
        $endDate = $timedate->fromDbDate($this->end_date);
        $startDay = $startDate->format('j');
        $isLastDayOfMonth = $startDay == $startDate->format('t');
        $count = 0;

        while($count < 3) {
            $nextDate->modify($this->chart_data_modifier);
            $startDay = $startDate->format('j');
            $nextDay = $nextDate->format('j');

            //If the startDay was greater than the 28th and the nextDay is less than the 4th we know we have skipped a month
            //and so we subtract out the number of days we have gone over
            if($startDay > 28 && $nextDay < 4) {
                $nextDate->modify("-{$nextDay} day");
            } else if($isLastDayOfMonth) {
                $nextDate->setDate($nextDate->format('Y'), $nextDate->format('n'), $endDate->format('t'));
            }

            if($count == 2) {
                $tsKey = $timedate->fromDbDate($this->end_date)->getTimestamp();
            } else {
                $tsKey = $timedate->fromDbDate($nextDate->asDbDate())->modify('-1 day')->getTimestamp();
            }

            $keys[$tsKey] = $count;
            $startDate = $timedate->fromDbDate($nextDate->asDbDate());
            $count++;
        }

        sugar_cache_put($key, $keys);
        foreach($keys as $tsKey=>$count) {
            if($ts <= $tsKey) {
                return $count;
            }
        }
        return 2;
    }
}