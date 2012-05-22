$(document).ready(function(){

    var allprice = 0;
    var selcarprice = 0;
    var aitems = new Array();
    var iitems = new Array();
    var datetimefrom;
    var datetimeto;
    var carid = 1;
    var numofdays = 0;

    /***********************************************************
    * MCal1 Calendar with event
    ***********************************************************/

    var dFrom = new Date();

    mCal1 = new dhtmlxCalendarObject('startdate', false);            

    mCal1.setDateFormat("%d.%m.%Y"); 
    mCal1.setSensitive(dFrom,null); 
    mCal1.draw();
    
    mCal1.attachEvent("onClick",setInt1);       

    /***********************************************************
    * Show hide Clanedars
    ***********************************************************/ 
    function hide_show1(){ 
        mCal1.show(); 
    }          
    
    /***********************************************************
    * Set Calendar1 -> tomorow
    ***********************************************************/ 
    function initDates(){
        //date1
        var myDate=new Date();
        myDate.setDate(myDate.getDate());
        mCal1.setDate(myDate);
        document.getElementById("startdate").value = mCal1.getFormatedDate("%d.%m.%Y", myDate);
        
    }
    
    /***********************************************************
    * set Calendar2 date depending on selected date Calendar1
    ***********************************************************/ 
    function setInt1(date){
  
    }
    
    //initDates();  
    
                                                                        
});

