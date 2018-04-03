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
({url:'rest/v10/Forecasts/committed',viewSelector:'.forecastsCommitted',collection:{},fullName:'',bestCase:0,likelyCase:0,worstCase:0,userId:'',timePeriodId:'',forecastType:'Direct',historyLog:[],totals:null,bestTemplate:_.template('<%= bestCase %>&nbsp;<span class="icon-sm committed_arrow<%= bestCaseCls %>"></span>'),likelyTemplate:_.template('<%= likelyCase %>&nbsp;<span class="icon-sm committed_arrow<%= likelyCaseCls %>"></span>'),worstTemplate:_.template('<%= worstCase %>&nbsp;<span class="icon-sm committed_arrow<%= worstCaseCls %>"></span>'),runningFetch:false,showHistoryLog:false,showMoreLog:false,timeperiod:{},previousBestCase:'',previousLikelyCase:'',previousWorstCase:'',events:{'click i[id=show_hide_history_log]':'showHideHistoryLog'},initialize:function(options){app.view.View.prototype.initialize.call(this,options);this.collection=this.context.forecasts.committed;this.fullName=app.user.get('full_name');this.userId=app.user.get('id');this.forecastType=(app.user.get('isManager')==true&&app.user.get('showOpps')==false)?'Rollup':'Direct';this.timePeriodId=app.defaultSelections.timeperiod_id.id;this.selectedUser={id:app.user.get('id'),"isManager":app.user.get('isManager'),"showOpps":false};this.bestCase="";this.likelyCase="";this.worstCase="";this.showHistoryLog=false;},showHideHistoryLog:function(){this.$el.find('i[id=show_hide_history_log]').toggleClass('icon-caret-down icon-caret-up');this.$el.find('div[id=history_log_results]').toggleClass('hide');},_renderHtml:function(ctx,options){app.view.View.prototype._renderHtml.call(this,ctx,options);if(this.showHistoryLog){if(this.showMoreLog){this.$el.find('div[id=more_log_results]').removeClass('hide');this.$el.find('div[id=more]').html('<p><span class=" icon-minus-sign">&nbsp;'+App.lang.get('LBL_LESS','Forecasts')+'</span></p><br />');}}
this.$el.parents('div.topline').find("span.lastBestCommit").html(this.previousBestCase);this.$el.parents('div.topline').find("span.lastLikelyCommit").html(this.previousLikelyCase);this.$el.parents('div.topline').find("span.lastWorstCommit").html(this.previousWorstCase);},bindDataChange:function(){var self=this;this.collection=this.context.forecasts.committed;this.collection.on("reset change",function(){self.buildForecastsCommitted();},this);},getColorArrow:function(newValue,currentValue)
{var cls='';cls=(newValue>currentValue)?' icon-arrow-up font-green':' icon-arrow-down font-red';cls=(newValue==currentValue)?'':cls;return cls},resetCommittedLog:function(){this.bestCase="";this.likelyCase="";this.worstCase="";this.previousBestCase="";this.previousLikelyCase="";this.previousWorstCase="";this.showHistoryLog=false;this.previousDateEntered="";},buildForecastsCommitted:function(){var self=this;var count=0;var previousModel;self.historyLog=[];if(_.isEmpty(self.collection.models)){self.resetCommittedLog();self.render();return;}
previousModel=_.first(self.collection.models);var dateEntered=new Date(Date.parse(previousModel.get('date_entered')));if(dateEntered=='Invalid Date'){dateEntered=previousModel.get('date_entered');}
self.previousDateEntered=app.date.format(dateEntered,app.user.getPreference('datepref')+' '+app.user.getPreference('timepref'));var loopPreviousModel='';var models=_.clone(self.collection.models).reverse();_.each(models,function(model){self.historyLog.push(app.forecasts.utils.createHistoryLog(loopPreviousModel,model,self.context.forecasts.config));loopPreviousModel=model;});self.historyLog.reverse();this.previousBestCase=app.currency.formatAmountLocale(previousModel.get('best_case'));this.previousLikelyCase=app.currency.formatAmountLocale(previousModel.get('likely_case'));this.previousWorstCase=app.currency.formatAmountLocale(previousModel.get('worst_case'));self.render();}})