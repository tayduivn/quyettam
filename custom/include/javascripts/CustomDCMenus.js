
var makeCall=false;SUGAR.util.doWhen(function(){return $('#dcmenu').find('#dcmenuUserIcon')[0]!=null;},function(){initCustomMenu();setTimeout(function(){displayMoreMenu();},2000);});$(window).resize(function(){displayMoreMenu();});function displayMoreMenu(){var moreMenu=$('#dcmenu').find('.sf-menu:visible').find('.moduleTabMore');var moreMenuHolder=moreMenu.closest('.moduleTabExtraMenu.more');if(moreMenu.find('li').length==0){moreMenuHolder.hide();}else{moreMenuHolder.show();}}
function initCustomMenu(){setTimeout(function(){var currentGroupName=sugar_theme_gm_current.replace(' ','_');var currentGroup=$('.dcmenu').find('.sf-menu[id="themeTabGroupMenu_'+currentGroupName+'"]');var currentGroupMenu=currentGroup.find('.home').find('.MMShortcuts').find('a[href*="'+currentGroupName+'"]').closest('li');currentGroupMenu.addClass('current');},1000);var filterMenu=$('#dcmenu').find('.filterBy');var homeMenu=$('#dcmenu').find('.home');var homeMenuActions=homeMenu.find('.MMShortcuts');homeMenuActions.find('.groupLabel').next('li').remove();homeMenuActions.append(filterMenu.find('.filter-menu').html());homeMenu.find('.megacolumn').not(homeMenuActions.closest('.megacolumn')).remove();homeMenu.find('.groupLabel').text($(filterMenu.find('a.group')[0]).text());filterMenu.hide();$('#dcmenu').find('.sf-menu').each(function(){var moreMenu=$(this).find('.moduleTabMore');var triggerShowMore=moreMenu.find('.moduleMenuOverFlowMore').find('a');if(triggerShowMore[0]!=null){var groupName=$(this).attr('id').replace('themeTabGroupMenu_','');var href='javascript:SUGAR.themes.toggleMenuOverFlow(\'moduleTabMore'+groupName+'\', \'more\')';triggerShowMore.attr('href',href);triggerShowMore.closest('.moduleMenuOverFlowMore').attr('id','moduleMenuOverFlowMore'+groupName);}
    var triggerShowLess=moreMenu.find('.moduleMenuOverFlowLess').find('a');if(triggerShowLess[0]!=null){var groupName=$(this).attr('id').replace('themeTabGroupMenu_','');var href='javascript:SUGAR.themes.toggleMenuOverFlow(\'moduleTabMore'+groupName+'\', \'less\')';triggerShowLess.attr('href',href);triggerShowLess.closest('.moduleMenuOverFlowLess').attr('id','moduleMenuOverFlowLess'+groupName);}
    if($(this).children('li').length==1){var groupIndex=$('#dcmenu').find('.sf-menu').index($(this));$('#dcmenu').find('.home').find('.MMShortcuts').find('li:nth('+groupIndex+')').hide();}});var groupMenus=homeMenuActions.find('li');groupMenus.click(function(){var index=$(this).closest('.MMShortcuts').find('li').index($(this));$('#dcmenu').find('.home').find('.MMShortcuts').find('.current').removeClass('current');$('#dcmenu').find('.home').find('.MMShortcuts').find('li:nth('+index+')').addClass('current');setTimeout(function(){displayMoreMenu();},500);});}