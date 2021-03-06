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

/**
 * View that displays committed forecasts for current user.  If the manager view is selected, the Forecasts
 * of Rollup type are shown; otherwise the Forecasts of Direct type are shown.
 *
 * @class View.Views.GridView
 * @alias SUGAR.App.layout.GridView
 * @extends View.View
 *
 *
 * Events Triggered
 *
 * forecasts:commitButtons:enabled
 *      on: context.forecasts
 *      by: updateTotals()
 *
 * forecasts:commitButtons:disabled
 *      on: context.forecasts
 *      by: commitForecast()
 *
 * forecasts:committed:saved
 *      on: context.forecasts
 *      by: commitForecast()
 *      when: the new forecast model has saved successfully
 */


({
    /**
     * The url for the REST endpoint
     */
    url : 'rest/v10/Forecasts/committed',

    /**
     * The class selector representing the element which contains the view output
     */
    viewSelector : '.forecastsCommitted',

    /**
     * Stores the Backbone collection of Forecast models
     */
    collection : {},

    /**
     * Stores the best case to display in the view
     */
    bestCase : 0,

    /**
     * Stores the likely case to display in the view
     */
    likelyCase : 0,

    /**
     * Stores the likely case to display in the view
     */
    worstCase : 0,


    /**
     * Used to query for the user_id value in Forecasts
     */
    userId : '',

    /**
     * Used to query for the timeperiod_id value in Forecasts
     */
    timePeriodId : '',

    /**
     * Used to query for the forecast_type value in Forecasts
     */
    forecastType : 'Direct',

    /**
     * Stores the historical log of the Forecast entries
     */
    historyLog : [],

    /**
     * Stores the Forecast totals to use when creating a new entry
     */
    totals : null,

    /**
     * Stores the previous totals to display in the view
     */
    previousTotals : null,

    /**
     * Template to use when updating the bestCase on the committed bar
     */
    bestTemplate : _.template('<%= bestCase %>&nbsp;<span class="icon-sm committed_arrow<%= bestCaseCls %>"></span>'),

    /**
     * Template to use when updating the likelyCase on the committed bar
     */
    likelyTemplate : _.template('<%= likelyCase %>&nbsp;<span class="icon-sm committed_arrow<%= likelyCaseCls %>"></span>'),

    /**
     * Template to use when updating the worstCase on the committed bar
     */
    worstTemplate : _.template('<%= worstCase %>&nbsp;<span class="icon-sm committed_arrow<%= worstCaseCls %>"></span>'),

    savedTotal : null,

    runningFetch : false,

    /**
     * the timeperiod field metadata that gets used at render time
     */
    timeperiod: {},

    /**
     * Show The Likely Box
     */
    show_likely: true,

    /**
     * Show The Best Box
     */
    show_best: false,

    /**
     * Show This Wost Box
     */
    show_worst: false,

    initialize : function(options) {
        app.view.View.prototype.initialize.call(this, options);

        this.collection = this.context.forecasts.committed;

        this.forecastType = (app.user.get('isManager') == true && app.user.get('showOpps') == false) ? 'Rollup' : 'Direct';
        this.timePeriodId = app.defaultSelections.timeperiod_id.id;
        this.selectedUser = {id: app.user.get('id'), "isManager":app.user.get('isManager'), "showOpps": false};

        this.bestCase = 0;
        this.likelyCase = 0;

        this.collection.url = this.createUrl();

        this.show_likely = options.context.forecasts.config.get('show_worksheet_likely');
        this.show_best = options.context.forecasts.config.get('show_worksheet_best');
        this.show_worst = options.context.forecasts.config.get('show_worksheet_worst');
    },

    createUrl : function() {
        var urlParams = {
            user_id: this.selectedUser.id,
            timeperiod_id : this.timePeriodId,
            forecast_type : this.forecastType
        };
        return app.api.buildURL('Forecasts', 'committed', '', urlParams);
    },

    updateCommitted: function() {
        this.runningFetch = true;
        this.bestCase = 0;
        this.likelyCase = 0;
        this.worstCase = 0;
        this.likelyCaseCls = '';
        this.bestCaseCls = '';
        this.worstCaseCls = '';
        this.totals = null;
        this.collection.url = this.createUrl();
        this.collection.fetch();
    },

    /**
     * Clean up any left over bound data to our context
     */
    unbindData : function() {
        if(this.context.forecasts) this.context.forecasts.off(null, null, this);
        app.view.View.prototype.unbindData.call(this);
    },

    bindDataChange: function() {

        var self = this;

        this.collection.on("reset", function() {
            this.runningFetch = false;
            if(!_.isEmpty(this.savedTotal)) {
                this.updateTotals(this.savedTotal);
            }
        }, this);

        if(this.context && this.context.forecasts) {
            this.context.forecasts.on("change:selectedUser", function(context, user) {
                self.forecastType = user.showOpps ? 'Direct' : 'Rollup';
                self.selectedUser = user;              
                self.updateCommitted();
            }, this);
            this.context.forecasts.on("change:selectedTimePeriod", function(context, timePeriod) {
                self.timePeriodId = timePeriod.id;
                self.updateCommitted();
            }, this);
            this.context.forecasts.on("change:updatedTotals", function(context, totals) {
                if(self.selectedUser.isManager == true && self.selectedUser.showOpps == false) {
                    return;
                }
                self.updateTotals(totals);
            }, this);
            this.context.forecasts.on("change:updatedManagerTotals", function(context, totals) {
                if(self.selectedUser.isManager == true && self.selectedUser.showOpps == false) {
                    self.updateTotals(totals);
                }
            }, this);
            this.context.forecasts.on("forecasts:committed:commit", function(context, flag) {
                    self.commitForecast();
            }, this);
        }
    },

    /**
     * Common code to update the totals
     *
     * @param totals
     */
    updateTotals : function (totals) {
        var self = this;  
         
        // these fields don't matter when it comes to tracking these values so just 0 them out.
        // we don't care about this field
        if(!_.isUndefined(totals.quota)) {
            totals.quota = 0;
        }

        if(!_.isEqual(self.totals, totals)) {
            var best = {};
            var likely = {};
            var worst = {};
            // get the last committed value
            var previousCommit = null;
            if(!_.isEmpty(this.collection.models))
            {
               previousCommit = _.first(this.collection.models);
            } else {              
               previousCommit = new Backbone.Model({
                    best_case : 0,
                    likely_case : 0,
                    worst_case : 0
               });
            }

            if(this.runningFetch == true) {
               self.savedTotal = totals;
               return;
            } else if (!_.isEmpty(self.savedTotal)) {
                //This line is needed since we need to clean up savedTotals if it has something and you are processing a set of totals.
                //The reason for this is that the method gets called again once the reset is done on the collection if one is ran.
                self.savedTotal = null;
            }

            if(self.selectedUser.isManager == true && self.selectedUser.showOpps === false) {
                // management view
                best.bestCaseCls = this.getColorArrow(totals.best_adjusted, previousCommit.get('best_case'));
                best.bestCase = app.currency.formatAmountLocale(totals.best_adjusted);
                likely.likelyCaseCls = this.getColorArrow(totals.likely_adjusted, previousCommit.get('likely_case'));
                likely.likelyCase = app.currency.formatAmountLocale(totals.likely_adjusted);
                worst.worstCaseCls = this.getColorArrow(totals.worst_adjusted, previousCommit.get('worst_case'));
                worst.worstCase = app.currency.formatAmountLocale(totals.worst_adjusted);
            } else {
                // sales rep view
                best.bestCaseCls = this.getColorArrow(totals.best_case, previousCommit.get('best_case'));
                best.bestCase = app.currency.formatAmountLocale(totals.best_case);
                likely.likelyCaseCls = this.getColorArrow(totals.amount, previousCommit.get('likely_case'));
                likely.likelyCase = app.currency.formatAmountLocale(totals.amount);
                worst.worstCaseCls = this.getColorArrow(totals.worst_case, previousCommit.get('worst_case'));
                worst.worstCase = app.currency.formatAmountLocale(totals.worst_case);
            }
            
            if(!_.isEmpty(best.bestCaseCls) || !_.isEmpty(likely.likelyCaseCls))
            {
            	self.context.forecasts.trigger("forecasts:commitButtons:enabled");
            }

            self.bestCaseCls = best.bestCaseCls;
            self.bestCase = best.bestCase;
            self.likelyCaseCls = likely.likelyCaseCls;
            self.likelyCase = likely.likelyCase;
            self.worstCaseCls = worst.worstCaseCls;
            self.worstCase = worst.worstCase;

            $('h2#best').html(this.bestTemplate(best));
            $('h2#likely').html(this.likelyTemplate(likely));
            $('h2#worst').html(this.worstTemplate(worst));

        }

        self.totals = totals;
    },

    /**
     * Utility method to get the arrow and color depending on how the values match up.
     *
     * @param newValue
     * @param currentValue
     * @return {String}
     */
    getColorArrow: function(newValue, currentValue)
    {
        var cls = '';

        cls = (newValue > currentValue) ? ' icon-arrow-up font-green' : ' icon-arrow-down font-red';
        cls = (newValue == currentValue) ? '' : cls;

        return cls
    },

    /**
     * commit the forecast and by creating a forecast entry if the totals have been updated and the new forecast entry
     * is different from the previous one (best_case and likely_case are not exactly identical)
     *
     */
    commitForecast: function() {
        var self = this;
        var worksheetData = {};
        worksheetData["new"] = {};
        worksheetData["current"] = {};
        
        var currentWorksheet = self.context.forecasts.get("currentWorksheet");
        
        if(currentWorksheet == "worksheet"){
        	var worksheetDataCurrent = [];
        	var worksheetDataNew = [];
        	_.each(self.context.forecasts[currentWorksheet].models, function(item){
    			if(_.isEmpty(item.get("worksheet_id"))){
        			worksheetDataNew.push(item.attributes);
        		}
        		else{
        			worksheetDataCurrent.push(item.attributes);
        		}        		
        	});
        	worksheetData = {"current": worksheetDataCurrent, "new": worksheetDataNew};
        } 
        
        self.context.forecasts.trigger("forecasts:commitButtons:disabled");

        //If the totals have not been set, don't save
        if(!self.totals) {
            return;
        }

        var forecast = new this.collection.model();
        forecast.url = self.url;
        
        var forecastData = {};
       
        if(self.selectedUser.isManager == true && self.selectedUser.showOpps == false) {
            forecastData.best_case = self.totals.best_adjusted;
            forecastData.likely_case = self.totals.likely_adjusted;
            forecastData.worst_case = self.totals.worst_adjusted;
        } else {
            forecastData.best_case = self.totals.best_case;
            forecastData.likely_case = self.totals.amount;
            forecastData.worst_case = self.totals.worst_case;
        }
        
     // we need a commit_type so we know what to do on the back end.
        forecastData.commit_type = (this.context.forecasts.get('currentWorksheet') == "worksheetmanager") ? 'manager' : 'sales_rep';
        forecastData.timeperiod_id = this.timePeriod;
        
        forecastData.currency_id = -99; //Always default to the base currency
        forecastData.base_rate = 1; //Base rate is always 1
        forecastData.timeperiod_id = self.timePeriodId;
        forecastData.forecast_type = self.forecastType;
        forecastData.amount = self.totals.amount;
        forecastData.opp_count = self.totals.included_opp_count;
        forecastData.worksheetData = worksheetData;
        forecastData.closed_amount = this.totals.closed_amount;
        forecastData.closed_count = this.totals.closed_count;
        forecastData.pipeline_amount = self.totals.pipeline_amount;
        forecastData.pipeline_opp_count = self.totals.pipeline_opp_count;
        
        // apply data to model then save
        forecast.set(forecastData);
        forecast.save({}, {success:function(){
        	self.context.forecasts.trigger("forecasts:committed:saved");
        }});

        // clear out the arrows
        self.likelyCaseCls = '';
        self.bestCaseCls = '';
        self.worstCaseCls = '';

        self.previous = self.totals;
        self.collection.url = self.url;
        self.collection.unshift(forecast);
    }
})
