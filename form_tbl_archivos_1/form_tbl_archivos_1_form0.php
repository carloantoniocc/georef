<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(""); } else { echo strip_tags(""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbl_archivos_1/form_tbl_archivos_1_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbl_archivos_1_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_tbl_archivos_1_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tpi_codigo');

<?php
}
?>
  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_tbl_archivos_1_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbl_archivos_1'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbl_archivos_1'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><td class="scFormErrorMessage"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorMessageFont" style="padding: 0px; vertical-align: top; width: 100%"><span id="id_error_display_table_text"></span></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['ver_mapa'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "ver_mapa", "sc_btn_ver_mapa()", "sc_btn_ver_mapa()", "sc_ver_mapa_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['ver_imagen'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "ver_imagen", "sc_btn_ver_imagen()", "sc_btn_ver_imagen()", "sc_ver_imagen_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['descarga'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "descarga", "sc_btn_descarga()", "sc_btn_descarga()", "sc_descarga_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['contacto'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "contacto", "sc_btn_contacto()", "sc_btn_contacto()", "sc_contacto_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['info'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "info", "sc_btn_info()", "sc_btn_info()", "sc_info_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="70%" height="100%">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['arc_codigo']))
   {
       $this->nmgp_cmp_hidden['arc_codigo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['codigo']))
   {
       $this->nmgp_cmp_hidden['codigo'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="arc_archivo_ul_name" id="id_sc_field_arc_archivo_ul_name" value="<?php echo $this->form_encode_input($this->arc_archivo_ul_name);?>">
<input type="hidden" name="arc_archivo_ul_type" id="id_sc_field_arc_archivo_ul_type" value="<?php echo $this->form_encode_input($this->arc_archivo_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['arc_archivo']))
           {
               $this->nmgp_cmp_readonly['arc_archivo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['mapa']))
    {
        $this->nm_new_label['mapa'] = "mapa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mapa = $this->mapa;
   $sStyleHidden_mapa = '';
   if (isset($this->nmgp_cmp_hidden['mapa']) && $this->nmgp_cmp_hidden['mapa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mapa']);
       $sStyleHidden_mapa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mapa = 'display: none;';
   $sStyleReadInp_mapa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mapa']) && $this->nmgp_cmp_readonly['mapa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mapa']);
       $sStyleReadLab_mapa = '';
       $sStyleReadInp_mapa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mapa']) && $this->nmgp_cmp_hidden['mapa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mapa" value="<?php echo $this->form_encode_input($mapa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mapa_line" id="hidden_field_data_mapa" style="<?php echo $sStyleHidden_mapa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mapa_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_mapa css_mapa_line" style="<?php echo $sStyleReadLab_mapa; ?>"><?php echo $this->form_encode_input($this->mapa); ?></span><span id="id_read_off_mapa" style="<?php echo $sStyleReadInp_mapa; ?>"><span id="id_ajax_label_mapa"><?php echo $mapa?></span>
</span><input type="hidden" name="mapa" value="<?php echo $this->form_encode_input($mapa); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mapa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mapa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['arc_archivo']))
    {
        $this->nm_new_label['arc_archivo'] = "Arc Archivo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $arc_archivo = $this->arc_archivo;
   $sStyleHidden_arc_archivo = '';
   if (isset($this->nmgp_cmp_hidden['arc_archivo']) && $this->nmgp_cmp_hidden['arc_archivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['arc_archivo']);
       $sStyleHidden_arc_archivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_arc_archivo = 'display: none;';
   $sStyleReadInp_arc_archivo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["arc_archivo"]) &&  $this->nmgp_cmp_readonly["arc_archivo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['arc_archivo']);
       $sStyleReadLab_arc_archivo = '';
       $sStyleReadInp_arc_archivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['arc_archivo']) && $this->nmgp_cmp_hidden['arc_archivo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="arc_archivo" value="<?php echo $this->form_encode_input($arc_archivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_arc_archivo_line" id="hidden_field_data_arc_archivo" style="<?php echo $sStyleHidden_arc_archivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_arc_archivo_line" style="vertical-align: top;padding: 0px">
 <script>var var_ajax_img_arc_archivo = '<?php echo $out1_arc_archivo; ?>';</script><input type="hidden" name="temp_out_arc_archivo" value="<?php echo $this->form_encode_input($out_arc_archivo); ?>" /><input type="hidden" name="temp_out1_arc_archivo" value="<?php echo $this->form_encode_input($out1_arc_archivo); ?>" /><?php if (!empty($out_arc_archivo)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_arc_archivo, '" . $this->nmgp_return_img['arc_archivo'][0] . "', '" . $this->nmgp_return_img['arc_archivo'][1] . "')\"><img id=\"id_ajax_img_arc_archivo\" border=\"0\" src=\"$out_arc_archivo\"></a>"; } else {  echo "<img id=\"id_ajax_img_arc_archivo\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["arc_archivo"]) &&  $this->nmgp_cmp_readonly["arc_archivo"] == "on")) { 

 ?>
<img id=\"arc_archivo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="arc_archivo" value="<?php echo $this->form_encode_input($arc_archivo) . "\"><span id=\"id_ajax_label_arc_archivo\">" . $arc_archivo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_off_arc_archivo" style="white-space: nowrap;<?php echo $sStyleReadInp_arc_archivo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-arc_archivo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_arc_archivo_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="arc_archivo[]" id="id_sc_field_arc_archivo" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_arc_archivo"<?php if ($this->nmgp_opcao == "novo" || empty($arc_archivo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="arc_archivo_limpa" value="<?php echo $arc_archivo_limpa . '" '; if ($arc_archivo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="arc_archivo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_arc_archivo" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_arc_archivo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_arc_archivo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_arc_archivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_arc_archivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['simbologia']))
    {
        $this->nm_new_label['simbologia'] = "simbologia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $simbologia = $this->simbologia;
   $sStyleHidden_simbologia = '';
   if (isset($this->nmgp_cmp_hidden['simbologia']) && $this->nmgp_cmp_hidden['simbologia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['simbologia']);
       $sStyleHidden_simbologia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_simbologia = 'display: none;';
   $sStyleReadInp_simbologia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['simbologia']) && $this->nmgp_cmp_readonly['simbologia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['simbologia']);
       $sStyleReadLab_simbologia = '';
       $sStyleReadInp_simbologia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['simbologia']) && $this->nmgp_cmp_hidden['simbologia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="simbologia" value="<?php echo $this->form_encode_input($simbologia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_simbologia_line" id="hidden_field_data_simbologia" style="<?php echo $sStyleHidden_simbologia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_simbologia_line" style="vertical-align: top;padding: 0px"><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__Prototipo iconos2.png"))
          { 
              $simbologia = "&nbsp;" ;  
          } 
          else 
          { 
              $simbologia = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__img__NM__Prototipo iconos2.png\"/>" ; 
          } 
?>
<span id="id_imghtml_simbologia"><?php echo $simbologia; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["simbologia"]) &&  $this->nmgp_cmp_readonly["simbologia"] == "on") { 

 ?>
<input type="hidden" name="simbologia" value="<?php echo $this->form_encode_input($simbologia) . "\">" . $simbologia . ""; ?>
<?php } else { ?>
<span id="id_read_on_simbologia" class="sc-ui-readonly-simbologia css_simbologia_line" style="<?php echo $sStyleReadLab_simbologia; ?>"><?php echo $this->form_encode_input($this->simbologia); ?></span><span id="id_read_off_simbologia" style="white-space: nowrap;<?php echo $sStyleReadInp_simbologia; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_simbologia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_simbologia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['arc_comentario']))
    {
        $this->nm_new_label['arc_comentario'] = "Arc Comentario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $arc_comentario = $this->arc_comentario;
   $sStyleHidden_arc_comentario = '';
   if (isset($this->nmgp_cmp_hidden['arc_comentario']) && $this->nmgp_cmp_hidden['arc_comentario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['arc_comentario']);
       $sStyleHidden_arc_comentario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_arc_comentario = 'display: none;';
   $sStyleReadInp_arc_comentario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['arc_comentario']) && $this->nmgp_cmp_readonly['arc_comentario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['arc_comentario']);
       $sStyleReadLab_arc_comentario = '';
       $sStyleReadInp_arc_comentario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['arc_comentario']) && $this->nmgp_cmp_hidden['arc_comentario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="arc_comentario" value="<?php echo $this->form_encode_input($arc_comentario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_arc_comentario_line" id="hidden_field_data_arc_comentario" style="<?php echo $sStyleHidden_arc_comentario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_arc_comentario_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="arc_comentario" value="<?php echo $this->form_encode_input($arc_comentario); ?>"><span id="id_ajax_label_arc_comentario"><?php echo nl2br($arc_comentario); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_arc_comentario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_arc_comentario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="30%" height="100%">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%; border-spacing: 30px;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tpi_codigo']))
   {
       $this->nm_new_label['tpi_codigo'] = "Formato de Visualización";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tpi_codigo = $this->tpi_codigo;
   $sStyleHidden_tpi_codigo = '';
   if (isset($this->nmgp_cmp_hidden['tpi_codigo']) && $this->nmgp_cmp_hidden['tpi_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tpi_codigo']);
       $sStyleHidden_tpi_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tpi_codigo = 'display: none;';
   $sStyleReadInp_tpi_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tpi_codigo']) && $this->nmgp_cmp_readonly['tpi_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tpi_codigo']);
       $sStyleReadLab_tpi_codigo = '';
       $sStyleReadInp_tpi_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tpi_codigo']) && $this->nmgp_cmp_hidden['tpi_codigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tpi_codigo" value="<?php echo $this->form_encode_input($this->tpi_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tpi_codigo_line" id="hidden_field_data_tpi_codigo" style="<?php echo $sStyleHidden_tpi_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tpi_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tpi_codigo_label"><span id="id_label_tpi_codigo"><?php echo $this->nm_new_label['tpi_codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tpi_codigo"]) &&  $this->nmgp_cmp_readonly["tpi_codigo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT tpi_codigo, tpi_descripcion 
FROM tbl_tipo_informacion 
ORDER BY tpi_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $tpi_codigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tpi_codigo_1))
          {
              foreach ($this->tpi_codigo_1 as $tmp_tpi_codigo)
              {
                  if (trim($tmp_tpi_codigo) === trim($cadaselect[1])) { $tpi_codigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tpi_codigo) === trim($cadaselect[1])) { $tpi_codigo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tpi_codigo" value="<?php echo $this->form_encode_input($tpi_codigo) . "\">" . $tpi_codigo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT tpi_codigo, tpi_descripcion 
FROM tbl_tipo_informacion 
ORDER BY tpi_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_tpi_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $tpi_codigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tpi_codigo_1))
          {
              foreach ($this->tpi_codigo_1 as $tmp_tpi_codigo)
              {
                  if (trim($tmp_tpi_codigo) === trim($cadaselect[1])) { $tpi_codigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tpi_codigo) === trim($cadaselect[1])) { $tpi_codigo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tpi_codigo_look))
          {
              $tpi_codigo_look = $this->tpi_codigo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tpi_codigo\" class=\"css_tpi_codigo_line\" style=\"" .  $sStyleReadLab_tpi_codigo . "\">" . $this->form_encode_input($tpi_codigo_look) . "</span><span id=\"id_read_off_tpi_codigo\" style=\"" . $sStyleReadInp_tpi_codigo . "\">";
   echo " <span id=\"idAjaxSelect_tpi_codigo\"><select class=\"sc-js-input scFormObjectOdd css_tpi_codigo_obj\" style=\"\" id=\"id_sc_field_tpi_codigo\" name=\"tpi_codigo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tpi_codigo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tpi_codigo)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tpi_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tpi_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['cla_codigo']))
   {
       $this->nm_new_label['cla_codigo'] = "Tipo de Información";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cla_codigo = $this->cla_codigo;
   $sStyleHidden_cla_codigo = '';
   if (isset($this->nmgp_cmp_hidden['cla_codigo']) && $this->nmgp_cmp_hidden['cla_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cla_codigo']);
       $sStyleHidden_cla_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cla_codigo = 'display: none;';
   $sStyleReadInp_cla_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cla_codigo']) && $this->nmgp_cmp_readonly['cla_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cla_codigo']);
       $sStyleReadLab_cla_codigo = '';
       $sStyleReadInp_cla_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cla_codigo']) && $this->nmgp_cmp_hidden['cla_codigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cla_codigo" value="<?php echo $this->form_encode_input($this->cla_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cla_codigo_line" id="hidden_field_data_cla_codigo" style="<?php echo $sStyleHidden_cla_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cla_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cla_codigo_label"><span id="id_label_cla_codigo"><?php echo $this->nm_new_label['cla_codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cla_codigo"]) &&  $this->nmgp_cmp_readonly["cla_codigo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array(); 
}
if ($this->tpi_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT cla_codigo, cla_descripcion, tpi_codigo
FROM tbl_clasificacion 
where tpi_codigo = '$this->tpi_codigo'
ORDER BY cla_codigo ASC";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[2] = str_replace(',', '.', $rs->fields[2]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[2] = (strpos(strtolower($rs->fields[2]), "e")) ? (float)$rs->fields[2] : $rs->fields[2];
              $rs->fields[2] = (string)$rs->fields[2];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0; 
   $cla_codigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cla_codigo_1))
          {
              foreach ($this->cla_codigo_1 as $tmp_cla_codigo)
              {
                  if (trim($tmp_cla_codigo) === trim($cadaselect[1])) { $cla_codigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cla_codigo) === trim($cadaselect[1])) { $cla_codigo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="cla_codigo" value="<?php echo $this->form_encode_input($cla_codigo) . "\">" . $cla_codigo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array(); 
}
if ($this->tpi_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT cla_codigo, cla_descripcion, tpi_codigo
FROM tbl_clasificacion 
where tpi_codigo = '$this->tpi_codigo'
ORDER BY cla_codigo ASC";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[2] = str_replace(',', '.', $rs->fields[2]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[2] = (strpos(strtolower($rs->fields[2]), "e")) ? (float)$rs->fields[2] : $rs->fields[2];
              $rs->fields[2] = (string)$rs->fields[2];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_cla_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $cla_codigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cla_codigo_1))
          {
              foreach ($this->cla_codigo_1 as $tmp_cla_codigo)
              {
                  if (trim($tmp_cla_codigo) === trim($cadaselect[1])) { $cla_codigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cla_codigo) === trim($cadaselect[1])) { $cla_codigo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($cla_codigo_look))
          {
              $cla_codigo_look = $this->cla_codigo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_cla_codigo\" class=\"css_cla_codigo_line\" style=\"" .  $sStyleReadLab_cla_codigo . "\">" . $this->form_encode_input($cla_codigo_look) . "</span><span id=\"id_read_off_cla_codigo\" style=\"" . $sStyleReadInp_cla_codigo . "\">";
   echo " <span id=\"idAjaxSelect_cla_codigo\"><select class=\"sc-js-input scFormObjectOdd css_cla_codigo_obj\" style=\"\" id=\"id_sc_field_cla_codigo\" name=\"cla_codigo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->cla_codigo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->cla_codigo)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cla_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cla_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['arc_codigo']))
           {
               $this->nmgp_cmp_readonly['arc_codigo'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['arc_glosa']))
   {
       $this->nm_new_label['arc_glosa'] = "Contenido";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $arc_glosa = $this->arc_glosa;
   $sStyleHidden_arc_glosa = '';
   if (isset($this->nmgp_cmp_hidden['arc_glosa']) && $this->nmgp_cmp_hidden['arc_glosa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['arc_glosa']);
       $sStyleHidden_arc_glosa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_arc_glosa = 'display: none;';
   $sStyleReadInp_arc_glosa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['arc_glosa']) && $this->nmgp_cmp_readonly['arc_glosa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['arc_glosa']);
       $sStyleReadLab_arc_glosa = '';
       $sStyleReadInp_arc_glosa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['arc_glosa']) && $this->nmgp_cmp_hidden['arc_glosa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="arc_glosa" value="<?php echo $this->form_encode_input($this->arc_glosa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_arc_glosa_line" id="hidden_field_data_arc_glosa" style="<?php echo $sStyleHidden_arc_glosa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_arc_glosa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_arc_glosa_label"><span id="id_label_arc_glosa"><?php echo $this->nm_new_label['arc_glosa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["arc_glosa"]) &&  $this->nmgp_cmp_readonly["arc_glosa"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array(); 
}
if ($this->tpi_codigo != "" && $this->cla_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $this->nm_clear_val("cla_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT arc_codigo, arc_glosa 
FROM tbl_archivos 
where tbl_archivos.tpi_codigo = '$this->tpi_codigo'
and tbl_archivos.cla_codigo = '$this->cla_codigo'
ORDER BY arc_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0; 
   $arc_glosa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->arc_glosa_1))
          {
              foreach ($this->arc_glosa_1 as $tmp_arc_glosa)
              {
                  if (trim($tmp_arc_glosa) === trim($cadaselect[1])) { $arc_glosa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->arc_glosa) === trim($cadaselect[1])) { $arc_glosa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="arc_glosa" value="<?php echo $this->form_encode_input($arc_glosa) . "\">" . $arc_glosa_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array(); 
}
if ($this->tpi_codigo != "" && $this->cla_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $this->nm_clear_val("cla_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'] = array(); 
    }

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT arc_codigo, arc_glosa 
FROM tbl_archivos 
where tbl_archivos.tpi_codigo = '$this->tpi_codigo'
and tbl_archivos.cla_codigo = '$this->cla_codigo'
ORDER BY arc_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['Lookup_arc_glosa'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $arc_glosa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->arc_glosa_1))
          {
              foreach ($this->arc_glosa_1 as $tmp_arc_glosa)
              {
                  if (trim($tmp_arc_glosa) === trim($cadaselect[1])) { $arc_glosa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->arc_glosa) === trim($cadaselect[1])) { $arc_glosa_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($arc_glosa_look))
          {
              $arc_glosa_look = $this->arc_glosa;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_arc_glosa\" class=\"css_arc_glosa_line\" style=\"" .  $sStyleReadLab_arc_glosa . "\">" . $this->form_encode_input($arc_glosa_look) . "</span><span id=\"id_read_off_arc_glosa\" style=\"" . $sStyleReadInp_arc_glosa . "\">";
   echo " <span id=\"idAjaxSelect_arc_glosa\"><select class=\"sc-js-input scFormObjectOdd css_arc_glosa_obj\" style=\"\" id=\"id_sc_field_arc_glosa\" name=\"arc_glosa\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->arc_glosa) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->arc_glosa)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_arc_glosa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_arc_glosa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['arc_codigo']))
    {
        $this->nm_new_label['arc_codigo'] = "Arc Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $arc_codigo = $this->arc_codigo;
   if (!isset($this->nmgp_cmp_hidden['arc_codigo']))
   {
       $this->nmgp_cmp_hidden['arc_codigo'] = 'off';
   }
   $sStyleHidden_arc_codigo = '';
   if (isset($this->nmgp_cmp_hidden['arc_codigo']) && $this->nmgp_cmp_hidden['arc_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['arc_codigo']);
       $sStyleHidden_arc_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_arc_codigo = 'display: none;';
   $sStyleReadInp_arc_codigo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["arc_codigo"]) &&  $this->nmgp_cmp_readonly["arc_codigo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['arc_codigo']);
       $sStyleReadLab_arc_codigo = '';
       $sStyleReadInp_arc_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['arc_codigo']) && $this->nmgp_cmp_hidden['arc_codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="arc_codigo" value="<?php echo $this->form_encode_input($arc_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_arc_codigo_line" id="hidden_field_data_arc_codigo" style="<?php echo $sStyleHidden_arc_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_arc_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_arc_codigo_label"><span id="id_label_arc_codigo"><?php echo $this->nm_new_label['arc_codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["arc_codigo"]) &&  $this->nmgp_cmp_readonly["arc_codigo"] == "on")) { 

 ?>
<input type="hidden" name="arc_codigo" value="<?php echo $this->form_encode_input($arc_codigo) . "\"><span id=\"id_ajax_label_arc_codigo\">" . $arc_codigo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_arc_codigo" class="sc-ui-readonly-arc_codigo css_arc_codigo_line" style="<?php echo $sStyleReadLab_arc_codigo; ?>"><?php echo $this->form_encode_input($this->arc_codigo); ?></span><span id="id_read_off_arc_codigo" style="white-space: nowrap;<?php echo $sStyleReadInp_arc_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_arc_codigo_obj" style="" id="id_sc_field_arc_codigo" type=text name="arc_codigo" value="<?php echo $this->form_encode_input($arc_codigo) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['arc_codigo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_arc_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_arc_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
   if (!isset($this->nmgp_cmp_hidden['codigo']))
   {
       $this->nmgp_cmp_hidden['codigo'] = 'off';
   }
   $sStyleHidden_codigo = '';
   if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo']);
       $sStyleHidden_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo = 'display: none;';
   $sStyleReadInp_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo']) && $this->nmgp_cmp_readonly['codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo']);
       $sStyleReadLab_codigo = '';
       $sStyleReadInp_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_label"><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on") { 

 ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">" . $codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo" class="sc-ui-readonly-codigo css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->form_encode_input($this->codigo); ?></span><span id="id_read_off_codigo" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_obj" style="" id="id_sc_field_codigo" type=text name="codigo" value="<?php echo $this->form_encode_input($codigo) ?>"
 size=60 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['espacio']))
    {
        $this->nm_new_label['espacio'] = "espacio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $espacio = $this->espacio;
   $sStyleHidden_espacio = '';
   if (isset($this->nmgp_cmp_hidden['espacio']) && $this->nmgp_cmp_hidden['espacio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['espacio']);
       $sStyleHidden_espacio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_espacio = 'display: none;';
   $sStyleReadInp_espacio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['espacio']) && $this->nmgp_cmp_readonly['espacio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['espacio']);
       $sStyleReadLab_espacio = '';
       $sStyleReadInp_espacio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['espacio']) && $this->nmgp_cmp_hidden['espacio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="espacio" value="<?php echo $this->form_encode_input($espacio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_espacio_line" id="hidden_field_data_espacio" style="<?php echo $sStyleHidden_espacio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_espacio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_espacio_label"><span id="id_label_espacio"><?php echo $this->nm_new_label['espacio']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__barra_300.png"))
          { 
              $espacio = "&nbsp;" ;  
          } 
          else 
          { 
              $espacio = "<img border=\"7px\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__img__NM__barra_300.png\"/>" ; 
          } 
?>
<span id="id_imghtml_espacio"><?php echo $espacio; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["espacio"]) &&  $this->nmgp_cmp_readonly["espacio"] == "on") { 

 ?>
<input type="hidden" name="espacio" value="<?php echo $this->form_encode_input($espacio) . "\">" . $espacio . ""; ?>
<?php } else { ?>
<span id="id_read_on_espacio" class="sc-ui-readonly-espacio css_espacio_line" style="<?php echo $sStyleReadLab_espacio; ?>"><?php echo $this->form_encode_input($this->espacio); ?></span><span id="id_read_off_espacio" style="white-space: nowrap;<?php echo $sStyleReadInp_espacio; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_espacio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_espacio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acceso']))
    {
        $this->nm_new_label['acceso'] = "ACCESO PORTAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acceso = $this->acceso;
   $sStyleHidden_acceso = '';
   if (isset($this->nmgp_cmp_hidden['acceso']) && $this->nmgp_cmp_hidden['acceso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acceso']);
       $sStyleHidden_acceso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acceso = 'display: none;';
   $sStyleReadInp_acceso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acceso']) && $this->nmgp_cmp_readonly['acceso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acceso']);
       $sStyleReadLab_acceso = '';
       $sStyleReadInp_acceso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acceso']) && $this->nmgp_cmp_hidden['acceso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acceso" value="<?php echo $this->form_encode_input($acceso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acceso_line" id="hidden_field_data_acceso" style="<?php echo $sStyleHidden_acceso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acceso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acceso_label"><span id="id_label_acceso"><?php echo $this->nm_new_label['acceso']; ?></span></span><br><span id="id_ajax_label_acceso"><?php echo $acceso?></span>
<input type="hidden" name="acceso" value="<?php echo $this->form_encode_input($acceso); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acceso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario']))
    {
        $this->nm_new_label['usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario = $this->usuario;
   $sStyleHidden_usuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario']);
       $sStyleHidden_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario = 'display: none;';
   $sStyleReadInp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario']) && $this->nmgp_cmp_readonly['usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario']);
       $sStyleReadLab_usuario = '';
       $sStyleReadInp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_usuario_line" id="hidden_field_data_usuario" style="<?php echo $sStyleHidden_usuario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_usuario_label"><span id="id_label_usuario"><?php echo $this->nm_new_label['usuario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario"]) &&  $this->nmgp_cmp_readonly["usuario"] == "on") { 

 ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">" . $usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario" class="sc-ui-readonly-usuario css_usuario_line" style="<?php echo $sStyleReadLab_usuario; ?>"><?php echo $this->form_encode_input($this->usuario); ?></span><span id="id_read_off_usuario" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_obj" style="" id="id_sc_field_usuario" type=text name="usuario" value="<?php echo $this->form_encode_input($usuario) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pasword']))
    {
        $this->nm_new_label['pasword'] = "contraseña";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pasword = $this->pasword;
   $sStyleHidden_pasword = '';
   if (isset($this->nmgp_cmp_hidden['pasword']) && $this->nmgp_cmp_hidden['pasword'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pasword']);
       $sStyleHidden_pasword = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pasword = 'display: none;';
   $sStyleReadInp_pasword = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pasword']) && $this->nmgp_cmp_readonly['pasword'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pasword']);
       $sStyleReadLab_pasword = '';
       $sStyleReadInp_pasword = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pasword']) && $this->nmgp_cmp_hidden['pasword'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pasword" value="<?php echo $this->form_encode_input($pasword) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pasword_line" id="hidden_field_data_pasword" style="<?php echo $sStyleHidden_pasword; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pasword_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pasword_label"><span id="id_label_pasword"><?php echo $this->nm_new_label['pasword']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pasword"]) &&  $this->nmgp_cmp_readonly["pasword"] == "on") { ?>
<input type="hidden" name="pasword" value="">
<?php } else { ?>
<span id="id_read_on_pasword" class="sc-ui-readonly-pasword css_pasword_line" style="<?php echo $sStyleReadLab_pasword; ?>"><?php echo $this->form_encode_input($this->pasword); ?></span><span id="id_read_off_pasword" style="white-space: nowrap;<?php echo $sStyleReadInp_pasword; ?>"><input class="sc-js-input scFormObjectOdd css_pasword_obj" style="" id="id_sc_field_pasword" type=password name="pasword" value="" 
 size=10 maxlength=21 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '***********', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pasword_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pasword_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['btn_login']))
    {
        $this->nm_new_label['btn_login'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $btn_login = $this->btn_login;
   $sStyleHidden_btn_login = '';
   if (isset($this->nmgp_cmp_hidden['btn_login']) && $this->nmgp_cmp_hidden['btn_login'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['btn_login']);
       $sStyleHidden_btn_login = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_btn_login = 'display: none;';
   $sStyleReadInp_btn_login = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['btn_login']) && $this->nmgp_cmp_readonly['btn_login'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['btn_login']);
       $sStyleReadLab_btn_login = '';
       $sStyleReadInp_btn_login = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['btn_login']) && $this->nmgp_cmp_hidden['btn_login'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="btn_login" value="<?php echo $this->form_encode_input($btn_login) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_btn_login_line" id="hidden_field_data_btn_login" style="<?php echo $sStyleHidden_btn_login; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_btn_login_line" style="padding: 0px"><span class="scFormLabelOddFormat css_btn_login_label"><span id="id_label_btn_login"><?php echo $this->nm_new_label['btn_login']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"))
          { 
              $btn_login = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $btn_login = "<span class=\"scFormErrorMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_btn_login = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"); 
              $out_btn_login = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $out_btn_login = $this->Ini->path_imag_temp . "/sc_" . $out_btn_login . "_btn_login_3060_" . $img_time . "_grp__NM__img__NM__geo_login.png";
              if (!is_file($this->Ini->root . $out_btn_login)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_btn_login);
                  $sc_obj_img->setWidth(60);
                  $sc_obj_img->setHeight(30);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_btn_login);
              } 
              $btn_login = "<img  border=\"0\" src=\"" . $out_btn_login . "\"/>" ; 
          } 
?>
<span id="id_imghtml_btn_login"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_validacion_edit . "', '$this->nm_location', 'usuario*scin" . str_replace("'", "@aspass@", $_SESSION['user']) . "*scoutSC_glo_par_usuario*scinuser*scoutpassword*scin" . str_replace("'", "@aspass@", $_SESSION['pass']) . "*scoutSC_glo_par_password*scinpass*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'validacion')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $btn_login ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["btn_login"]) &&  $this->nmgp_cmp_readonly["btn_login"] == "on") { 

 ?>
<input type="hidden" name="btn_login" value="<?php echo $this->form_encode_input($btn_login) . "\">" . $btn_login . ""; ?>
<?php } else { ?>
<span id="id_read_on_btn_login" class="sc-ui-readonly-btn_login css_btn_login_line" style="<?php echo $sStyleReadLab_btn_login; ?>"><?php echo $this->form_encode_input($this->btn_login); ?></span><span id="id_read_off_btn_login" style="white-space: nowrap;<?php echo $sStyleReadInp_btn_login; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_btn_login_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_btn_login_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['masterValue']);
?>
}
<?php
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbl_archivos_1");
 parent.scAjaxDetailHeight("form_tbl_archivos_1", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbl_archivos_1", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbl_archivos_1", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
