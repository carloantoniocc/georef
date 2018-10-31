<?php
class form_tbl_georref_form extends form_tbl_georref_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - georref"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - georref"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbl_georref/form_tbl_georref_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbl_georref_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_tbl_georref_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         $('#SC_fast_search_t').listen();
     }
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
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
 include_once("form_tbl_georref_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbl_georref'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbl_georref'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<div style="overflow-x:auto;">
  <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
    <TR valign="middle">
      <TD align="left" rowspan="3" width="10%" class="scFormHeaderFont">
        
      </TD>
      <TD align="left" width="70%" style="font-size:3vw;color:#0063AE" class="scFormHeaderFont">
        
      </TD>
      <TD align="center" width="30%" class="scFormHeaderFont">
        
      </TD>
    </TR>
  </TABLE>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
{
    $NM_btn = false;
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Volver'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "volver", "sc_btn_Volver()", "sc_btn_Volver()", "sc_Volver_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Volver'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "volver", "sc_btn_Volver()", "sc_btn_Volver()", "sc_Volver_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['mapa_ti'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "mapa_ti", "sc_btn_mapa_ti()", "sc_btn_mapa_ti()", "sc_mapa_ti_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes == "novo") {
        $sCondStyle = ($this->nmgp_botoes['mapa_ti'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "mapa_ti", "sc_btn_mapa_ti()", "sc_btn_mapa_ti()", "sc_mapa_ti_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_2";
        echo "<img id=\"NM_sep_2\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_3";
        echo "<img id=\"NM_sep_3\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_tbl_georref_add_new_line(); return false;", "do_ajax_form_tbl_georref_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sStyleHidden_sc_field_0_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_0_']) || $this->nmgp_cmp_hidden['sc_field_0_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_0_'])) {
          $this->nm_new_label['sc_field_0_'] = "Codigo Deis Nuevo"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_0__label" id="hidden_field_label_sc_field_0_" style="<?php echo $sStyleHidden_sc_field_0_; ?>" > <?php echo $this->nm_new_label['sc_field_0_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off') { $sStyleHidden_sc_field_1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_1_']) || $this->nmgp_cmp_hidden['sc_field_1_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_1_'])) {
          $this->nm_new_label['sc_field_1_'] = "Codigo Deis Antiguo"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_1__label" id="hidden_field_label_sc_field_1_" style="<?php echo $sStyleHidden_sc_field_1_; ?>" > <?php echo $this->nm_new_label['sc_field_1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['comuna_']) && $this->nmgp_cmp_hidden['comuna_'] == 'off') { $sStyleHidden_comuna_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['comuna_']) || $this->nmgp_cmp_hidden['comuna_'] == 'on') {
      if (!isset($this->nm_new_label['comuna_'])) {
          $this->nm_new_label['comuna_'] = "COMUNA"; } ?>

    <TD class="scFormLabelOddMult css_comuna__label" id="hidden_field_label_comuna_" style="<?php echo $sStyleHidden_comuna_; ?>" > <?php echo $this->nm_new_label['comuna_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off') { $sStyleHidden_sc_field_2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_2_']) || $this->nmgp_cmp_hidden['sc_field_2_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_2_'])) {
          $this->nm_new_label['sc_field_2_'] = "Nivel De Atencion"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_2__label" id="hidden_field_label_sc_field_2_" style="<?php echo $sStyleHidden_sc_field_2_; ?>" > <?php echo $this->nm_new_label['sc_field_2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_3_']) && $this->nmgp_cmp_hidden['sc_field_3_'] == 'off') { $sStyleHidden_sc_field_3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_3_']) || $this->nmgp_cmp_hidden['sc_field_3_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_3_'])) {
          $this->nm_new_label['sc_field_3_'] = "Nombre Oficial"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_3__label" id="hidden_field_label_sc_field_3_" style="<?php echo $sStyleHidden_sc_field_3_; ?>" > <?php echo $this->nm_new_label['sc_field_3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['agenda_']) && $this->nmgp_cmp_hidden['agenda_'] == 'off') { $sStyleHidden_agenda_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['agenda_']) || $this->nmgp_cmp_hidden['agenda_'] == 'on') {
      if (!isset($this->nm_new_label['agenda_'])) {
          $this->nm_new_label['agenda_'] = "Agenda"; } ?>

    <TD class="scFormLabelOddMult css_agenda__label" id="hidden_field_label_agenda_" style="<?php echo $sStyleHidden_agenda_; ?>" > <?php echo $this->nm_new_label['agenda_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_']) && $this->nmgp_cmp_hidden['rce_'] == 'off') { $sStyleHidden_rce_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['rce_']) || $this->nmgp_cmp_hidden['rce_'] == 'on') {
      if (!isset($this->nm_new_label['rce_'])) {
          $this->nm_new_label['rce_'] = "RCE"; } ?>

    <TD class="scFormLabelOddMult css_rce__label" id="hidden_field_label_rce_" style="<?php echo $sStyleHidden_rce_; ?>" > <?php echo $this->nm_new_label['rce_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_']) && $this->nmgp_cmp_hidden['indicaciones_'] == 'off') { $sStyleHidden_indicaciones_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['indicaciones_']) || $this->nmgp_cmp_hidden['indicaciones_'] == 'on') {
      if (!isset($this->nm_new_label['indicaciones_'])) {
          $this->nm_new_label['indicaciones_'] = "Indicaciones"; } ?>

    <TD class="scFormLabelOddMult css_indicaciones__label" id="hidden_field_label_indicaciones_" style="<?php echo $sStyleHidden_indicaciones_; ?>" > <?php echo $this->nm_new_label['indicaciones_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dental_']) && $this->nmgp_cmp_hidden['dental_'] == 'off') { $sStyleHidden_dental_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dental_']) || $this->nmgp_cmp_hidden['dental_'] == 'on') {
      if (!isset($this->nm_new_label['dental_'])) {
          $this->nm_new_label['dental_'] = "Dental"; } ?>

    <TD class="scFormLabelOddMult css_dental__label" id="hidden_field_label_dental_" style="<?php echo $sStyleHidden_dental_; ?>" > <?php echo $this->nm_new_label['dental_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_4_']) && $this->nmgp_cmp_hidden['sc_field_4_'] == 'off') { $sStyleHidden_sc_field_4_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_4_']) || $this->nmgp_cmp_hidden['sc_field_4_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_4_'])) {
          $this->nm_new_label['sc_field_4_'] = "Registro / Admision"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_4__label" id="hidden_field_label_sc_field_4_" style="<?php echo $sStyleHidden_sc_field_4_; ?>" > <?php echo $this->nm_new_label['sc_field_4_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_5_']) && $this->nmgp_cmp_hidden['sc_field_5_'] == 'off') { $sStyleHidden_sc_field_5_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_5_']) || $this->nmgp_cmp_hidden['sc_field_5_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_5_'])) {
          $this->nm_new_label['sc_field_5_'] = "Administracion De Camas"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_5__label" id="hidden_field_label_sc_field_5_" style="<?php echo $sStyleHidden_sc_field_5_; ?>" > <?php echo $this->nm_new_label['sc_field_5_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_1_']) && $this->nmgp_cmp_hidden['rce_1_'] == 'off') { $sStyleHidden_rce_1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['rce_1_']) || $this->nmgp_cmp_hidden['rce_1_'] == 'on') {
      if (!isset($this->nm_new_label['rce_1_'])) {
          $this->nm_new_label['rce_1_'] = "RCE 1"; } ?>

    <TD class="scFormLabelOddMult css_rce_1__label" id="hidden_field_label_rce_1_" style="<?php echo $sStyleHidden_rce_1_; ?>" > <?php echo $this->nm_new_label['rce_1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_1_']) && $this->nmgp_cmp_hidden['indicaciones_1_'] == 'off') { $sStyleHidden_indicaciones_1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['indicaciones_1_']) || $this->nmgp_cmp_hidden['indicaciones_1_'] == 'on') {
      if (!isset($this->nm_new_label['indicaciones_1_'])) {
          $this->nm_new_label['indicaciones_1_'] = "Indicaciones 1"; } ?>

    <TD class="scFormLabelOddMult css_indicaciones_1__label" id="hidden_field_label_indicaciones_1_" style="<?php echo $sStyleHidden_indicaciones_1_; ?>" > <?php echo $this->nm_new_label['indicaciones_1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_6_']) && $this->nmgp_cmp_hidden['sc_field_6_'] == 'off') { $sStyleHidden_sc_field_6_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_6_']) || $this->nmgp_cmp_hidden['sc_field_6_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_6_'])) {
          $this->nm_new_label['sc_field_6_'] = "Registro / Admision 1"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_6__label" id="hidden_field_label_sc_field_6_" style="<?php echo $sStyleHidden_sc_field_6_; ?>" > <?php echo $this->nm_new_label['sc_field_6_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_2_']) && $this->nmgp_cmp_hidden['rce_2_'] == 'off') { $sStyleHidden_rce_2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['rce_2_']) || $this->nmgp_cmp_hidden['rce_2_'] == 'on') {
      if (!isset($this->nm_new_label['rce_2_'])) {
          $this->nm_new_label['rce_2_'] = "RCE 2"; } ?>

    <TD class="scFormLabelOddMult css_rce_2__label" id="hidden_field_label_rce_2_" style="<?php echo $sStyleHidden_rce_2_; ?>" > <?php echo $this->nm_new_label['rce_2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_2_']) && $this->nmgp_cmp_hidden['indicaciones_2_'] == 'off') { $sStyleHidden_indicaciones_2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['indicaciones_2_']) || $this->nmgp_cmp_hidden['indicaciones_2_'] == 'on') {
      if (!isset($this->nm_new_label['indicaciones_2_'])) {
          $this->nm_new_label['indicaciones_2_'] = "Indicaciones 2"; } ?>

    <TD class="scFormLabelOddMult css_indicaciones_2__label" id="hidden_field_label_indicaciones_2_" style="<?php echo $sStyleHidden_indicaciones_2_; ?>" > <?php echo $this->nm_new_label['indicaciones_2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['triage_']) && $this->nmgp_cmp_hidden['triage_'] == 'off') { $sStyleHidden_triage_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['triage_']) || $this->nmgp_cmp_hidden['triage_'] == 'on') {
      if (!isset($this->nm_new_label['triage_'])) {
          $this->nm_new_label['triage_'] = "Triage"; } ?>

    <TD class="scFormLabelOddMult css_triage__label" id="hidden_field_label_triage_" style="<?php echo $sStyleHidden_triage_; ?>" > <?php echo $this->nm_new_label['triage_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_7_']) && $this->nmgp_cmp_hidden['sc_field_7_'] == 'off') { $sStyleHidden_sc_field_7_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_7_']) || $this->nmgp_cmp_hidden['sc_field_7_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_7_'])) {
          $this->nm_new_label['sc_field_7_'] = "Mapa De Piso"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_7__label" id="hidden_field_label_sc_field_7_" style="<?php echo $sStyleHidden_sc_field_7_; ?>" > <?php echo $this->nm_new_label['sc_field_7_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_8_']) && $this->nmgp_cmp_hidden['sc_field_8_'] == 'off') { $sStyleHidden_sc_field_8_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_8_']) || $this->nmgp_cmp_hidden['sc_field_8_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_8_'])) {
          $this->nm_new_label['sc_field_8_'] = "Solicitud De Camas"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_8__label" id="hidden_field_label_sc_field_8_" style="<?php echo $sStyleHidden_sc_field_8_; ?>" > <?php echo $this->nm_new_label['sc_field_8_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_9_']) && $this->nmgp_cmp_hidden['sc_field_9_'] == 'off') { $sStyleHidden_sc_field_9_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_9_']) || $this->nmgp_cmp_hidden['sc_field_9_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_9_'])) {
          $this->nm_new_label['sc_field_9_'] = "Alta Pacientes"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_9__label" id="hidden_field_label_sc_field_9_" style="<?php echo $sStyleHidden_sc_field_9_; ?>" > <?php echo $this->nm_new_label['sc_field_9_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dispensacion_']) && $this->nmgp_cmp_hidden['dispensacion_'] == 'off') { $sStyleHidden_dispensacion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dispensacion_']) || $this->nmgp_cmp_hidden['dispensacion_'] == 'on') {
      if (!isset($this->nm_new_label['dispensacion_'])) {
          $this->nm_new_label['dispensacion_'] = "Dispensacion"; } ?>

    <TD class="scFormLabelOddMult css_dispensacion__label" id="hidden_field_label_dispensacion_" style="<?php echo $sStyleHidden_dispensacion_; ?>" > <?php echo $this->nm_new_label['dispensacion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_10_']) && $this->nmgp_cmp_hidden['sc_field_10_'] == 'off') { $sStyleHidden_sc_field_10_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_10_']) || $this->nmgp_cmp_hidden['sc_field_10_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_10_'])) {
          $this->nm_new_label['sc_field_10_'] = "Control Stock"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_10__label" id="hidden_field_label_sc_field_10_" style="<?php echo $sStyleHidden_sc_field_10_; ?>" > <?php echo $this->nm_new_label['sc_field_10_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['laboratorio_']) && $this->nmgp_cmp_hidden['laboratorio_'] == 'off') { $sStyleHidden_laboratorio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['laboratorio_']) || $this->nmgp_cmp_hidden['laboratorio_'] == 'on') {
      if (!isset($this->nm_new_label['laboratorio_'])) {
          $this->nm_new_label['laboratorio_'] = "Laboratorio"; } ?>

    <TD class="scFormLabelOddMult css_laboratorio__label" id="hidden_field_label_laboratorio_" style="<?php echo $sStyleHidden_laboratorio_; ?>" > <?php echo $this->nm_new_label['laboratorio_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_11_']) && $this->nmgp_cmp_hidden['sc_field_11_'] == 'off') { $sStyleHidden_sc_field_11_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_11_']) || $this->nmgp_cmp_hidden['sc_field_11_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_11_'])) {
          $this->nm_new_label['sc_field_11_'] = "RIS/PACS"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_11__label" id="hidden_field_label_sc_field_11_" style="<?php echo $sStyleHidden_sc_field_11_; ?>" > <?php echo $this->nm_new_label['sc_field_11_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_12_']) && $this->nmgp_cmp_hidden['sc_field_12_'] == 'off') { $sStyleHidden_sc_field_12_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_12_']) || $this->nmgp_cmp_hidden['sc_field_12_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_12_'])) {
          $this->nm_new_label['sc_field_12_'] = "Validacion FONASA"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_12__label" id="hidden_field_label_sc_field_12_" style="<?php echo $sStyleHidden_sc_field_12_; ?>" > <?php echo $this->nm_new_label['sc_field_12_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['erp_']) && $this->nmgp_cmp_hidden['erp_'] == 'off') { $sStyleHidden_erp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['erp_']) || $this->nmgp_cmp_hidden['erp_'] == 'on') {
      if (!isset($this->nm_new_label['erp_'])) {
          $this->nm_new_label['erp_'] = "ERP"; } ?>

    <TD class="scFormLabelOddMult css_erp__label" id="hidden_field_label_erp_" style="<?php echo $sStyleHidden_erp_; ?>" > <?php echo $this->nm_new_label['erp_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pabellon_']) && $this->nmgp_cmp_hidden['pabellon_'] == 'off') { $sStyleHidden_pabellon_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pabellon_']) || $this->nmgp_cmp_hidden['pabellon_'] == 'on') {
      if (!isset($this->nm_new_label['pabellon_'])) {
          $this->nm_new_label['pabellon_'] = "Pabellon"; } ?>

    <TD class="scFormLabelOddMult css_pabellon__label" id="hidden_field_label_pabellon_" style="<?php echo $sStyleHidden_pabellon_; ?>" > <?php echo $this->nm_new_label['pabellon_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['maternidad_']) && $this->nmgp_cmp_hidden['maternidad_'] == 'off') { $sStyleHidden_maternidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['maternidad_']) || $this->nmgp_cmp_hidden['maternidad_'] == 'on') {
      if (!isset($this->nm_new_label['maternidad_'])) {
          $this->nm_new_label['maternidad_'] = "Maternidad"; } ?>

    <TD class="scFormLabelOddMult css_maternidad__label" id="hidden_field_label_maternidad_" style="<?php echo $sStyleHidden_maternidad_; ?>" > <?php echo $this->nm_new_label['maternidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['archivo_']) && $this->nmgp_cmp_hidden['archivo_'] == 'off') { $sStyleHidden_archivo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['archivo_']) || $this->nmgp_cmp_hidden['archivo_'] == 'on') {
      if (!isset($this->nm_new_label['archivo_'])) {
          $this->nm_new_label['archivo_'] = "Archivo"; } ?>

    <TD class="scFormLabelOddMult css_archivo__label" id="hidden_field_label_archivo_" style="<?php echo $sStyleHidden_archivo_; ?>" > <?php echo $this->nm_new_label['archivo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lme_']) && $this->nmgp_cmp_hidden['lme_'] == 'off') { $sStyleHidden_lme_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lme_']) || $this->nmgp_cmp_hidden['lme_'] == 'on') {
      if (!isset($this->nm_new_label['lme_'])) {
          $this->nm_new_label['lme_'] = "LME"; } ?>

    <TD class="scFormLabelOddMult css_lme__label" id="hidden_field_label_lme_" style="<?php echo $sStyleHidden_lme_; ?>" > <?php echo $this->nm_new_label['lme_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_tbl_georref);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbl_georref = $this->form_vert_form_tbl_georref;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbl_georref))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_tbl_georref as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['sc_field_0_'] = true;
           $this->nmgp_cmp_readonly['sc_field_1_'] = true;
           $this->nmgp_cmp_readonly['comuna_'] = true;
           $this->nmgp_cmp_readonly['sc_field_2_'] = true;
           $this->nmgp_cmp_readonly['sc_field_3_'] = true;
           $this->nmgp_cmp_readonly['agenda_'] = true;
           $this->nmgp_cmp_readonly['rce_'] = true;
           $this->nmgp_cmp_readonly['indicaciones_'] = true;
           $this->nmgp_cmp_readonly['dental_'] = true;
           $this->nmgp_cmp_readonly['sc_field_4_'] = true;
           $this->nmgp_cmp_readonly['sc_field_5_'] = true;
           $this->nmgp_cmp_readonly['rce_1_'] = true;
           $this->nmgp_cmp_readonly['indicaciones_1_'] = true;
           $this->nmgp_cmp_readonly['sc_field_6_'] = true;
           $this->nmgp_cmp_readonly['rce_2_'] = true;
           $this->nmgp_cmp_readonly['indicaciones_2_'] = true;
           $this->nmgp_cmp_readonly['triage_'] = true;
           $this->nmgp_cmp_readonly['sc_field_7_'] = true;
           $this->nmgp_cmp_readonly['sc_field_8_'] = true;
           $this->nmgp_cmp_readonly['sc_field_9_'] = true;
           $this->nmgp_cmp_readonly['dispensacion_'] = true;
           $this->nmgp_cmp_readonly['sc_field_10_'] = true;
           $this->nmgp_cmp_readonly['laboratorio_'] = true;
           $this->nmgp_cmp_readonly['sc_field_11_'] = true;
           $this->nmgp_cmp_readonly['sc_field_12_'] = true;
           $this->nmgp_cmp_readonly['erp_'] = true;
           $this->nmgp_cmp_readonly['pabellon_'] = true;
           $this->nmgp_cmp_readonly['maternidad_'] = true;
           $this->nmgp_cmp_readonly['archivo_'] = true;
           $this->nmgp_cmp_readonly['lme_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_0_']) || $this->nmgp_cmp_readonly['sc_field_0_'] != "on") {$this->nmgp_cmp_readonly['sc_field_0_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_1_']) || $this->nmgp_cmp_readonly['sc_field_1_'] != "on") {$this->nmgp_cmp_readonly['sc_field_1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['comuna_']) || $this->nmgp_cmp_readonly['comuna_'] != "on") {$this->nmgp_cmp_readonly['comuna_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_2_']) || $this->nmgp_cmp_readonly['sc_field_2_'] != "on") {$this->nmgp_cmp_readonly['sc_field_2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_3_']) || $this->nmgp_cmp_readonly['sc_field_3_'] != "on") {$this->nmgp_cmp_readonly['sc_field_3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['agenda_']) || $this->nmgp_cmp_readonly['agenda_'] != "on") {$this->nmgp_cmp_readonly['agenda_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rce_']) || $this->nmgp_cmp_readonly['rce_'] != "on") {$this->nmgp_cmp_readonly['rce_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['indicaciones_']) || $this->nmgp_cmp_readonly['indicaciones_'] != "on") {$this->nmgp_cmp_readonly['indicaciones_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dental_']) || $this->nmgp_cmp_readonly['dental_'] != "on") {$this->nmgp_cmp_readonly['dental_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_4_']) || $this->nmgp_cmp_readonly['sc_field_4_'] != "on") {$this->nmgp_cmp_readonly['sc_field_4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_5_']) || $this->nmgp_cmp_readonly['sc_field_5_'] != "on") {$this->nmgp_cmp_readonly['sc_field_5_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rce_1_']) || $this->nmgp_cmp_readonly['rce_1_'] != "on") {$this->nmgp_cmp_readonly['rce_1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['indicaciones_1_']) || $this->nmgp_cmp_readonly['indicaciones_1_'] != "on") {$this->nmgp_cmp_readonly['indicaciones_1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_6_']) || $this->nmgp_cmp_readonly['sc_field_6_'] != "on") {$this->nmgp_cmp_readonly['sc_field_6_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rce_2_']) || $this->nmgp_cmp_readonly['rce_2_'] != "on") {$this->nmgp_cmp_readonly['rce_2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['indicaciones_2_']) || $this->nmgp_cmp_readonly['indicaciones_2_'] != "on") {$this->nmgp_cmp_readonly['indicaciones_2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['triage_']) || $this->nmgp_cmp_readonly['triage_'] != "on") {$this->nmgp_cmp_readonly['triage_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_7_']) || $this->nmgp_cmp_readonly['sc_field_7_'] != "on") {$this->nmgp_cmp_readonly['sc_field_7_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_8_']) || $this->nmgp_cmp_readonly['sc_field_8_'] != "on") {$this->nmgp_cmp_readonly['sc_field_8_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_9_']) || $this->nmgp_cmp_readonly['sc_field_9_'] != "on") {$this->nmgp_cmp_readonly['sc_field_9_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dispensacion_']) || $this->nmgp_cmp_readonly['dispensacion_'] != "on") {$this->nmgp_cmp_readonly['dispensacion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_10_']) || $this->nmgp_cmp_readonly['sc_field_10_'] != "on") {$this->nmgp_cmp_readonly['sc_field_10_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['laboratorio_']) || $this->nmgp_cmp_readonly['laboratorio_'] != "on") {$this->nmgp_cmp_readonly['laboratorio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_11_']) || $this->nmgp_cmp_readonly['sc_field_11_'] != "on") {$this->nmgp_cmp_readonly['sc_field_11_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_12_']) || $this->nmgp_cmp_readonly['sc_field_12_'] != "on") {$this->nmgp_cmp_readonly['sc_field_12_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['erp_']) || $this->nmgp_cmp_readonly['erp_'] != "on") {$this->nmgp_cmp_readonly['erp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pabellon_']) || $this->nmgp_cmp_readonly['pabellon_'] != "on") {$this->nmgp_cmp_readonly['pabellon_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['maternidad_']) || $this->nmgp_cmp_readonly['maternidad_'] != "on") {$this->nmgp_cmp_readonly['maternidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['archivo_']) || $this->nmgp_cmp_readonly['archivo_'] != "on") {$this->nmgp_cmp_readonly['archivo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lme_']) || $this->nmgp_cmp_readonly['lme_'] != "on") {$this->nmgp_cmp_readonly['lme_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['id_']; 
       $id_ = $this->id_; 
       $sStyleHidden_id_ = '';
       if (isset($sCheckRead_id_))
       {
           unset($sCheckRead_id_);
       }
       if (isset($this->nmgp_cmp_readonly['id_']))
       {
           $sCheckRead_id_ = $this->nmgp_cmp_readonly['id_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_']);
           $sStyleHidden_id_ = 'display: none;';
       }
       $bTestReadOnly_id_ = true;
       $sStyleReadLab_id_ = 'display: none;';
       $sStyleReadInp_id_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on"))
       {
           $bTestReadOnly_id_ = false;
           unset($this->nmgp_cmp_readonly['id_']);
           $sStyleReadLab_id_ = '';
           $sStyleReadInp_id_ = 'display: none;';
       }
       $this->sc_field_0_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_0_']; 
       $sc_field_0_ = $this->sc_field_0_; 
       $sStyleHidden_sc_field_0_ = '';
       if (isset($sCheckRead_sc_field_0_))
       {
           unset($sCheckRead_sc_field_0_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']))
       {
           $sCheckRead_sc_field_0_ = $this->nmgp_cmp_readonly['sc_field_0_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_0_']);
           $sStyleHidden_sc_field_0_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_0_ = true;
       $sStyleReadLab_sc_field_0_ = 'display: none;';
       $sStyleReadInp_sc_field_0_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']) && $this->nmgp_cmp_readonly['sc_field_0_'] == 'on')
       {
           $bTestReadOnly_sc_field_0_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_0_']);
           $sStyleReadLab_sc_field_0_ = '';
           $sStyleReadInp_sc_field_0_ = 'display: none;';
       }
       $this->sc_field_1_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_1_']; 
       $sc_field_1_ = $this->sc_field_1_; 
       $sStyleHidden_sc_field_1_ = '';
       if (isset($sCheckRead_sc_field_1_))
       {
           unset($sCheckRead_sc_field_1_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_1_']))
       {
           $sCheckRead_sc_field_1_ = $this->nmgp_cmp_readonly['sc_field_1_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_1_']);
           $sStyleHidden_sc_field_1_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_1_ = true;
       $sStyleReadLab_sc_field_1_ = 'display: none;';
       $sStyleReadInp_sc_field_1_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_1_']) && $this->nmgp_cmp_readonly['sc_field_1_'] == 'on')
       {
           $bTestReadOnly_sc_field_1_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_1_']);
           $sStyleReadLab_sc_field_1_ = '';
           $sStyleReadInp_sc_field_1_ = 'display: none;';
       }
       $this->comuna_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['comuna_']; 
       $comuna_ = $this->comuna_; 
       $sStyleHidden_comuna_ = '';
       if (isset($sCheckRead_comuna_))
       {
           unset($sCheckRead_comuna_);
       }
       if (isset($this->nmgp_cmp_readonly['comuna_']))
       {
           $sCheckRead_comuna_ = $this->nmgp_cmp_readonly['comuna_'];
       }
       if (isset($this->nmgp_cmp_hidden['comuna_']) && $this->nmgp_cmp_hidden['comuna_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['comuna_']);
           $sStyleHidden_comuna_ = 'display: none;';
       }
       $bTestReadOnly_comuna_ = true;
       $sStyleReadLab_comuna_ = 'display: none;';
       $sStyleReadInp_comuna_ = '';
       if (isset($this->nmgp_cmp_readonly['comuna_']) && $this->nmgp_cmp_readonly['comuna_'] == 'on')
       {
           $bTestReadOnly_comuna_ = false;
           unset($this->nmgp_cmp_readonly['comuna_']);
           $sStyleReadLab_comuna_ = '';
           $sStyleReadInp_comuna_ = 'display: none;';
       }
       $this->sc_field_2_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_2_']; 
       $sc_field_2_ = $this->sc_field_2_; 
       $sStyleHidden_sc_field_2_ = '';
       if (isset($sCheckRead_sc_field_2_))
       {
           unset($sCheckRead_sc_field_2_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_2_']))
       {
           $sCheckRead_sc_field_2_ = $this->nmgp_cmp_readonly['sc_field_2_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_2_']);
           $sStyleHidden_sc_field_2_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_2_ = true;
       $sStyleReadLab_sc_field_2_ = 'display: none;';
       $sStyleReadInp_sc_field_2_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_2_']) && $this->nmgp_cmp_readonly['sc_field_2_'] == 'on')
       {
           $bTestReadOnly_sc_field_2_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_2_']);
           $sStyleReadLab_sc_field_2_ = '';
           $sStyleReadInp_sc_field_2_ = 'display: none;';
       }
       $this->sc_field_3_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_3_']; 
       $sc_field_3_ = $this->sc_field_3_; 
       $sStyleHidden_sc_field_3_ = '';
       if (isset($sCheckRead_sc_field_3_))
       {
           unset($sCheckRead_sc_field_3_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_3_']))
       {
           $sCheckRead_sc_field_3_ = $this->nmgp_cmp_readonly['sc_field_3_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_3_']) && $this->nmgp_cmp_hidden['sc_field_3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_3_']);
           $sStyleHidden_sc_field_3_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_3_ = true;
       $sStyleReadLab_sc_field_3_ = 'display: none;';
       $sStyleReadInp_sc_field_3_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_3_']) && $this->nmgp_cmp_readonly['sc_field_3_'] == 'on')
       {
           $bTestReadOnly_sc_field_3_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_3_']);
           $sStyleReadLab_sc_field_3_ = '';
           $sStyleReadInp_sc_field_3_ = 'display: none;';
       }
       $this->agenda_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['agenda_']; 
       $agenda_ = $this->agenda_; 
       $sStyleHidden_agenda_ = '';
       if (isset($sCheckRead_agenda_))
       {
           unset($sCheckRead_agenda_);
       }
       if (isset($this->nmgp_cmp_readonly['agenda_']))
       {
           $sCheckRead_agenda_ = $this->nmgp_cmp_readonly['agenda_'];
       }
       if (isset($this->nmgp_cmp_hidden['agenda_']) && $this->nmgp_cmp_hidden['agenda_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['agenda_']);
           $sStyleHidden_agenda_ = 'display: none;';
       }
       $bTestReadOnly_agenda_ = true;
       $sStyleReadLab_agenda_ = 'display: none;';
       $sStyleReadInp_agenda_ = '';
       if (isset($this->nmgp_cmp_readonly['agenda_']) && $this->nmgp_cmp_readonly['agenda_'] == 'on')
       {
           $bTestReadOnly_agenda_ = false;
           unset($this->nmgp_cmp_readonly['agenda_']);
           $sStyleReadLab_agenda_ = '';
           $sStyleReadInp_agenda_ = 'display: none;';
       }
       $this->rce_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_']; 
       $rce_ = $this->rce_; 
       $sStyleHidden_rce_ = '';
       if (isset($sCheckRead_rce_))
       {
           unset($sCheckRead_rce_);
       }
       if (isset($this->nmgp_cmp_readonly['rce_']))
       {
           $sCheckRead_rce_ = $this->nmgp_cmp_readonly['rce_'];
       }
       if (isset($this->nmgp_cmp_hidden['rce_']) && $this->nmgp_cmp_hidden['rce_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rce_']);
           $sStyleHidden_rce_ = 'display: none;';
       }
       $bTestReadOnly_rce_ = true;
       $sStyleReadLab_rce_ = 'display: none;';
       $sStyleReadInp_rce_ = '';
       if (isset($this->nmgp_cmp_readonly['rce_']) && $this->nmgp_cmp_readonly['rce_'] == 'on')
       {
           $bTestReadOnly_rce_ = false;
           unset($this->nmgp_cmp_readonly['rce_']);
           $sStyleReadLab_rce_ = '';
           $sStyleReadInp_rce_ = 'display: none;';
       }
       $this->indicaciones_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_']; 
       $indicaciones_ = $this->indicaciones_; 
       $sStyleHidden_indicaciones_ = '';
       if (isset($sCheckRead_indicaciones_))
       {
           unset($sCheckRead_indicaciones_);
       }
       if (isset($this->nmgp_cmp_readonly['indicaciones_']))
       {
           $sCheckRead_indicaciones_ = $this->nmgp_cmp_readonly['indicaciones_'];
       }
       if (isset($this->nmgp_cmp_hidden['indicaciones_']) && $this->nmgp_cmp_hidden['indicaciones_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['indicaciones_']);
           $sStyleHidden_indicaciones_ = 'display: none;';
       }
       $bTestReadOnly_indicaciones_ = true;
       $sStyleReadLab_indicaciones_ = 'display: none;';
       $sStyleReadInp_indicaciones_ = '';
       if (isset($this->nmgp_cmp_readonly['indicaciones_']) && $this->nmgp_cmp_readonly['indicaciones_'] == 'on')
       {
           $bTestReadOnly_indicaciones_ = false;
           unset($this->nmgp_cmp_readonly['indicaciones_']);
           $sStyleReadLab_indicaciones_ = '';
           $sStyleReadInp_indicaciones_ = 'display: none;';
       }
       $this->dental_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['dental_']; 
       $dental_ = $this->dental_; 
       $sStyleHidden_dental_ = '';
       if (isset($sCheckRead_dental_))
       {
           unset($sCheckRead_dental_);
       }
       if (isset($this->nmgp_cmp_readonly['dental_']))
       {
           $sCheckRead_dental_ = $this->nmgp_cmp_readonly['dental_'];
       }
       if (isset($this->nmgp_cmp_hidden['dental_']) && $this->nmgp_cmp_hidden['dental_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dental_']);
           $sStyleHidden_dental_ = 'display: none;';
       }
       $bTestReadOnly_dental_ = true;
       $sStyleReadLab_dental_ = 'display: none;';
       $sStyleReadInp_dental_ = '';
       if (isset($this->nmgp_cmp_readonly['dental_']) && $this->nmgp_cmp_readonly['dental_'] == 'on')
       {
           $bTestReadOnly_dental_ = false;
           unset($this->nmgp_cmp_readonly['dental_']);
           $sStyleReadLab_dental_ = '';
           $sStyleReadInp_dental_ = 'display: none;';
       }
       $this->sc_field_4_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_4_']; 
       $sc_field_4_ = $this->sc_field_4_; 
       $sStyleHidden_sc_field_4_ = '';
       if (isset($sCheckRead_sc_field_4_))
       {
           unset($sCheckRead_sc_field_4_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_4_']))
       {
           $sCheckRead_sc_field_4_ = $this->nmgp_cmp_readonly['sc_field_4_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_4_']) && $this->nmgp_cmp_hidden['sc_field_4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_4_']);
           $sStyleHidden_sc_field_4_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_4_ = true;
       $sStyleReadLab_sc_field_4_ = 'display: none;';
       $sStyleReadInp_sc_field_4_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_4_']) && $this->nmgp_cmp_readonly['sc_field_4_'] == 'on')
       {
           $bTestReadOnly_sc_field_4_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_4_']);
           $sStyleReadLab_sc_field_4_ = '';
           $sStyleReadInp_sc_field_4_ = 'display: none;';
       }
       $this->sc_field_5_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_5_']; 
       $sc_field_5_ = $this->sc_field_5_; 
       $sStyleHidden_sc_field_5_ = '';
       if (isset($sCheckRead_sc_field_5_))
       {
           unset($sCheckRead_sc_field_5_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_5_']))
       {
           $sCheckRead_sc_field_5_ = $this->nmgp_cmp_readonly['sc_field_5_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_5_']) && $this->nmgp_cmp_hidden['sc_field_5_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_5_']);
           $sStyleHidden_sc_field_5_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_5_ = true;
       $sStyleReadLab_sc_field_5_ = 'display: none;';
       $sStyleReadInp_sc_field_5_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_5_']) && $this->nmgp_cmp_readonly['sc_field_5_'] == 'on')
       {
           $bTestReadOnly_sc_field_5_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_5_']);
           $sStyleReadLab_sc_field_5_ = '';
           $sStyleReadInp_sc_field_5_ = 'display: none;';
       }
       $this->rce_1_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_1_']; 
       $rce_1_ = $this->rce_1_; 
       $sStyleHidden_rce_1_ = '';
       if (isset($sCheckRead_rce_1_))
       {
           unset($sCheckRead_rce_1_);
       }
       if (isset($this->nmgp_cmp_readonly['rce_1_']))
       {
           $sCheckRead_rce_1_ = $this->nmgp_cmp_readonly['rce_1_'];
       }
       if (isset($this->nmgp_cmp_hidden['rce_1_']) && $this->nmgp_cmp_hidden['rce_1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rce_1_']);
           $sStyleHidden_rce_1_ = 'display: none;';
       }
       $bTestReadOnly_rce_1_ = true;
       $sStyleReadLab_rce_1_ = 'display: none;';
       $sStyleReadInp_rce_1_ = '';
       if (isset($this->nmgp_cmp_readonly['rce_1_']) && $this->nmgp_cmp_readonly['rce_1_'] == 'on')
       {
           $bTestReadOnly_rce_1_ = false;
           unset($this->nmgp_cmp_readonly['rce_1_']);
           $sStyleReadLab_rce_1_ = '';
           $sStyleReadInp_rce_1_ = 'display: none;';
       }
       $this->indicaciones_1_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_1_']; 
       $indicaciones_1_ = $this->indicaciones_1_; 
       $sStyleHidden_indicaciones_1_ = '';
       if (isset($sCheckRead_indicaciones_1_))
       {
           unset($sCheckRead_indicaciones_1_);
       }
       if (isset($this->nmgp_cmp_readonly['indicaciones_1_']))
       {
           $sCheckRead_indicaciones_1_ = $this->nmgp_cmp_readonly['indicaciones_1_'];
       }
       if (isset($this->nmgp_cmp_hidden['indicaciones_1_']) && $this->nmgp_cmp_hidden['indicaciones_1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['indicaciones_1_']);
           $sStyleHidden_indicaciones_1_ = 'display: none;';
       }
       $bTestReadOnly_indicaciones_1_ = true;
       $sStyleReadLab_indicaciones_1_ = 'display: none;';
       $sStyleReadInp_indicaciones_1_ = '';
       if (isset($this->nmgp_cmp_readonly['indicaciones_1_']) && $this->nmgp_cmp_readonly['indicaciones_1_'] == 'on')
       {
           $bTestReadOnly_indicaciones_1_ = false;
           unset($this->nmgp_cmp_readonly['indicaciones_1_']);
           $sStyleReadLab_indicaciones_1_ = '';
           $sStyleReadInp_indicaciones_1_ = 'display: none;';
       }
       $this->sc_field_6_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_6_']; 
       $sc_field_6_ = $this->sc_field_6_; 
       $sStyleHidden_sc_field_6_ = '';
       if (isset($sCheckRead_sc_field_6_))
       {
           unset($sCheckRead_sc_field_6_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_6_']))
       {
           $sCheckRead_sc_field_6_ = $this->nmgp_cmp_readonly['sc_field_6_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_6_']) && $this->nmgp_cmp_hidden['sc_field_6_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_6_']);
           $sStyleHidden_sc_field_6_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_6_ = true;
       $sStyleReadLab_sc_field_6_ = 'display: none;';
       $sStyleReadInp_sc_field_6_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_6_']) && $this->nmgp_cmp_readonly['sc_field_6_'] == 'on')
       {
           $bTestReadOnly_sc_field_6_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_6_']);
           $sStyleReadLab_sc_field_6_ = '';
           $sStyleReadInp_sc_field_6_ = 'display: none;';
       }
       $this->rce_2_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_2_']; 
       $rce_2_ = $this->rce_2_; 
       $sStyleHidden_rce_2_ = '';
       if (isset($sCheckRead_rce_2_))
       {
           unset($sCheckRead_rce_2_);
       }
       if (isset($this->nmgp_cmp_readonly['rce_2_']))
       {
           $sCheckRead_rce_2_ = $this->nmgp_cmp_readonly['rce_2_'];
       }
       if (isset($this->nmgp_cmp_hidden['rce_2_']) && $this->nmgp_cmp_hidden['rce_2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rce_2_']);
           $sStyleHidden_rce_2_ = 'display: none;';
       }
       $bTestReadOnly_rce_2_ = true;
       $sStyleReadLab_rce_2_ = 'display: none;';
       $sStyleReadInp_rce_2_ = '';
       if (isset($this->nmgp_cmp_readonly['rce_2_']) && $this->nmgp_cmp_readonly['rce_2_'] == 'on')
       {
           $bTestReadOnly_rce_2_ = false;
           unset($this->nmgp_cmp_readonly['rce_2_']);
           $sStyleReadLab_rce_2_ = '';
           $sStyleReadInp_rce_2_ = 'display: none;';
       }
       $this->indicaciones_2_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_2_']; 
       $indicaciones_2_ = $this->indicaciones_2_; 
       $sStyleHidden_indicaciones_2_ = '';
       if (isset($sCheckRead_indicaciones_2_))
       {
           unset($sCheckRead_indicaciones_2_);
       }
       if (isset($this->nmgp_cmp_readonly['indicaciones_2_']))
       {
           $sCheckRead_indicaciones_2_ = $this->nmgp_cmp_readonly['indicaciones_2_'];
       }
       if (isset($this->nmgp_cmp_hidden['indicaciones_2_']) && $this->nmgp_cmp_hidden['indicaciones_2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['indicaciones_2_']);
           $sStyleHidden_indicaciones_2_ = 'display: none;';
       }
       $bTestReadOnly_indicaciones_2_ = true;
       $sStyleReadLab_indicaciones_2_ = 'display: none;';
       $sStyleReadInp_indicaciones_2_ = '';
       if (isset($this->nmgp_cmp_readonly['indicaciones_2_']) && $this->nmgp_cmp_readonly['indicaciones_2_'] == 'on')
       {
           $bTestReadOnly_indicaciones_2_ = false;
           unset($this->nmgp_cmp_readonly['indicaciones_2_']);
           $sStyleReadLab_indicaciones_2_ = '';
           $sStyleReadInp_indicaciones_2_ = 'display: none;';
       }
       $this->triage_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['triage_']; 
       $triage_ = $this->triage_; 
       $sStyleHidden_triage_ = '';
       if (isset($sCheckRead_triage_))
       {
           unset($sCheckRead_triage_);
       }
       if (isset($this->nmgp_cmp_readonly['triage_']))
       {
           $sCheckRead_triage_ = $this->nmgp_cmp_readonly['triage_'];
       }
       if (isset($this->nmgp_cmp_hidden['triage_']) && $this->nmgp_cmp_hidden['triage_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['triage_']);
           $sStyleHidden_triage_ = 'display: none;';
       }
       $bTestReadOnly_triage_ = true;
       $sStyleReadLab_triage_ = 'display: none;';
       $sStyleReadInp_triage_ = '';
       if (isset($this->nmgp_cmp_readonly['triage_']) && $this->nmgp_cmp_readonly['triage_'] == 'on')
       {
           $bTestReadOnly_triage_ = false;
           unset($this->nmgp_cmp_readonly['triage_']);
           $sStyleReadLab_triage_ = '';
           $sStyleReadInp_triage_ = 'display: none;';
       }
       $this->sc_field_7_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_7_']; 
       $sc_field_7_ = $this->sc_field_7_; 
       $sStyleHidden_sc_field_7_ = '';
       if (isset($sCheckRead_sc_field_7_))
       {
           unset($sCheckRead_sc_field_7_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_7_']))
       {
           $sCheckRead_sc_field_7_ = $this->nmgp_cmp_readonly['sc_field_7_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_7_']) && $this->nmgp_cmp_hidden['sc_field_7_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_7_']);
           $sStyleHidden_sc_field_7_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_7_ = true;
       $sStyleReadLab_sc_field_7_ = 'display: none;';
       $sStyleReadInp_sc_field_7_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_7_']) && $this->nmgp_cmp_readonly['sc_field_7_'] == 'on')
       {
           $bTestReadOnly_sc_field_7_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_7_']);
           $sStyleReadLab_sc_field_7_ = '';
           $sStyleReadInp_sc_field_7_ = 'display: none;';
       }
       $this->sc_field_8_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_8_']; 
       $sc_field_8_ = $this->sc_field_8_; 
       $sStyleHidden_sc_field_8_ = '';
       if (isset($sCheckRead_sc_field_8_))
       {
           unset($sCheckRead_sc_field_8_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_8_']))
       {
           $sCheckRead_sc_field_8_ = $this->nmgp_cmp_readonly['sc_field_8_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_8_']) && $this->nmgp_cmp_hidden['sc_field_8_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_8_']);
           $sStyleHidden_sc_field_8_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_8_ = true;
       $sStyleReadLab_sc_field_8_ = 'display: none;';
       $sStyleReadInp_sc_field_8_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_8_']) && $this->nmgp_cmp_readonly['sc_field_8_'] == 'on')
       {
           $bTestReadOnly_sc_field_8_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_8_']);
           $sStyleReadLab_sc_field_8_ = '';
           $sStyleReadInp_sc_field_8_ = 'display: none;';
       }
       $this->sc_field_9_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_9_']; 
       $sc_field_9_ = $this->sc_field_9_; 
       $sStyleHidden_sc_field_9_ = '';
       if (isset($sCheckRead_sc_field_9_))
       {
           unset($sCheckRead_sc_field_9_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_9_']))
       {
           $sCheckRead_sc_field_9_ = $this->nmgp_cmp_readonly['sc_field_9_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_9_']) && $this->nmgp_cmp_hidden['sc_field_9_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_9_']);
           $sStyleHidden_sc_field_9_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_9_ = true;
       $sStyleReadLab_sc_field_9_ = 'display: none;';
       $sStyleReadInp_sc_field_9_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_9_']) && $this->nmgp_cmp_readonly['sc_field_9_'] == 'on')
       {
           $bTestReadOnly_sc_field_9_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_9_']);
           $sStyleReadLab_sc_field_9_ = '';
           $sStyleReadInp_sc_field_9_ = 'display: none;';
       }
       $this->dispensacion_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['dispensacion_']; 
       $dispensacion_ = $this->dispensacion_; 
       $sStyleHidden_dispensacion_ = '';
       if (isset($sCheckRead_dispensacion_))
       {
           unset($sCheckRead_dispensacion_);
       }
       if (isset($this->nmgp_cmp_readonly['dispensacion_']))
       {
           $sCheckRead_dispensacion_ = $this->nmgp_cmp_readonly['dispensacion_'];
       }
       if (isset($this->nmgp_cmp_hidden['dispensacion_']) && $this->nmgp_cmp_hidden['dispensacion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dispensacion_']);
           $sStyleHidden_dispensacion_ = 'display: none;';
       }
       $bTestReadOnly_dispensacion_ = true;
       $sStyleReadLab_dispensacion_ = 'display: none;';
       $sStyleReadInp_dispensacion_ = '';
       if (isset($this->nmgp_cmp_readonly['dispensacion_']) && $this->nmgp_cmp_readonly['dispensacion_'] == 'on')
       {
           $bTestReadOnly_dispensacion_ = false;
           unset($this->nmgp_cmp_readonly['dispensacion_']);
           $sStyleReadLab_dispensacion_ = '';
           $sStyleReadInp_dispensacion_ = 'display: none;';
       }
       $this->sc_field_10_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_10_']; 
       $sc_field_10_ = $this->sc_field_10_; 
       $sStyleHidden_sc_field_10_ = '';
       if (isset($sCheckRead_sc_field_10_))
       {
           unset($sCheckRead_sc_field_10_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_10_']))
       {
           $sCheckRead_sc_field_10_ = $this->nmgp_cmp_readonly['sc_field_10_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_10_']) && $this->nmgp_cmp_hidden['sc_field_10_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_10_']);
           $sStyleHidden_sc_field_10_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_10_ = true;
       $sStyleReadLab_sc_field_10_ = 'display: none;';
       $sStyleReadInp_sc_field_10_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_10_']) && $this->nmgp_cmp_readonly['sc_field_10_'] == 'on')
       {
           $bTestReadOnly_sc_field_10_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_10_']);
           $sStyleReadLab_sc_field_10_ = '';
           $sStyleReadInp_sc_field_10_ = 'display: none;';
       }
       $this->laboratorio_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['laboratorio_']; 
       $laboratorio_ = $this->laboratorio_; 
       $sStyleHidden_laboratorio_ = '';
       if (isset($sCheckRead_laboratorio_))
       {
           unset($sCheckRead_laboratorio_);
       }
       if (isset($this->nmgp_cmp_readonly['laboratorio_']))
       {
           $sCheckRead_laboratorio_ = $this->nmgp_cmp_readonly['laboratorio_'];
       }
       if (isset($this->nmgp_cmp_hidden['laboratorio_']) && $this->nmgp_cmp_hidden['laboratorio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['laboratorio_']);
           $sStyleHidden_laboratorio_ = 'display: none;';
       }
       $bTestReadOnly_laboratorio_ = true;
       $sStyleReadLab_laboratorio_ = 'display: none;';
       $sStyleReadInp_laboratorio_ = '';
       if (isset($this->nmgp_cmp_readonly['laboratorio_']) && $this->nmgp_cmp_readonly['laboratorio_'] == 'on')
       {
           $bTestReadOnly_laboratorio_ = false;
           unset($this->nmgp_cmp_readonly['laboratorio_']);
           $sStyleReadLab_laboratorio_ = '';
           $sStyleReadInp_laboratorio_ = 'display: none;';
       }
       $this->sc_field_11_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_11_']; 
       $sc_field_11_ = $this->sc_field_11_; 
       $sStyleHidden_sc_field_11_ = '';
       if (isset($sCheckRead_sc_field_11_))
       {
           unset($sCheckRead_sc_field_11_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_11_']))
       {
           $sCheckRead_sc_field_11_ = $this->nmgp_cmp_readonly['sc_field_11_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_11_']) && $this->nmgp_cmp_hidden['sc_field_11_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_11_']);
           $sStyleHidden_sc_field_11_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_11_ = true;
       $sStyleReadLab_sc_field_11_ = 'display: none;';
       $sStyleReadInp_sc_field_11_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_11_']) && $this->nmgp_cmp_readonly['sc_field_11_'] == 'on')
       {
           $bTestReadOnly_sc_field_11_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_11_']);
           $sStyleReadLab_sc_field_11_ = '';
           $sStyleReadInp_sc_field_11_ = 'display: none;';
       }
       $this->sc_field_12_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_12_']; 
       $sc_field_12_ = $this->sc_field_12_; 
       $sStyleHidden_sc_field_12_ = '';
       if (isset($sCheckRead_sc_field_12_))
       {
           unset($sCheckRead_sc_field_12_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_12_']))
       {
           $sCheckRead_sc_field_12_ = $this->nmgp_cmp_readonly['sc_field_12_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_12_']) && $this->nmgp_cmp_hidden['sc_field_12_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_12_']);
           $sStyleHidden_sc_field_12_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_12_ = true;
       $sStyleReadLab_sc_field_12_ = 'display: none;';
       $sStyleReadInp_sc_field_12_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_12_']) && $this->nmgp_cmp_readonly['sc_field_12_'] == 'on')
       {
           $bTestReadOnly_sc_field_12_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_12_']);
           $sStyleReadLab_sc_field_12_ = '';
           $sStyleReadInp_sc_field_12_ = 'display: none;';
       }
       $this->erp_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['erp_']; 
       $erp_ = $this->erp_; 
       $sStyleHidden_erp_ = '';
       if (isset($sCheckRead_erp_))
       {
           unset($sCheckRead_erp_);
       }
       if (isset($this->nmgp_cmp_readonly['erp_']))
       {
           $sCheckRead_erp_ = $this->nmgp_cmp_readonly['erp_'];
       }
       if (isset($this->nmgp_cmp_hidden['erp_']) && $this->nmgp_cmp_hidden['erp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['erp_']);
           $sStyleHidden_erp_ = 'display: none;';
       }
       $bTestReadOnly_erp_ = true;
       $sStyleReadLab_erp_ = 'display: none;';
       $sStyleReadInp_erp_ = '';
       if (isset($this->nmgp_cmp_readonly['erp_']) && $this->nmgp_cmp_readonly['erp_'] == 'on')
       {
           $bTestReadOnly_erp_ = false;
           unset($this->nmgp_cmp_readonly['erp_']);
           $sStyleReadLab_erp_ = '';
           $sStyleReadInp_erp_ = 'display: none;';
       }
       $this->pabellon_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['pabellon_']; 
       $pabellon_ = $this->pabellon_; 
       $sStyleHidden_pabellon_ = '';
       if (isset($sCheckRead_pabellon_))
       {
           unset($sCheckRead_pabellon_);
       }
       if (isset($this->nmgp_cmp_readonly['pabellon_']))
       {
           $sCheckRead_pabellon_ = $this->nmgp_cmp_readonly['pabellon_'];
       }
       if (isset($this->nmgp_cmp_hidden['pabellon_']) && $this->nmgp_cmp_hidden['pabellon_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pabellon_']);
           $sStyleHidden_pabellon_ = 'display: none;';
       }
       $bTestReadOnly_pabellon_ = true;
       $sStyleReadLab_pabellon_ = 'display: none;';
       $sStyleReadInp_pabellon_ = '';
       if (isset($this->nmgp_cmp_readonly['pabellon_']) && $this->nmgp_cmp_readonly['pabellon_'] == 'on')
       {
           $bTestReadOnly_pabellon_ = false;
           unset($this->nmgp_cmp_readonly['pabellon_']);
           $sStyleReadLab_pabellon_ = '';
           $sStyleReadInp_pabellon_ = 'display: none;';
       }
       $this->maternidad_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['maternidad_']; 
       $maternidad_ = $this->maternidad_; 
       $sStyleHidden_maternidad_ = '';
       if (isset($sCheckRead_maternidad_))
       {
           unset($sCheckRead_maternidad_);
       }
       if (isset($this->nmgp_cmp_readonly['maternidad_']))
       {
           $sCheckRead_maternidad_ = $this->nmgp_cmp_readonly['maternidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['maternidad_']) && $this->nmgp_cmp_hidden['maternidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['maternidad_']);
           $sStyleHidden_maternidad_ = 'display: none;';
       }
       $bTestReadOnly_maternidad_ = true;
       $sStyleReadLab_maternidad_ = 'display: none;';
       $sStyleReadInp_maternidad_ = '';
       if (isset($this->nmgp_cmp_readonly['maternidad_']) && $this->nmgp_cmp_readonly['maternidad_'] == 'on')
       {
           $bTestReadOnly_maternidad_ = false;
           unset($this->nmgp_cmp_readonly['maternidad_']);
           $sStyleReadLab_maternidad_ = '';
           $sStyleReadInp_maternidad_ = 'display: none;';
       }
       $this->archivo_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['archivo_']; 
       $archivo_ = $this->archivo_; 
       $sStyleHidden_archivo_ = '';
       if (isset($sCheckRead_archivo_))
       {
           unset($sCheckRead_archivo_);
       }
       if (isset($this->nmgp_cmp_readonly['archivo_']))
       {
           $sCheckRead_archivo_ = $this->nmgp_cmp_readonly['archivo_'];
       }
       if (isset($this->nmgp_cmp_hidden['archivo_']) && $this->nmgp_cmp_hidden['archivo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['archivo_']);
           $sStyleHidden_archivo_ = 'display: none;';
       }
       $bTestReadOnly_archivo_ = true;
       $sStyleReadLab_archivo_ = 'display: none;';
       $sStyleReadInp_archivo_ = '';
       if (isset($this->nmgp_cmp_readonly['archivo_']) && $this->nmgp_cmp_readonly['archivo_'] == 'on')
       {
           $bTestReadOnly_archivo_ = false;
           unset($this->nmgp_cmp_readonly['archivo_']);
           $sStyleReadLab_archivo_ = '';
           $sStyleReadInp_archivo_ = 'display: none;';
       }
       $this->lme_ = $this->form_vert_form_tbl_georref[$sc_seq_vert]['lme_']; 
       $lme_ = $this->lme_; 
       $sStyleHidden_lme_ = '';
       if (isset($sCheckRead_lme_))
       {
           unset($sCheckRead_lme_);
       }
       if (isset($this->nmgp_cmp_readonly['lme_']))
       {
           $sCheckRead_lme_ = $this->nmgp_cmp_readonly['lme_'];
       }
       if (isset($this->nmgp_cmp_hidden['lme_']) && $this->nmgp_cmp_hidden['lme_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lme_']);
           $sStyleHidden_lme_ = 'display: none;';
       }
       $bTestReadOnly_lme_ = true;
       $sStyleReadLab_lme_ = 'display: none;';
       $sStyleReadInp_lme_ = '';
       if (isset($this->nmgp_cmp_readonly['lme_']) && $this->nmgp_cmp_readonly['lme_'] == 'on')
       {
           $bTestReadOnly_lme_ = false;
           unset($this->nmgp_cmp_readonly['lme_']);
           $sStyleReadLab_lme_ = '';
           $sStyleReadInp_lme_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbl_georref_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbl_georref_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbl_georref_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbl_georref_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbl_georref_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbl_georref_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"?><span id="id_ajax_label_id_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_0__line" id="hidden_field_data_sc_field_0_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_0_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_0__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_0_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">" . $sc_field_0_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_0_<?php echo $sc_seq_vert ?> css_sc_field_0__line" style="<?php echo $sStyleReadLab_sc_field_0_; ?>"><?php echo $this->form_encode_input($this->sc_field_0_); ?></span><span id="id_read_off_sc_field_0_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_0__obj" style="" id="id_sc_field_sc_field_0_<?php echo $sc_seq_vert ?>" type=text name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_1__line" id="hidden_field_data_sc_field_1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_1_"]) &&  $this->nmgp_cmp_readonly["sc_field_1_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_1_) . "\">" . $sc_field_1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_1_<?php echo $sc_seq_vert ?> css_sc_field_1__line" style="<?php echo $sStyleReadLab_sc_field_1_; ?>"><?php echo $this->form_encode_input($this->sc_field_1_); ?></span><span id="id_read_off_sc_field_1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_1__obj" style="" id="id_sc_field_sc_field_1_<?php echo $sc_seq_vert ?>" type=text name="sc_field_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_1_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['comuna_']) && $this->nmgp_cmp_hidden['comuna_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comuna_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comuna_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_comuna__line" id="hidden_field_data_comuna_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_comuna_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_comuna__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_comuna_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comuna_"]) &&  $this->nmgp_cmp_readonly["comuna_"] == "on") { 

 ?>
<input type="hidden" name="comuna_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comuna_) . "\">" . $comuna_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_comuna_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-comuna_<?php echo $sc_seq_vert ?> css_comuna__line" style="<?php echo $sStyleReadLab_comuna_; ?>"><?php echo $this->form_encode_input($this->comuna_); ?></span><span id="id_read_off_comuna_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_comuna_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_comuna__obj" style="" id="id_sc_field_comuna_<?php echo $sc_seq_vert ?>" type=text name="comuna_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comuna_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comuna_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comuna_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_2__line" id="hidden_field_data_sc_field_2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_2_"]) &&  $this->nmgp_cmp_readonly["sc_field_2_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) . "\">" . $sc_field_2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_2_<?php echo $sc_seq_vert ?> css_sc_field_2__line" style="<?php echo $sStyleReadLab_sc_field_2_; ?>"><?php echo $this->form_encode_input($this->sc_field_2_); ?></span><span id="id_read_off_sc_field_2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_2__obj" style="" id="id_sc_field_sc_field_2_<?php echo $sc_seq_vert ?>" type=text name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_3_']) && $this->nmgp_cmp_hidden['sc_field_3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_3__line" id="hidden_field_data_sc_field_3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_3_"]) &&  $this->nmgp_cmp_readonly["sc_field_3_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_3_) . "\">" . $sc_field_3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_3_<?php echo $sc_seq_vert ?> css_sc_field_3__line" style="<?php echo $sStyleReadLab_sc_field_3_; ?>"><?php echo $this->form_encode_input($this->sc_field_3_); ?></span><span id="id_read_off_sc_field_3_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_3__obj" style="" id="id_sc_field_sc_field_3_<?php echo $sc_seq_vert ?>" type=text name="sc_field_3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_3_) ?>"
 size=50 maxlength=99 alt="{datatype: 'text', maxLength: 99, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['agenda_']) && $this->nmgp_cmp_hidden['agenda_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agenda_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($agenda_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_agenda__line" id="hidden_field_data_agenda_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_agenda_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_agenda__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_agenda_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agenda_"]) &&  $this->nmgp_cmp_readonly["agenda_"] == "on") { 

 ?>
<input type="hidden" name="agenda_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($agenda_) . "\">" . $agenda_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_agenda_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-agenda_<?php echo $sc_seq_vert ?> css_agenda__line" style="<?php echo $sStyleReadLab_agenda_; ?>"><?php echo $this->form_encode_input($this->agenda_); ?></span><span id="id_read_off_agenda_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_agenda_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_agenda__obj" style="" id="id_sc_field_agenda_<?php echo $sc_seq_vert ?>" type=text name="agenda_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($agenda_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agenda_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agenda_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_']) && $this->nmgp_cmp_hidden['rce_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rce_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rce__line" id="hidden_field_data_rce_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rce_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rce__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rce_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rce_"]) &&  $this->nmgp_cmp_readonly["rce_"] == "on") { 

 ?>
<input type="hidden" name="rce_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_) . "\">" . $rce_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rce_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rce_<?php echo $sc_seq_vert ?> css_rce__line" style="<?php echo $sStyleReadLab_rce_; ?>"><?php echo $this->form_encode_input($this->rce_); ?></span><span id="id_read_off_rce_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rce_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rce__obj" style="" id="id_sc_field_rce_<?php echo $sc_seq_vert ?>" type=text name="rce_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rce_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rce_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_']) && $this->nmgp_cmp_hidden['indicaciones_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indicaciones_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_indicaciones__line" id="hidden_field_data_indicaciones_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_indicaciones_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_indicaciones__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_indicaciones_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indicaciones_"]) &&  $this->nmgp_cmp_readonly["indicaciones_"] == "on") { 

 ?>
<input type="hidden" name="indicaciones_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_) . "\">" . $indicaciones_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_indicaciones_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-indicaciones_<?php echo $sc_seq_vert ?> css_indicaciones__line" style="<?php echo $sStyleReadLab_indicaciones_; ?>"><?php echo $this->form_encode_input($this->indicaciones_); ?></span><span id="id_read_off_indicaciones_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indicaciones_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_indicaciones__obj" style="" id="id_sc_field_indicaciones_<?php echo $sc_seq_vert ?>" type=text name="indicaciones_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_indicaciones_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_indicaciones_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dental_']) && $this->nmgp_cmp_hidden['dental_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dental_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dental_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dental__line" id="hidden_field_data_dental_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dental_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dental__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dental_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dental_"]) &&  $this->nmgp_cmp_readonly["dental_"] == "on") { 

 ?>
<input type="hidden" name="dental_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dental_) . "\">" . $dental_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dental_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dental_<?php echo $sc_seq_vert ?> css_dental__line" style="<?php echo $sStyleReadLab_dental_; ?>"><?php echo $this->form_encode_input($this->dental_); ?></span><span id="id_read_off_dental_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dental_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dental__obj" style="" id="id_sc_field_dental_<?php echo $sc_seq_vert ?>" type=text name="dental_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dental_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dental_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dental_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_4_']) && $this->nmgp_cmp_hidden['sc_field_4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_4__line" id="hidden_field_data_sc_field_4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_4_"]) &&  $this->nmgp_cmp_readonly["sc_field_4_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_4_) . "\">" . $sc_field_4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_4_<?php echo $sc_seq_vert ?> css_sc_field_4__line" style="<?php echo $sStyleReadLab_sc_field_4_; ?>"><?php echo $this->form_encode_input($this->sc_field_4_); ?></span><span id="id_read_off_sc_field_4_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_4__obj" style="" id="id_sc_field_sc_field_4_<?php echo $sc_seq_vert ?>" type=text name="sc_field_4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_4_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_5_']) && $this->nmgp_cmp_hidden['sc_field_5_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_5_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_5__line" id="hidden_field_data_sc_field_5_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_5_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_5__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_5_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_5_"]) &&  $this->nmgp_cmp_readonly["sc_field_5_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_5_) . "\">" . $sc_field_5_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_5_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_5_<?php echo $sc_seq_vert ?> css_sc_field_5__line" style="<?php echo $sStyleReadLab_sc_field_5_; ?>"><?php echo $this->form_encode_input($this->sc_field_5_); ?></span><span id="id_read_off_sc_field_5_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_5_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_5__obj" style="" id="id_sc_field_sc_field_5_<?php echo $sc_seq_vert ?>" type=text name="sc_field_5_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_5_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_5_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_5_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_1_']) && $this->nmgp_cmp_hidden['rce_1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rce_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rce_1__line" id="hidden_field_data_rce_1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rce_1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rce_1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rce_1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rce_1_"]) &&  $this->nmgp_cmp_readonly["rce_1_"] == "on") { 

 ?>
<input type="hidden" name="rce_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_1_) . "\">" . $rce_1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rce_1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rce_1_<?php echo $sc_seq_vert ?> css_rce_1__line" style="<?php echo $sStyleReadLab_rce_1_; ?>"><?php echo $this->form_encode_input($this->rce_1_); ?></span><span id="id_read_off_rce_1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rce_1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rce_1__obj" style="" id="id_sc_field_rce_1_<?php echo $sc_seq_vert ?>" type=text name="rce_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_1_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rce_1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rce_1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_1_']) && $this->nmgp_cmp_hidden['indicaciones_1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indicaciones_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_indicaciones_1__line" id="hidden_field_data_indicaciones_1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_indicaciones_1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_indicaciones_1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_indicaciones_1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indicaciones_1_"]) &&  $this->nmgp_cmp_readonly["indicaciones_1_"] == "on") { 

 ?>
<input type="hidden" name="indicaciones_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_1_) . "\">" . $indicaciones_1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_indicaciones_1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-indicaciones_1_<?php echo $sc_seq_vert ?> css_indicaciones_1__line" style="<?php echo $sStyleReadLab_indicaciones_1_; ?>"><?php echo $this->form_encode_input($this->indicaciones_1_); ?></span><span id="id_read_off_indicaciones_1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indicaciones_1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_indicaciones_1__obj" style="" id="id_sc_field_indicaciones_1_<?php echo $sc_seq_vert ?>" type=text name="indicaciones_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_1_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_indicaciones_1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_indicaciones_1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_6_']) && $this->nmgp_cmp_hidden['sc_field_6_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_6_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_6__line" id="hidden_field_data_sc_field_6_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_6_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_6__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_6_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_6_"]) &&  $this->nmgp_cmp_readonly["sc_field_6_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_6_) . "\">" . $sc_field_6_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_6_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_6_<?php echo $sc_seq_vert ?> css_sc_field_6__line" style="<?php echo $sStyleReadLab_sc_field_6_; ?>"><?php echo $this->form_encode_input($this->sc_field_6_); ?></span><span id="id_read_off_sc_field_6_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_6_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_6__obj" style="" id="id_sc_field_sc_field_6_<?php echo $sc_seq_vert ?>" type=text name="sc_field_6_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_6_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_6_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_6_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rce_2_']) && $this->nmgp_cmp_hidden['rce_2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rce_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rce_2__line" id="hidden_field_data_rce_2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rce_2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rce_2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rce_2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rce_2_"]) &&  $this->nmgp_cmp_readonly["rce_2_"] == "on") { 

 ?>
<input type="hidden" name="rce_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_2_) . "\">" . $rce_2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rce_2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rce_2_<?php echo $sc_seq_vert ?> css_rce_2__line" style="<?php echo $sStyleReadLab_rce_2_; ?>"><?php echo $this->form_encode_input($this->rce_2_); ?></span><span id="id_read_off_rce_2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rce_2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rce_2__obj" style="" id="id_sc_field_rce_2_<?php echo $sc_seq_vert ?>" type=text name="rce_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rce_2_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rce_2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rce_2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['indicaciones_2_']) && $this->nmgp_cmp_hidden['indicaciones_2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indicaciones_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_indicaciones_2__line" id="hidden_field_data_indicaciones_2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_indicaciones_2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_indicaciones_2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_indicaciones_2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indicaciones_2_"]) &&  $this->nmgp_cmp_readonly["indicaciones_2_"] == "on") { 

 ?>
<input type="hidden" name="indicaciones_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_2_) . "\">" . $indicaciones_2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_indicaciones_2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-indicaciones_2_<?php echo $sc_seq_vert ?> css_indicaciones_2__line" style="<?php echo $sStyleReadLab_indicaciones_2_; ?>"><?php echo $this->form_encode_input($this->indicaciones_2_); ?></span><span id="id_read_off_indicaciones_2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indicaciones_2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_indicaciones_2__obj" style="" id="id_sc_field_indicaciones_2_<?php echo $sc_seq_vert ?>" type=text name="indicaciones_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($indicaciones_2_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_indicaciones_2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_indicaciones_2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['triage_']) && $this->nmgp_cmp_hidden['triage_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="triage_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($triage_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_triage__line" id="hidden_field_data_triage_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_triage_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_triage__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_triage_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["triage_"]) &&  $this->nmgp_cmp_readonly["triage_"] == "on") { 

 ?>
<input type="hidden" name="triage_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($triage_) . "\">" . $triage_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_triage_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-triage_<?php echo $sc_seq_vert ?> css_triage__line" style="<?php echo $sStyleReadLab_triage_; ?>"><?php echo $this->form_encode_input($this->triage_); ?></span><span id="id_read_off_triage_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_triage_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_triage__obj" style="" id="id_sc_field_triage_<?php echo $sc_seq_vert ?>" type=text name="triage_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($triage_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_triage_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_triage_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_7_']) && $this->nmgp_cmp_hidden['sc_field_7_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_7_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_7__line" id="hidden_field_data_sc_field_7_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_7_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_7__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_7_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_7_"]) &&  $this->nmgp_cmp_readonly["sc_field_7_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_7_) . "\">" . $sc_field_7_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_7_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_7_<?php echo $sc_seq_vert ?> css_sc_field_7__line" style="<?php echo $sStyleReadLab_sc_field_7_; ?>"><?php echo $this->form_encode_input($this->sc_field_7_); ?></span><span id="id_read_off_sc_field_7_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_7_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_7__obj" style="" id="id_sc_field_sc_field_7_<?php echo $sc_seq_vert ?>" type=text name="sc_field_7_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_7_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_7_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_7_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_8_']) && $this->nmgp_cmp_hidden['sc_field_8_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_8_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_8__line" id="hidden_field_data_sc_field_8_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_8_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_8__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_8_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_8_"]) &&  $this->nmgp_cmp_readonly["sc_field_8_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_8_) . "\">" . $sc_field_8_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_8_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_8_<?php echo $sc_seq_vert ?> css_sc_field_8__line" style="<?php echo $sStyleReadLab_sc_field_8_; ?>"><?php echo $this->form_encode_input($this->sc_field_8_); ?></span><span id="id_read_off_sc_field_8_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_8_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_8__obj" style="" id="id_sc_field_sc_field_8_<?php echo $sc_seq_vert ?>" type=text name="sc_field_8_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_8_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_8_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_8_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_9_']) && $this->nmgp_cmp_hidden['sc_field_9_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_9_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_9__line" id="hidden_field_data_sc_field_9_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_9_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_9__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_9_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_9_"]) &&  $this->nmgp_cmp_readonly["sc_field_9_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_9_) . "\">" . $sc_field_9_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_9_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_9_<?php echo $sc_seq_vert ?> css_sc_field_9__line" style="<?php echo $sStyleReadLab_sc_field_9_; ?>"><?php echo $this->form_encode_input($this->sc_field_9_); ?></span><span id="id_read_off_sc_field_9_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_9_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_9__obj" style="" id="id_sc_field_sc_field_9_<?php echo $sc_seq_vert ?>" type=text name="sc_field_9_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_9_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_9_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_9_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dispensacion_']) && $this->nmgp_cmp_hidden['dispensacion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dispensacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dispensacion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dispensacion__line" id="hidden_field_data_dispensacion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dispensacion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dispensacion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dispensacion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dispensacion_"]) &&  $this->nmgp_cmp_readonly["dispensacion_"] == "on") { 

 ?>
<input type="hidden" name="dispensacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dispensacion_) . "\">" . $dispensacion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dispensacion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dispensacion_<?php echo $sc_seq_vert ?> css_dispensacion__line" style="<?php echo $sStyleReadLab_dispensacion_; ?>"><?php echo $this->form_encode_input($this->dispensacion_); ?></span><span id="id_read_off_dispensacion_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dispensacion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dispensacion__obj" style="" id="id_sc_field_dispensacion_<?php echo $sc_seq_vert ?>" type=text name="dispensacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dispensacion_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dispensacion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dispensacion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_10_']) && $this->nmgp_cmp_hidden['sc_field_10_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_10_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_10_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_10__line" id="hidden_field_data_sc_field_10_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_10_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_10__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_10_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_10_"]) &&  $this->nmgp_cmp_readonly["sc_field_10_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_10_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_10_) . "\">" . $sc_field_10_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_10_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_10_<?php echo $sc_seq_vert ?> css_sc_field_10__line" style="<?php echo $sStyleReadLab_sc_field_10_; ?>"><?php echo $this->form_encode_input($this->sc_field_10_); ?></span><span id="id_read_off_sc_field_10_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_10_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_10__obj" style="" id="id_sc_field_sc_field_10_<?php echo $sc_seq_vert ?>" type=text name="sc_field_10_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_10_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_10_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_10_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['laboratorio_']) && $this->nmgp_cmp_hidden['laboratorio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="laboratorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($laboratorio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_laboratorio__line" id="hidden_field_data_laboratorio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_laboratorio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_laboratorio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_laboratorio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["laboratorio_"]) &&  $this->nmgp_cmp_readonly["laboratorio_"] == "on") { 

 ?>
<input type="hidden" name="laboratorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($laboratorio_) . "\">" . $laboratorio_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_laboratorio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-laboratorio_<?php echo $sc_seq_vert ?> css_laboratorio__line" style="<?php echo $sStyleReadLab_laboratorio_; ?>"><?php echo $this->form_encode_input($this->laboratorio_); ?></span><span id="id_read_off_laboratorio_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_laboratorio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_laboratorio__obj" style="" id="id_sc_field_laboratorio_<?php echo $sc_seq_vert ?>" type=text name="laboratorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($laboratorio_) ?>"
 size=50 maxlength=51 alt="{datatype: 'text', maxLength: 51, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_laboratorio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_laboratorio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_11_']) && $this->nmgp_cmp_hidden['sc_field_11_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_11_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_11_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_11__line" id="hidden_field_data_sc_field_11_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_11_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_11__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_11_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_11_"]) &&  $this->nmgp_cmp_readonly["sc_field_11_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_11_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_11_) . "\">" . $sc_field_11_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_11_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_11_<?php echo $sc_seq_vert ?> css_sc_field_11__line" style="<?php echo $sStyleReadLab_sc_field_11_; ?>"><?php echo $this->form_encode_input($this->sc_field_11_); ?></span><span id="id_read_off_sc_field_11_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_11_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_11__obj" style="" id="id_sc_field_sc_field_11_<?php echo $sc_seq_vert ?>" type=text name="sc_field_11_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_11_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_11_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_11_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_12_']) && $this->nmgp_cmp_hidden['sc_field_12_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_12_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_12_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_12__line" id="hidden_field_data_sc_field_12_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_12_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_12__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_12_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_12_"]) &&  $this->nmgp_cmp_readonly["sc_field_12_"] == "on") { 

 ?>
<input type="hidden" name="sc_field_12_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_12_) . "\">" . $sc_field_12_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_12_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_12_<?php echo $sc_seq_vert ?> css_sc_field_12__line" style="<?php echo $sStyleReadLab_sc_field_12_; ?>"><?php echo $this->form_encode_input($this->sc_field_12_); ?></span><span id="id_read_off_sc_field_12_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_12_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_12__obj" style="" id="id_sc_field_sc_field_12_<?php echo $sc_seq_vert ?>" type=text name="sc_field_12_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_12_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_12_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_12_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['erp_']) && $this->nmgp_cmp_hidden['erp_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="erp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($erp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_erp__line" id="hidden_field_data_erp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_erp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_erp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_erp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["erp_"]) &&  $this->nmgp_cmp_readonly["erp_"] == "on") { 

 ?>
<input type="hidden" name="erp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($erp_) . "\">" . $erp_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_erp_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-erp_<?php echo $sc_seq_vert ?> css_erp__line" style="<?php echo $sStyleReadLab_erp_; ?>"><?php echo $this->form_encode_input($this->erp_); ?></span><span id="id_read_off_erp_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_erp_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_erp__obj" style="" id="id_sc_field_erp_<?php echo $sc_seq_vert ?>" type=text name="erp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($erp_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_erp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_erp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pabellon_']) && $this->nmgp_cmp_hidden['pabellon_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pabellon_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pabellon_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pabellon__line" id="hidden_field_data_pabellon_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pabellon_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pabellon__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pabellon_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pabellon_"]) &&  $this->nmgp_cmp_readonly["pabellon_"] == "on") { 

 ?>
<input type="hidden" name="pabellon_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pabellon_) . "\">" . $pabellon_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pabellon_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pabellon_<?php echo $sc_seq_vert ?> css_pabellon__line" style="<?php echo $sStyleReadLab_pabellon_; ?>"><?php echo $this->form_encode_input($this->pabellon_); ?></span><span id="id_read_off_pabellon_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pabellon_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pabellon__obj" style="" id="id_sc_field_pabellon_<?php echo $sc_seq_vert ?>" type=text name="pabellon_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pabellon_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pabellon_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pabellon_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['maternidad_']) && $this->nmgp_cmp_hidden['maternidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="maternidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maternidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_maternidad__line" id="hidden_field_data_maternidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_maternidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_maternidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_maternidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["maternidad_"]) &&  $this->nmgp_cmp_readonly["maternidad_"] == "on") { 

 ?>
<input type="hidden" name="maternidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maternidad_) . "\">" . $maternidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_maternidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-maternidad_<?php echo $sc_seq_vert ?> css_maternidad__line" style="<?php echo $sStyleReadLab_maternidad_; ?>"><?php echo $this->form_encode_input($this->maternidad_); ?></span><span id="id_read_off_maternidad_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_maternidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_maternidad__obj" style="" id="id_sc_field_maternidad_<?php echo $sc_seq_vert ?>" type=text name="maternidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($maternidad_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_maternidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_maternidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['archivo_']) && $this->nmgp_cmp_hidden['archivo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($archivo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_archivo__line" id="hidden_field_data_archivo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_archivo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_archivo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_archivo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archivo_"]) &&  $this->nmgp_cmp_readonly["archivo_"] == "on") { 

 ?>
<input type="hidden" name="archivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($archivo_) . "\">" . $archivo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_archivo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-archivo_<?php echo $sc_seq_vert ?> css_archivo__line" style="<?php echo $sStyleReadLab_archivo_; ?>"><?php echo $this->form_encode_input($this->archivo_); ?></span><span id="id_read_off_archivo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_archivo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_archivo__obj" style="" id="id_sc_field_archivo_<?php echo $sc_seq_vert ?>" type=text name="archivo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($archivo_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archivo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archivo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lme_']) && $this->nmgp_cmp_hidden['lme_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lme_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lme_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lme__line" id="hidden_field_data_lme_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lme_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lme__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lme_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lme_"]) &&  $this->nmgp_cmp_readonly["lme_"] == "on") { 

 ?>
<input type="hidden" name="lme_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lme_) . "\">" . $lme_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_lme_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-lme_<?php echo $sc_seq_vert ?> css_lme__line" style="<?php echo $sStyleReadLab_lme_; ?>"><?php echo $this->form_encode_input($this->lme_); ?></span><span id="id_read_off_lme_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lme_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_lme__obj" style="" id="id_sc_field_lme_<?php echo $sc_seq_vert ?>" type=text name="lme_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lme_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lme_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lme_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_0_))
       {
           $this->nmgp_cmp_readonly['sc_field_0_'] = $sCheckRead_sc_field_0_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_0_)
       {
           $this->nmgp_cmp_hidden['sc_field_0_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_1_))
       {
           $this->nmgp_cmp_readonly['sc_field_1_'] = $sCheckRead_sc_field_1_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_1_)
       {
           $this->nmgp_cmp_hidden['sc_field_1_'] = 'off';
       }
       if (isset($sCheckRead_comuna_))
       {
           $this->nmgp_cmp_readonly['comuna_'] = $sCheckRead_comuna_;
       }
       if ('display: none;' == $sStyleHidden_comuna_)
       {
           $this->nmgp_cmp_hidden['comuna_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_2_))
       {
           $this->nmgp_cmp_readonly['sc_field_2_'] = $sCheckRead_sc_field_2_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_2_)
       {
           $this->nmgp_cmp_hidden['sc_field_2_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_3_))
       {
           $this->nmgp_cmp_readonly['sc_field_3_'] = $sCheckRead_sc_field_3_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_3_)
       {
           $this->nmgp_cmp_hidden['sc_field_3_'] = 'off';
       }
       if (isset($sCheckRead_agenda_))
       {
           $this->nmgp_cmp_readonly['agenda_'] = $sCheckRead_agenda_;
       }
       if ('display: none;' == $sStyleHidden_agenda_)
       {
           $this->nmgp_cmp_hidden['agenda_'] = 'off';
       }
       if (isset($sCheckRead_rce_))
       {
           $this->nmgp_cmp_readonly['rce_'] = $sCheckRead_rce_;
       }
       if ('display: none;' == $sStyleHidden_rce_)
       {
           $this->nmgp_cmp_hidden['rce_'] = 'off';
       }
       if (isset($sCheckRead_indicaciones_))
       {
           $this->nmgp_cmp_readonly['indicaciones_'] = $sCheckRead_indicaciones_;
       }
       if ('display: none;' == $sStyleHidden_indicaciones_)
       {
           $this->nmgp_cmp_hidden['indicaciones_'] = 'off';
       }
       if (isset($sCheckRead_dental_))
       {
           $this->nmgp_cmp_readonly['dental_'] = $sCheckRead_dental_;
       }
       if ('display: none;' == $sStyleHidden_dental_)
       {
           $this->nmgp_cmp_hidden['dental_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_4_))
       {
           $this->nmgp_cmp_readonly['sc_field_4_'] = $sCheckRead_sc_field_4_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_4_)
       {
           $this->nmgp_cmp_hidden['sc_field_4_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_5_))
       {
           $this->nmgp_cmp_readonly['sc_field_5_'] = $sCheckRead_sc_field_5_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_5_)
       {
           $this->nmgp_cmp_hidden['sc_field_5_'] = 'off';
       }
       if (isset($sCheckRead_rce_1_))
       {
           $this->nmgp_cmp_readonly['rce_1_'] = $sCheckRead_rce_1_;
       }
       if ('display: none;' == $sStyleHidden_rce_1_)
       {
           $this->nmgp_cmp_hidden['rce_1_'] = 'off';
       }
       if (isset($sCheckRead_indicaciones_1_))
       {
           $this->nmgp_cmp_readonly['indicaciones_1_'] = $sCheckRead_indicaciones_1_;
       }
       if ('display: none;' == $sStyleHidden_indicaciones_1_)
       {
           $this->nmgp_cmp_hidden['indicaciones_1_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_6_))
       {
           $this->nmgp_cmp_readonly['sc_field_6_'] = $sCheckRead_sc_field_6_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_6_)
       {
           $this->nmgp_cmp_hidden['sc_field_6_'] = 'off';
       }
       if (isset($sCheckRead_rce_2_))
       {
           $this->nmgp_cmp_readonly['rce_2_'] = $sCheckRead_rce_2_;
       }
       if ('display: none;' == $sStyleHidden_rce_2_)
       {
           $this->nmgp_cmp_hidden['rce_2_'] = 'off';
       }
       if (isset($sCheckRead_indicaciones_2_))
       {
           $this->nmgp_cmp_readonly['indicaciones_2_'] = $sCheckRead_indicaciones_2_;
       }
       if ('display: none;' == $sStyleHidden_indicaciones_2_)
       {
           $this->nmgp_cmp_hidden['indicaciones_2_'] = 'off';
       }
       if (isset($sCheckRead_triage_))
       {
           $this->nmgp_cmp_readonly['triage_'] = $sCheckRead_triage_;
       }
       if ('display: none;' == $sStyleHidden_triage_)
       {
           $this->nmgp_cmp_hidden['triage_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_7_))
       {
           $this->nmgp_cmp_readonly['sc_field_7_'] = $sCheckRead_sc_field_7_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_7_)
       {
           $this->nmgp_cmp_hidden['sc_field_7_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_8_))
       {
           $this->nmgp_cmp_readonly['sc_field_8_'] = $sCheckRead_sc_field_8_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_8_)
       {
           $this->nmgp_cmp_hidden['sc_field_8_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_9_))
       {
           $this->nmgp_cmp_readonly['sc_field_9_'] = $sCheckRead_sc_field_9_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_9_)
       {
           $this->nmgp_cmp_hidden['sc_field_9_'] = 'off';
       }
       if (isset($sCheckRead_dispensacion_))
       {
           $this->nmgp_cmp_readonly['dispensacion_'] = $sCheckRead_dispensacion_;
       }
       if ('display: none;' == $sStyleHidden_dispensacion_)
       {
           $this->nmgp_cmp_hidden['dispensacion_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_10_))
       {
           $this->nmgp_cmp_readonly['sc_field_10_'] = $sCheckRead_sc_field_10_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_10_)
       {
           $this->nmgp_cmp_hidden['sc_field_10_'] = 'off';
       }
       if (isset($sCheckRead_laboratorio_))
       {
           $this->nmgp_cmp_readonly['laboratorio_'] = $sCheckRead_laboratorio_;
       }
       if ('display: none;' == $sStyleHidden_laboratorio_)
       {
           $this->nmgp_cmp_hidden['laboratorio_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_11_))
       {
           $this->nmgp_cmp_readonly['sc_field_11_'] = $sCheckRead_sc_field_11_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_11_)
       {
           $this->nmgp_cmp_hidden['sc_field_11_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_12_))
       {
           $this->nmgp_cmp_readonly['sc_field_12_'] = $sCheckRead_sc_field_12_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_12_)
       {
           $this->nmgp_cmp_hidden['sc_field_12_'] = 'off';
       }
       if (isset($sCheckRead_erp_))
       {
           $this->nmgp_cmp_readonly['erp_'] = $sCheckRead_erp_;
       }
       if ('display: none;' == $sStyleHidden_erp_)
       {
           $this->nmgp_cmp_hidden['erp_'] = 'off';
       }
       if (isset($sCheckRead_pabellon_))
       {
           $this->nmgp_cmp_readonly['pabellon_'] = $sCheckRead_pabellon_;
       }
       if ('display: none;' == $sStyleHidden_pabellon_)
       {
           $this->nmgp_cmp_hidden['pabellon_'] = 'off';
       }
       if (isset($sCheckRead_maternidad_))
       {
           $this->nmgp_cmp_readonly['maternidad_'] = $sCheckRead_maternidad_;
       }
       if ('display: none;' == $sStyleHidden_maternidad_)
       {
           $this->nmgp_cmp_hidden['maternidad_'] = 'off';
       }
       if (isset($sCheckRead_archivo_))
       {
           $this->nmgp_cmp_readonly['archivo_'] = $sCheckRead_archivo_;
       }
       if ('display: none;' == $sStyleHidden_archivo_)
       {
           $this->nmgp_cmp_hidden['archivo_'] = 'off';
       }
       if (isset($sCheckRead_lme_))
       {
           $this->nmgp_cmp_readonly['lme_'] = $sCheckRead_lme_;
       }
       if ('display: none;' == $sStyleHidden_lme_)
       {
           $this->nmgp_cmp_hidden['lme_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbl_georref = $guarda_form_vert_form_tbl_georref;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R")
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue']);
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
 parent.scAjaxDetailStatus("form_tbl_georref");
 parent.scAjaxDetailHeight("form_tbl_georref", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_tbl_georref", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbl_georref", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal'])
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
</body> 
</html> 
<?php 
 } 
} 
?> 
