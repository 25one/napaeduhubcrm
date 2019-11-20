$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


var BaseRecord=(function() {

return {

swalTitle: '',
confirmButtonText: '',
cancelButtonText: '',
errorAjax: '',

destroy: function(that, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax) {
   //alert(swalTitle);
   this.swalTitle = swalTitle;
   this.confirmButtonText = confirmButtonText;
   this.cancelButtonText = cancelButtonText;
   this.errorAjax = errorAjax;    
    swal({
        title: swalTitle,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText
    })
    .then(function () {
        BaseRecord.ajax($(that).attr('href'), url, errorAjax)
    });
},  

ajax: function(verb, url, errorAjax) {
   this.spin();
   var ajaxSetting = {
      method: 'DELETE',
      url: verb,
      success: function(data) {
         //alert(data);
         BaseRecord.unSpin();
         //BaseRecord.listDashboard(0, url, errorAjax); //new view of dashboard-page
         BaseRecord.listDashboard(url, errorAjax); //new view of dashboard-page
      },
      error: function(data) {
         //alert(data.responseText);
         BaseRecord.unSpin();
         swal({
            title: errorAjax,
            type: 'warning'
         })
      },
   };
   $.ajax(ajaxSetting);
},

querystring: '',
statuse: 0,
course: 0,
searching: '',

//listDashboard: function(type, value, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax){
listDashboard: function(url, swalTitle, confirmButtonText, cancelButtonText, errorAjax){	
   this.swalTitle = swalTitle;
   this.confirmButtonText = confirmButtonText;
   this.cancelButtonText = cancelButtonText;
   this.errorAjax = errorAjax;   
   //if(this.querystring) this.querystring += '&' + type + '=' + value;
   //else this.querystring = type + '=' + value;
   this.querystring = 'statuse=' + this.statuse + '&course=' + this.course + '&searching=' + this.searching;
   //alert(this.querystring);
   var ajaxSetting={
      method: 'get',
      url: url,
      //data: {
      //   type: value,
      //},
      //data: type + '=' + value,
      data: this.querystring,
      success: function(data){
         //alert(data.table);
         $("#pannel").html(data.table);
         $("#pagination").html(data.pagination);
         $('.listbuttonremove').click(function () {
            BaseRecord.destroy($(this), url, BaseRecord.swalTitle, BaseRecord.confirmButtonText, BaseRecord.cancelButtonText, BaseRecord.errorAjax);
            return false;
         });                  
      },
      error: function(data){
         //alert(data.responseText);
         swal({
            title: errorAjax,
            type: 'warning'
         })         
      },
   };
   $.ajax(ajaxSetting);
},

spin:function() {
   $('#spinner').html('<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>');
},

unSpin:function() {
   $('#spinner').empty();
},

}

})();