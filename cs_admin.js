/*
  javascript for field validation and input support
*/

function calc_shortname() {
    var name      = document.getElementById("team_name").value;
    var shortname = document.getElementById("team_shortname").value;

    if (shortname == "")
	document.getElementById("team_shortname").value = name.substring(0,5);
}

/*
  javascript function for ex/import dialog
*/
function submit_this(mode){

  if (mode == "export") {
    var exmode    = document.getElementById("exmode").value;
    var dlmode    = document.getElementById("dlmode").checked;
    var fnmode    = document.getElementById("fnmode").checked;
    
    if (dlmode == true) {
      var murl = ajaxurl+"?action=wpc_export&dlmode="+dlmode+"&exmode="+exmode+"&fnmode="+fnmode;
      document.location=murl;
    } else { 
      jQuery.post(ajaxurl+"?action=wpc_export", {dlmode: dlmode, exmode: exmode,fnmode: fnmode}, function(data){jQuery("#message").html(data);});
    }
  }
    
    if (mode == "import") {
      var immode    = document.getElementById("immode").value;
      var csvfile   = document.getElementById("csvfile").value;
      var csvdelall = document.getElementById("csvdelall").checked;
      var csvdelall = document.getElementById("csvdelall").checked; 
      var fnmode    = document.getElementById("fnmode").checked;
      jQuery.post(ajaxurl+"?action=wpc_import", {csvfile: csvfile, csv_delall: csvdelall, immode: immode, fnmode: fnmode}, function(data){jQuery("#message").html(data);});
    }
    
  return false;
}